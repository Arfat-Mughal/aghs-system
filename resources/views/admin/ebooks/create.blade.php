@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New E-Book</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('ebooks.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title *</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
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
                                            <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
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
                                    <input type="date" name="release_date" class="form-control @error('release_date') is-invalid @enderror" id="release_date" value="{{ old('release_date') }}" required>
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
                                    <input type="number" name="length" class="form-control @error('length') is-invalid @enderror" id="length" value="{{ old('length') }}">
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
                                    <option value="{{ $genre->id }}" {{ in_array($genre->id, old('genres', [])) ? 'selected' : '' }}>{{ $genre->name }}</option>
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
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="short_description" rows="3">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="long_description">Long Description</label>
                            <textarea name="long_description" class="form-control @error('long_description') is-invalid @enderror" id="long_description" rows="5">{{ old('long_description') }}</textarea>
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
                                    <input type="text" name="scripture_references" class="form-control @error('scripture_references') is-invalid @enderror" id="scripture_references" value="{{ old('scripture_references') }}">
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
                                    <input type="url" name="scripture_database_link" class="form-control @error('scripture_database_link') is-invalid @enderror" id="scripture_database_link" value="{{ old('scripture_database_link') }}">
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
                            <textarea name="reflection_questions" class="form-control @error('reflection_questions') is-invalid @enderror" id="reflection_questions" rows="3">{{ old('reflection_questions') }}</textarea>
                            @error('reflection_questions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="cover_image">Cover Image</label>
                            <input type="file" name="cover_image" class="form-control-file @error('cover_image') is-invalid @enderror" id="cover_image">
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
                            <input type="text" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" value="{{ old('meta_title') }}">
                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                            <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" value="{{ old('meta_keywords') }}">
                            @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create E-Book</button>
                            <a href="{{ route('ebooks.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection