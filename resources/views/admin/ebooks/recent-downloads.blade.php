@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Downloads</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.ebooks.index') }}" class="btn btn-secondary">Back to E-Books</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($downloads->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>E-Book Title</th>
                                    <th>File Type</th>
                                    <th>IP Address</th>
                                    <th>Downloaded At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($downloads as $download)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.ebooks.show', $download->ebook) }}">{{ $download->ebook->title }}</a>
                                    </td>
                                    <td>{{ strtoupper($download->file->file_type) }}</td>
                                    <td>{{ $download->ip_address }}</td>
                                    <td>{{ $download->created_at->format('M d, Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>No downloads found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection