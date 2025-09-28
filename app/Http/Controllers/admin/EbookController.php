<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EbookRequest;
use App\Models\Ebook;
use App\Models\Author;
use App\Models\Genre;
use App\Models\EbookFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Ebook::with(['author', 'genres']);

        // Apply filters
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('long_description', 'like', "%{$search}%");
            });
        }

        if ($request->has('author') && $request->author) {
            $query->where('author_id', $request->author);
        }

        if ($request->has('genre') && $request->genre) {
            $query->whereHas('genres', function ($q) use ($request) {
                $q->where('genres.id', $request->genre);
            });
        }

        if ($request->has('date_from') && $request->date_from) {
            $query->where('release_date', '>=', $request->date_from);
        }

        if ($request->has('date_to') && $request->date_to) {
            $query->where('release_date', '<=', $request->date_to);
        }

        // Get paginated results
        $ebooks = $query->latest()->paginate(20);

        // Get authors and genres for filter dropdowns
        $authors = Author::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();

        return view('admin.ebooks.index', compact('ebooks', 'authors', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = Author::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        return view('admin.ebooks.create', compact('authors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EbookRequest $request)
    {
        // Create ebook
        $ebook = Ebook::create($request->except('cover_image', 'genres', 'files', 'meta_title', 'meta_description', 'meta_keywords'));

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $coverImage = $request->file('cover_image');
            $filename = time() . '_' . $coverImage->getClientOriginalName();
            $path = $coverImage->storeAs('uploads/ebooks/covers', $filename, 'public');
            $ebook->update(['cover_image' => $path]);
        }

        // Attach genres
        if ($request->has('genres')) {
            $ebook->genres()->attach($request->genres);
        }

        // Handle SEO meta
        if ($request->meta_title || $request->meta_description || $request->meta_keywords) {
            $ebook->seoMeta()->create([
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
            ]);
        }

        return redirect()->route('ebooks.index')->with('success', 'Ebook created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ebook $ebook)
    {
        $ebook->load(['author', 'genres', 'files', 'reviews']);
        return view('admin.ebooks.show', compact('ebook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ebook $ebook)
    {
        $ebook->load(['genres']);
        $authors = Author::orderBy('name')->get();
        $genres = Genre::orderBy('name')->get();
        return view('admin.ebooks.edit', compact('ebook', 'authors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EbookRequest $request, Ebook $ebook)
    {
        // Update ebook
        $ebook->update($request->except('cover_image', 'genres', 'files', 'meta_title', 'meta_description', 'meta_keywords'));

        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Delete old image if exists
            if ($ebook->cover_image && Storage::disk('public')->exists($ebook->cover_image)) {
                Storage::disk('public')->delete($ebook->cover_image);
            }

            $coverImage = $request->file('cover_image');
            $filename = time() . '_' . $coverImage->getClientOriginalName();
            $path = $coverImage->storeAs('uploads/ebooks/covers', $filename, 'public');
            $ebook->update(['cover_image' => $path]);
        }

        // Sync genres
        if ($request->has('genres')) {
            $ebook->genres()->sync($request->genres);
        }

        // Handle SEO meta
        if ($request->meta_title || $request->meta_description || $request->meta_keywords) {
            if ($ebook->seoMeta) {
                $ebook->seoMeta->update([
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'meta_keywords' => $request->meta_keywords,
                ]);
            } else {
                $ebook->seoMeta()->create([
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                    'meta_keywords' => $request->meta_keywords,
                ]);
            }
        }

        return redirect()->route('ebooks.index')->with('success', 'Ebook updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ebook $ebook)
    {
        // Delete cover image if exists
        if ($ebook->cover_image && Storage::disk('public')->exists($ebook->cover_image)) {
            Storage::disk('public')->delete($ebook->cover_image);
        }

        // Delete ebook files
        foreach ($ebook->files as $file) {
            if (Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }
        }

        // Delete the ebook
        $ebook->delete();

        return redirect()->route('ebooks.index')->with('success', 'Ebook deleted successfully.');
    }

    /**
     * Download the specified ebook file.
     */
    public function download(EbookFile $file)
    {
        // Check if file exists
        if (!Storage::disk('public')->exists($file->file_path)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // Increment download count
        $file->ebook->incrementDownloadCount();

        // Log the download
        $file->ebook->downloads()->create([
            'ebook_file_id' => $file->id,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        // Return the file download
        return Storage::disk('public')->download($file->file_path, $file->original_name);
    }

    /**
     * Upload files for an ebook.
     */
    public function uploadFiles(Request $request, Ebook $ebook)
    {
        $request->validate([
            'files.*' => 'required|file|mimes:pdf,epub,mobi|max:10240', // 10MB max per file
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $uploadedFile) {
                $filename = time() . '_' . $uploadedFile->getClientOriginalName();
                $path = $uploadedFile->storeAs("uploads/ebooks/{$ebook->id}", $filename, 'public');
                
                $ebook->files()->create([
                    'file_path' => $path,
                    'file_type' => $uploadedFile->getClientOriginalExtension(),
                    'original_name' => $uploadedFile->getClientOriginalName(),
                    'file_size' => $uploadedFile->getSize(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Files uploaded successfully.');
    }

    /**
     * Delete a file.
     */
    public function deleteFile(EbookFile $file)
    {
        // Delete file from storage
        if (Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        // Delete file record
        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully.');
    }

    /**
     * Get popular ebooks by download count.
     */
    public function popular()
    {
        $ebooks = Ebook::with('author')
            ->orderBy('download_count', 'desc')
            ->limit(10)
            ->get();

        return view('admin.ebooks.popular', compact('ebooks'));
    }

    /**
     * Get recent downloads.
     */
    public function recentDownloads()
    {
        $downloads = \App\Models\Download::with(['ebook', 'file'])
            ->latest()
            ->limit(20)
            ->get();

        return view('admin.ebooks.recent-downloads', compact('downloads'));
    }

    /**
     * System status check for ebook system.
     */
    public function systemStatus()
    {
        $status = [
            'database' => [
                'authors_table' => \Schema::hasTable('authors'),
                'genres_table' => \Schema::hasTable('genres'),
                'ebooks_table' => \Schema::hasTable('ebooks'),
                'ebook_files_table' => \Schema::hasTable('ebook_files'),
                'seo_meta_table' => \Schema::hasTable('seo_meta'),
                'reviews_table' => \Schema::hasTable('reviews'),
                'downloads_table' => \Schema::hasTable('downloads'),
                'formats_table' => \Schema::hasTable('formats'),
            ],
            'storage' => [
                'storage_link_exists' => file_exists(public_path('storage')),
                'uploads_directory' => file_exists(storage_path('app/public/uploads')),
            ],
            'data' => [
                'authors_count' => \App\Models\Author::count(),
                'genres_count' => \App\Models\Genre::count(),
                'ebooks_count' => \App\Models\Ebook::count(),
                'formats_count' => \App\Models\Format::count(),
            ]
        ];

        return view('admin.ebooks.system-status', compact('status'));
    }
}