@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Popular E-Books</h3>
                    <div class="card-tools">
                        <a href="{{ route('ebooks.index') }}" class="btn btn-secondary">Back to E-Books</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($ebooks->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Downloads</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ebooks as $index => $ebook)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($ebook->cover_image)
                                            <img src="{{ asset('storage/' . $ebook->cover_image) }}" alt="{{ $ebook->title }}" width="50">
                                        @else
                                            <div class="bg-light" style="width: 50px; height: 70px; display: flex; align-items: center; justify-content: center;">
                                                <i class="fas fa-book"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.ebooks.show', $ebook) }}">{{ $ebook->title }}</a>
                                    </td>
                                    <td>{{ $ebook->author->name ?? 'N/A' }}</td>
                                    <td>{{ $ebook->download_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No ebooks found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection