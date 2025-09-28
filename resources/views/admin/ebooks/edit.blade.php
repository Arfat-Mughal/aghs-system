@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit E-Book</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('ebooks.update', $ebook) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $ebook->title) }}" required>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="author_id">Author *</label>
                                    <select name="author_id" class="form-control @error('author_id') is-invalid @enderror" id="author_id" required>
                                        <option value="">Select Author</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}" {{ old('author_id', $ebook->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('author_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="release_date">Release Date *</label>
                                    <input type="date" name="release_date" class="form-control @error('release_date') is-invalid @enderror" id="release_date" value="{{ old('release_date', $ebook->release_date->format('Y-m-d')) }}" required>
                                    @error('release_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="length">Length (pages)</label>
                                    <input type="number" name="length" class="form-control @error('length') is-invalid @enderror" id="length" value="{{ old('length', $ebook->length) }}">
                                    @error('length')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="genres">Genres *</label>
                            <select name="genres[]" class="form-control @error('genres') is-invalid @enderror" id="genres" multiple required>
                                @foreach($genres as $genre)
                                    <option value="{{ $genre->id }}" {{ in_array($genre->id, old('genres', $ebook->genres->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $genre->name }}</option>
                                @endforeach
                            </select>
                            @error('genres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description" rows="3">{{ old('short_description', $ebook->short_description) }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="long_description">Long Description</label>
                            <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror" id="long_description" rows="5">{{ old('long_description', $ebook->long_description) }}</textarea>
                            @error('long_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="scripture_references">Scripture References</label>
                                    <input type="text" name="scripture_references" class="form-control @error('scripture_references') is-invalid @enderror" id="scripture_references" value="{{ old('scripture_references', $ebook->scripture_references) }}">
                                    @error('scripture_references')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="scripture_database_link">Scripture Database Link</label>
                                    <input type="url" name="scripture_database_link" class="form-control @error('scripture_database_link') is-invalid @enderror" id="scripture_database_link" value="{{ old('scripture_database_link', $ebook->scripture_database_link) }}">
                                    @error('scripture_database_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="reflection_questions">Reflection Questions</label>
                            <textarea name="reflection_questions" class="form-control @error('reflection_questions') is-invalid @enderror" id="reflection_questions" rows="3">{{ old('reflection_questions', $ebook->reflection_questions) }}</textarea>
                            @error('reflection_questions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image">
                            @if($ebook->cover_image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $ebook->cover_image) }}" alt="Current Cover" style="max-width: 200px;">
                                </div>
                            @endif
                            @error('cover_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <hr>
                        <h4>SEO Information</h4>
                        
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" value="{{ old('meta_title', $ebook->seoMeta->meta_title ?? '') }}">
                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" rows="2">{{ old('meta_description', $ebook->seoMeta->meta_description ?? '') }}</textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" value="{{ old('meta_keywords', $ebook->seoMeta->meta_keywords ?? '') }}">
                            @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update E-Book</button>
                            <a href="{{ route('ebooks.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                    
                    <!-- File Upload Section -->
                    <hr>
                    <h4>Upload Files</h4>
                    <form action="{{ route('admin.ebooks.upload-files', $ebook) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="files">Select Files (PDF, EPUB, MOBI)</label>
                            <input type="file" name="files[]" class="form-control-file" id="files" multiple>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Upload Files</button>
                        </div>
                    </form>
                    
                    <!-- Existing Files -->
                    @if($ebook->files->count() > 0)
                    <hr>
                    <h4>Existing Files</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>File Name</th>
                                    <th>Type</th>
                                    <th>Size</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ebook->files as $file)
                                <tr>
                                    <td>{{ $file->original_name }}</td>
                                    <td>{{ strtoupper($file->file_type) }}</td>
                                    <td>{{ number_format($file->file_size / 1024, 2) }} KB</td>
                                    <td>
                                        <a href="{{ route('admin.ebooks.download', $file) }}" class="btn btn-sm btn-primary">Download</a>
                                        <form action="{{ route('admin.ebooks.delete-file', $file) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this file?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection