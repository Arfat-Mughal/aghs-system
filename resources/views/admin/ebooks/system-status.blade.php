@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">E-Book System Status</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.ebooks.index') }}" class="btn btn-secondary">Back to E-Books</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Database Status -->
                    <h4>Database Tables</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Table</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Authors</td>
                                    <td>
                                        @if($status['database']['authors_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Genres</td>
                                    <td>
                                        @if($status['database']['genres_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Books</td>
                                    <td>
                                        @if($status['database']['ebooks_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Book Files</td>
                                    <td>
                                        @if($status['database']['ebook_files_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>SEO Meta</td>
                                    <td>
                                        @if($status['database']['seo_meta_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Reviews</td>
                                    <td>
                                        @if($status['database']['reviews_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Downloads</td>
                                    <td>
                                        @if($status['database']['downloads_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Formats</td>
                                    <td>
                                        @if($status['database']['formats_table'])
                                            <span class="badge badge-success">✓ Created</span>
                                        @else
                                            <span class="badge badge-danger">✗ Missing</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Storage Status -->
                    <h4 class="mt-4">Storage Configuration</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Component</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Storage Link</td>
                                    <td>
                                        @if($status['storage']['storage_link_exists'])
                                            <span class="badge badge-success">✓ Exists</span>
                                        @else
                                            <span class="badge badge-warning">⚠ Missing</span>
                                            <br><small class="text-muted">Run: php artisan storage:link</small>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Uploads Directory</td>
                                    <td>
                                        @if($status['storage']['uploads_directory'])
                                            <span class="badge badge-success">✓ Exists</span>
                                        @else
                                            <span class="badge badge-info">ℹ Will be created automatically</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Data Status -->
                    <h4 class="mt-4">Sample Data</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Entity</th>
                                    <th>Count</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Authors</td>
                                    <td>{{ $status['data']['authors_count'] }}</td>
                                    <td>
                                        @if($status['data']['authors_count'] > 0)
                                            <span class="badge badge-success">✓ Data Present</span>
                                        @else
                                            <span class="badge badge-warning">⚠ No Data</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Genres</td>
                                    <td>{{ $status['data']['genres_count'] }}</td>
                                    <td>
                                        @if($status['data']['genres_count'] > 0)
                                            <span class="badge badge-success">✓ Data Present</span>
                                        @else
                                            <span class="badge badge-warning">⚠ No Data</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-Books</td>
                                    <td>{{ $status['data']['ebooks_count'] }}</td>
                                    <td>
                                        @if($status['data']['ebooks_count'] > 0)
                                            <span class="badge badge-success">✓ Data Present</span>
                                        @else
                                            <span class="badge badge-warning">⚠ No Data</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Formats</td>
                                    <td>{{ $status['data']['formats_count'] }}</td>
                                    <td>
                                        @if($status['data']['formats_count'] > 0)
                                            <span class="badge badge-success">✓ Data Present</span>
                                        @else
                                            <span class="badge badge-warning">⚠ No Data</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Setup Information -->
                    <div class="alert alert-info mt-4">
                        <h5><i class="icon fas fa-info"></i> Setup Information</h5>
                        <p><strong>One-time Setup Route:</strong> <code>/setup-ebook-system</code></p>
                        <p>Run this route once after deployment to automatically set up all database tables, storage links, and sample data.</p>
                        <p><strong>System Status:</strong> <code>/admin/ebooks-system-status</code></p>
                        <p>Check this page to verify all components are working correctly.</p>
                    </div>

                    <!-- Quick Actions -->
                    <div class="mt-4">
                        <h4>Quick Actions</h4>
                        <div class="btn-group" role="group">
                            <a href="/setup-ebook-system" class="btn btn-primary" onclick="return confirm('This will run migrations and seeders. Continue?')">Run Full Setup</a>
                            <a href="{{ route('ebooks.index') }}" class="btn btn-success">Go to E-Books</a>
                            <a href="{{ route('authors.index') }}" class="btn btn-info">Manage Authors</a>
                            <a href="{{ route('genres.index') }}" class="btn btn-warning">Manage Genres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection