<!DOCTYPE html>
<html>
<head>
    <title>{{$students[0]->grade->name}}</title>
    @include('adminIncludes.css')
</head>
<body style="width:794px; height:1122px">
@foreach($students as $key => $student)
    <div class="sup-page">
        <div class="container">
            <div class="card">
                <div class="card-header d-flex" style="background-color:rgba(192,192,192,0.3)">
                    <b>{{$student->name}}</b> &nbsp; S/O &nbsp; <b>{{$student->father_name}}</b>
                    <div class="offset-5">
                        <b>Class</b> : {{$student->grade->name}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{URL::asset($student->path)}}" alt="{{$student->name}}" width="110px"
                                 class="rounded">
                        </div>
                        <div class="col-md-5">
                            <ul>
                                <li>
                                    Roll NO :
                                    <b>
                                        {{$student->addmission_no}}
                                    </b>
                                </li>
                                <li>
                                    Date of birth :
                                    <b>{{ \Carbon\Carbon::parse($student->dob)->format('d-M-Y')}}</b>
                                </li>
                                <li>
                                    Student Cnic : <b>{{$student->b_form}}</b>
                                </li>
                                <li>
                                    Father Cnic : <b> {{$student->cnic}}</b>
                                </li>
                                <li>
                                    Occupation : <b> {{$student->occupation}}</b>
                                </li>
                                <li>
                                    Email : <b>{{$student->email}}</b>
                                </li>
                                <li>
                                    Address : <b>{{$student->address}}</b>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <ul>
                                <li>
                                    Gender : <b>{{ucfirst($student->gender)}}</b>
                                </li>
                                <li>
                                    @if($student->quran == 1)
                                        Hafiz Quran : <b>Yes</b>
                                    @else
                                        Hafiz Quran : <b>No</b>
                                    @endif
                                </li>
                                <li>
                                    Join : <b> {{ \Carbon\Carbon::parse($student->date)->format('d-M-Y')}}</b>
                                </li>
                                <li>
                                    Religion : <b>{{$student->religion}}</b>
                                </li>
                                <li>
                                    Phone : <b>{{$student->phone}}</b>
                                </li>
                                <li>
                                    Cell : <b>{{$student->cell}}</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

</body>
</html>
