@extends('layouts.adminLayout')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-10 col-lg-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Updating Results Cards</h2>
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
                    <form action="{{route('store_update_result_marks',$id)}}" method="post">
                        @csrf
                        <div class="card-body card-block">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Subjects</th>
                                        <th scope="col">Total Marks</th>
                                        <th scope="col">Obtain Marks</th>
                                        <th scope="col">Remarks</th>
                                    </tr>
                                    </thead>
                                    @foreach($recode as $index => $data)
                                    <tbody>
                                        <tr>
                                            <input type="hidden" name="students[{{$index}}][student_id]" value="{{$data->students->id}}">
                                            <th scope="row">{{$data->students->id}}</th>
                                            <td>{{$data->students->name}}</td>
                                            <td>
                                                <input type="hidden" name="students[{{$index}}][subject_id]" value="{{$data->subject->id}}">
                                                {{$data->subject->name}}
                                            </td>
                                            <td>
                                                <input type="hidden" name="students[{{$index}}][total_marks]" value="{{$data->total_marks}}">
                                                {{$data->total_marks}}
                                            </td>
                                            <td>
                                                <input type="number" name="students[{{$index}}][marks]" placeholder="Obtain Marks" value="{{$data->o_marks}}" class="form-control name_list"/>
                                            </td>
                                            <td>
                                                <select type="text" name="students[{{$index}}][remarks]" class="form-control name_list" >
                                                    <option {{ ($data->remarks) == 'Pass' ? 'selected' : '' }}  value="Pass" selected>Pass</option>
                                                    <option {{ ($data->remarks) == 'Fail' ? 'selected' : '' }}  value="Fail">Fail</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                        </div>
                        <div>
                            <button class="btn pull-right btn-primary" type="submit">Update Result card</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
