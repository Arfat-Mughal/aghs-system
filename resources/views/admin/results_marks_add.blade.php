@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Creating Results Cards</h2>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-sm-8 col-md-10 col-lg-12 mt-5">
                    <form action="" method="post" name="add_name" id="add_name">
                        @csrf
                        <div class="card-body card-block">
                            <div class="row">
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Name</th>
                                        @foreach($subjects as $item)
                                        <th>{{$item->subject->name}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tr>
                                        @foreach($students as $student)
                                        <td>
                                            <input type="text" name="term"
                                                   placeholder="Term"
                                                   value="{{$student->name}}"
                                                   class="form-control name_list" disabled/>
                                        </td>
                                            @foreach($subjects as $item)
                                            <td>
                                                <input type="number" name="marks"
                                                       placeholder="Obtain Marks"
                                                       class="form-control name_list"/>
                                            </td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div>
                            <button class="btn pull-right btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
