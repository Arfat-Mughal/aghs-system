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
                    <form action="{{route('store_result_marks',$id)}}" method="post" name="add_name" id="add_name">
                        @csrf
                        <div class="card-body card-block">
                            @foreach($students as $key => $student)
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">{{$loop->iteration}}</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Subjects</th>
                                    <th scope="col">Total Marks</th>
                                    <th scope="col">Obtain Marks</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <input type="hidden" name="recode_id" value="{{$recode->id}}">
                                    @foreach($subjects as $sb => $item)
                                        <tr>
                                            <input type="hidden" name="students[{{$key}}][{{$sb}}][student_id]" value="{{$student->id}}">
                                            <th scope="row">{{$student->id}}</th>
                                            <td>{{$student->name}}</td>
                                        <td>
                                            <input type="hidden" name="students[{{$key}}][{{$sb}}][subject_id]" value="{{$item->subject->id}}">
                                            {{$item->subject->name}}
                                        </td>
                                            <td>
                                            <input type="hidden" name="students[{{$key}}][{{$sb}}][total_marks]" value="{{$item->t_marks}}">
                                            {{$item->t_marks}}
                                        </td>
                                        <td><input type="number" name="students[{{$key}}][{{$sb}}][marks]" placeholder="Obtain Marks" class="form-control name_list"/></td>
                                        <td>
                                            <select type="text" name="students[{{$key}}][{{$sb}}][remarks]" class="form-control name_list">
                                                <option value="Pass" selected>Pass</option>
                                                <option value="Fail">Fail</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @endforeach
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
