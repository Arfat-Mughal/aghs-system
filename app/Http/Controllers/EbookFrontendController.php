<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ebook;
use App\Models\Genre;

class EbookFrontendController extends Controller
{
    /**
     * Display a listing of ebooks with pagination.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get ebooks with author and genres, paginated
        $ebooks = Ebook::with(['author', 'genres'])
            ->latest()
            ->paginate(20);
        
        // Get random genres for sidebar
        $genres = Genre::withCount('ebooks')
            ->inRandomOrder()
            ->limit(10)
            ->get();
        
        // SEO meta tags
        $seoTitle = 'E-Books Library';
        $seoDescription = 'Browse our collection of educational e-books';
        $seoKeywords = 'ebooks, educational, books, digital library';
        
        return view('pages.ebooks.index', compact('ebooks', 'genres', 'seoTitle', 'seoDescription', 'seoKeywords'));
    }

    /**
     * Display the specified ebook.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // Find ebook by slug with related data
        $ebook = Ebook::with(['author', 'genres', 'files', 'seoMeta'])
            ->where('slug', $slug)
            ->firstOrFail();
        
        // SEO meta tags from ebook or defaults
        $seoTitle = $ebook->seoMeta->meta_title ?? $ebook->title;
        $seoDescription = $ebook->seoMeta->meta_description ?? $ebook->short_description;
        $seoKeywords = $ebook->seoMeta->meta_keywords ?? implode(', ', $ebook->genres->pluck('name')->toArray());
        
        return view('pages.ebooks.show', compact('ebook', 'seoTitle', 'seoDescription', 'seoKeywords'));
    }

    /**
     * Display ebooks filtered by genre.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function genre($slug)
    {
        // Find genre by slug
        $genre = Genre::where('slug', $slug)->firstOrFail();
        
        // Get ebooks for this genre
        $ebooks = Ebook::with(['author', 'genres'])
            ->whereHas('genres', function ($query) use ($genre) {
                $query->where('genres.id', $genre->id);
            })
            ->latest()
            ->paginate(20);
        
        // Get random genres for sidebar
        $genres = Genre::withCount('ebooks')
            ->inRandomOrder()
            ->limit(10)
            ->get();
        
        // SEO meta tags
        $seoTitle = 'E-Books in ' . $genre->name;
        $seoDescription = 'Browse e-books in the ' . $genre->name . ' category';
        $seoKeywords = $genre->name . ', ebooks, educational, books';
        
        return view('pages.ebooks.genre', compact('ebooks', 'genre', 'genres', 'seoTitle', 'seoDescription', 'seoKeywords'));
    }

    /**
     * Download the specified ebook file (public access).
     *
     * @param  \App\Models\EbookFile  $file
     * @return \Illuminate\Http\Response
     */
    public function download(\App\Models\EbookFile $file)
    {
        // Check if file exists
        if (!Storage::disk('public')->exists($file->file_path)) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // All ebooks are available for public download

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
}
