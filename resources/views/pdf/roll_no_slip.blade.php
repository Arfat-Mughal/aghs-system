<!DOCTYPE html>
<html>
<head>
    <title>Template</title>
    <style type="text/css">
        #for1 {
            width: 100%;
            text-align: center;
        }

        #for1 th, #for1 td {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            padding-top: 5px;
            padding-bottom: 5px;
            font-family: heletica;
        }

        #for1 td {
            padding: 3px 0;
        }

        .clearfix {
            content: '';
            display: table;
            clear: both;
        }

        #rollNo th, #rollNo td {
            padding: 4px;
        }

        #rollNo th {
            font-size: 20px;
        }
        @media print {
            * {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body style="width: 1000px; height:2480px; margin: auto; font-family: Arial, Helvetica, sans-serif;">
<div class="container">
    <div class="row">
        <h3 style="text-align: center;text-shadow: 2px 0px 0px #8a8080;font-size: 30px;">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY
        </h3>
    </div>
    <h4 style="text-align: center;text-shadow: 1px 0px 0px #8a8080;">BOARD OF AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY LAHORE CANTT
    </h4>
    <h3 style="text-align: center;">ROLL NUMBER SLIP "{{$slip->term}}" (CLASS {{$slip->grade->name}})</h3>
    <h4 style="text-align: center;">( Academic Session {{$slip->session}} )</h4>
{{--    <div>--}}
{{--        <h3 style="text-align: center;margin-bottom:10px;text-decoration: underline;">--}}
{{--            SCHOOL CERTIFICATE ( {{$slip->term}} ) EXAMINATION {{$slip->session}}--}}
{{--        </h3>--}}
{{--    </div>--}}
    <div style="width:150px;margin:auto;position: relative;bottom: 0px;">
        <img src="{{asset('web_assets/images/logo_header.jpg')}}" style="width: 150px; height: 150px;"/>
    </div>
    <div style="width: 100%;" class="clearfix">
        <div style="float: left;width: 15%;">
            <h4>Roll No:</h4>
            <h4>Name:</h4>
            <h4>Father's Name:</h4>
            <h4>Date of Birth</h4>
            <h4>Exam Center:</h4>
        </div>
        <div style="float: left;width: 60%;">
            <h4 style="font-weight:400;">{{$student->addmission_no}}</h4>
            <h4 style="font-weight:400;">{{$student->name}}</h4>
            <h4 style="font-weight:400;">{{$student->father_name}}</h4>
            <h4 style="font-weight:400;">{{ \Carbon\Carbon::parse($student->dob)->format('d-M-Y')}}</h4>
            <h4 style="font-weight:350;">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY ,BHANO CHAK</h4>
        </div>
        <div
            style="display: inline-block;width: 16%;border: 2px solid #000000;border-radius: 34px;height: 200px;float: right;">
            <img src="{{$student->path}}" style="width: 161px; height: 200px; border-radius: 17%;"/>
        </div>
    </div>
    <div class="clearfix"></div>
    <table id="for1" style="width: 100%;border: 2px solid #000;border-spacing: 0px">
        <tr>
            <th>
                Sr #
            </th>
            <th>
                SUBJECT
            </th>
            <th>
                DATE
            </th>
            <th>
                DAY
            </th>
            <th>
                REPORTING TIME
            </th>
            <th style="border-right: none;">
                TIMINGS
            </th>
        </tr>
        @foreach($dataSheets as $index => $data)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    {{ucfirst($data->subject->name)}}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($data->date)->format('d/m/Y')}}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($data->date)->format('l')}}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($data->reporting)->format('h:i A')}}
                </td>
                <td style="border-right: none;">
                    {{ \Carbon\Carbon::parse($data->start_time)->format('h:i A')}}
                    To {{ \Carbon\Carbon::parse($data->end_time)->format('h:i A')}}
                </td>
            </tr>
        @endforeach
    </table>
    <div style="text-align: center;">
        <h5 style="font-weight: 500;display: inline-block;">Signature of Candidate:</h5>
        <input type="text" name="text"
               style="border-top:0;border-left:0;border-right:0;border-bottom: 1px solid #000; width: 200px;background: transparent;">
        <h5 style="font-weight: 500;display: inline-block;">Checked By:</h5>
        <input type="text" name="text"
               style="border-top:0;border-left:0;border-right:0;border-bottom: 1px solid #000; width: 180px;background: transparent;">
    </div>
    <h5 style="margin:0;font-weight: 500;">*NOTE:Any error found in the subject/s,date,time & photograph, must be
        eported to
        the AL-FALAH ADMISSION OFFICE for correction before the commencement of the examination.
    </h5>
    <h5>Tabulator Name Bilal SHAHID,FormNo:786786, Center No:AL-FALAH GRAMMAR HIGH SCHOOL</h5>
    <div  style="
        background-image: url('{{asset('web_assets/images/inst2.jpg')}}');
        background-repeat: no-repeat;
        background-position: right;
        background-size: 60% 100%;
        ">
        <table id="rollNo">
            <tr>
                <th>
                    {{$student->addmission_no[0]}}
                </th>
                @if(isset($student->addmission_no[1]))
                    <th>
                        {{$student->addmission_no[1]}}
                    </th>
                @endif
                @if(isset($student->addmission_no[2]))
                    <th>
                        {{$student->addmission_no[2]}}
                    </th>
                @endif
                @if($student->addmission_no[3])
                    <th>
                        {{$student->addmission_no[3]}}
                    </th>
                @endif
                @if(isset($student->addmission_no[4]))
                    <th>
                        {{$student->addmission_no[4]}}
                    </th>
                @endif
                @if(isset($student->addmission_no[5]))
                    <th>
                        {{$student->addmission_no[5]}}
                    </th>
                @endif
            </tr>
            <tr>
                <td>
                    0
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        0
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        0
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        0
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        0
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        0
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    1
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        1
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        1
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        1
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        1
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        1
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    2
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        2
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        2
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        2
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        2
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        2
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    3
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        3
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        3
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        3
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        3
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        3
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    4
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        4
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        4
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        4
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        4
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        4
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    5
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        5
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        5
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        5
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        5
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        5
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    6
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        6
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        6
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        6
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        6
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        6
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    7
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        7
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        7
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        7
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        7
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        7
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    8
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        8
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        8
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        8
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        8
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        8
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    9
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        9
                    </td>
                @endif
            </tr><tr>
                <td>
                    9
                </td>
                @if(isset($student->addmission_no[1]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[2]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[3]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[4]))
                    <td>
                        9
                    </td>
                @endif
                @if(isset($student->addmission_no[5]))
                    <td>
                        9
                    </td>
                @endif
            </tr>
        </table>
    </div>
</div>

</body>
</html>
