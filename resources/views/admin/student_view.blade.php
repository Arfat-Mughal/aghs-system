<!DOCTYPE html>
<html>
<head>
    <title>{{ucfirst($student->name)}}</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body{
            background: -webkit-linear-gradient(left, #a8abad, #cacdcf);
        }
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
    </style>
</head>
<body>

<div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{URL::asset($student->path)}}" alt="{{$student->name}}" class="rounded">
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ucfirst($student->name)}}
                    </h5>
                    <h6>
                        Roll NO : {{$student->addmission_no}}
                    </h6>
                    <h7>
                        Class {{$student->grade->name}}
                    </h7>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="profile-work">
                    <p>Student Information</p>
                    <a href="">Date of birth : {{ \Carbon\Carbon::parse($student->dob)->format('d-M-Y')}}</a><br/>
                    <a href="">Email : {{$student->email}}</a><br/>
                    <a href="">Religion : {{$student->religion}}</a><br/>
                    <a href="">Cnic : {{$student->b_form}}</a><br/>
                    <a href="">Gender : {{$student->gender}}</a><br/>
                    @if($student->quran == 1)
                    <a href="">Hafiz Quran : Yes </a><br/>
                    @else
                        <a href="">Hafiz Quran : No </a><br/>
                    @endif
                    <a href="">Join : {{ \Carbon\Carbon::parse($student->date)->format('d-M-Y')}}</a><br/>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Father Name</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{$student->father_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Father Cnic</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{$student->cnic}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Father Occupation</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{$student->occupation}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Phone Number</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{$student->phone}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Cell Number</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{$student->cell}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Home Address</label>
                            </div>
                            <div class="col-md-9">
                                <p>{{$student->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</body>
</html>
