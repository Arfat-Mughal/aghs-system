@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Banners</h2>
                        </div>
                    </div>
                </div>
                <form action="{{route('store_banners')}}" class="mt-2 border" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="Title" >
                        <p>Title</p>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </label>
                    <label for="file" >
                        <p>Image</p>
                        <input type="file" name="file" id="file" size="2048" required>
                    </label>
                    <button type="submit" class="btn btn-warning">Save</button>
                </form>
                <div class="mt-2">
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($notifications as $notification)
                            <tr>
                                <td scope="row">{{$notification->id}}</td>
                                <td scope="row">{{$notification->name}}</td>
                                <td><img src="{{asset($notification->path)}}" alt="{{$notification->name}}" height="40px" width="60px" class="rounded"></td>
                                <td><a href="{{route('delete_banners',$notification->id)}}" class="btn btn-danger ml-2" role="button" aria-pressed="true">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
