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
    </style>
</head>
<body style="width: 1000px; height:2480px; margin: auto; font-family: Arial, Helvetica, sans-serif;">
<div class="container">
    <div class="row">
        <h3 style="text-align: center;text-shadow: 2px 0px 0px #8a8080;font-size: 25px;">AL-FALAH GRAMMAR HIGH SCHOOL AND
            ACADEMY
        </h3>
    </div>
    <h4 style="text-align: center;text-shadow: 1px 0px 0px #8a8080;">BOARD OF AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY
        .LAHORE CANTT
    </h4>
    <h3 style="text-align: center;">ROLL NUMBER SLIP "MID TERM" (CLASS {{$slip->grade->name}})</h3>
    <h6 style="text-align: center;">( Academic Session {{$slip->session}} )</h6>
    <div>
        <h3 style="text-align: center;margin-bottom:10px;text-decoration: underline;">
            SHOOL CERTIFICATE ( {{$slip->term}} ) EXAMINATION {{$slip->session}}
        </h3>
    </div>
    <div style="width:150px;margin:auto;position: relative;bottom: 0px;">
        <img src="{{asset('web_assets/images/logo.png')}}" style="width: 150px; height: 150px;"/>
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
            <h4 style="font-weight:400;">{{$student->dob}}</h4>
            <h4 style="font-weight:350;">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY ,BHANO CHOK</h4>
        </div>
        <div style="display: inline-block;width: 16%;border: 2px solid #000000;border-radius: 34px;height: 200px;float: right;">
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
        <tr>
            <td>
                1
            </td>
            <td>
                SCIENCE
            </td>
            <td>
                16/08/2021
            </td>
            <td>
                MONDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                2
            </td>
            <td>
                ISLAMIYAT
            </td>
            <td>
                17/08/2021
            </td>
            <td>
                TUESDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                3
            </td>
            <td>
                ENGLISH
            </td>
            <td>
                18/08/2021
            </td>
            <td>
                WEDNESDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                4
            </td>
            <td>
                MATH
            </td>
            <td>
                19/08/2021
            </td>
            <td>
                THURSDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                5
            </td>
            <td>
                URDU
            </td>
            <td>
                20/08/2021
            </td>
            <td>
                FRIDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                6
            </td>
            <td>
                GEOGRAPHY
            </td>
            <td>
                21/08/2021
            </td>
            <td>
                SATURDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                7
            </td>
            <td>
                ISLAMIYAT
            </td>
            <td>
                23/08/2021
            </td>
            <td>
                MONDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
        <tr>
            <td>
                8
            </td>
            <td>
                TABLE BOOK
            </td>
            <td>
                24/08/2021
            </td>
            <td>
                TUESDAY
            </td>
            <td>
                8:30 AM
            </td>
            <td style="border-right: none;">
                09:00 AM to 11:00 AM
            </td>
        </tr>
    </table>
    <div style="text-align: center;">
        <h5 style="font-weight: 500;display: inline-block;">Signature of Candidate:</h5>
        <input type="text" name="text"
               style="border-top:0;border-left:0;border-right:0;border-bottom: 1px solid #000; width: 200px;background: transparent;">
        <h5 style="font-weight: 500;display: inline-block;">Checked By:</h5>
        <input type="text" name="text"
               style="border-top:0;border-left:0;border-right:0;border-bottom: 1px solid #000; width: 180px;background: transparent;">
    </div>
    <h5 style="margin:0;font-weight: 500;">*NOTE:Any error found in the subject/s,date,time & photograph, must be eported to
        the AL-FALAH ADMISSION OFFICE for correction before the commencement of the examination.
    </h5>
    <h5>Tabular Name Bilal SHAHID,FormNo:786786, Center No:AL-FALAH GRAMMAR HIGH SCHOOL</h5>
    <table id="rollNo">
        <tr>
            <th>
                7
            </th>
            <th>
                8
            </th>
            <th>
                6
            </th>
            <th>
                7
            </th>
            <th>
                0
            </th>
            <th>
                1
            </th>
        </tr>
        <tr>
            <td>
                0
            </td>
            <td>
                0
            </td>
            <td>
                0
            </td>
            <td>
                0
            </td>
            <td>
                0
            </td>
            <td>
                0
            </td>
        </tr>
        <tr>
            <td>
                1
            </td>
            <td>
                1
            </td>
            <td>
                1
            </td>
            <td>
                1
            </td>
            <td>
                1
            </td>
            <td>
                1
            </td>
        </tr>
        <tr>
            <td>
                2
            </td>
            <td>
                2
            </td>
            <td>
                2
            </td>
            <td>
                2
            </td>
            <td>
                2
            </td>
            <td>
                2
            </td>
        </tr>
        <tr>
            <td>
                3
            </td>
            <td>
                3
            </td>
            <td>
                3
            </td>
            <td>
                3
            </td>
            <td>
                3
            </td>
            <td>
                3
            </td>
        </tr>
        <tr>
            <td>
                4
            </td>
            <td>
                4
            </td>
            <td>
                4
            </td>
            <td>
                4
            </td>
            <td>
                4
            </td>
            <td>
                4
            </td>
        </tr>
        <tr>
            <td>
                5
            </td>
            <td>
                5
            </td>
            <td>
                5
            </td>
            <td>
                5
            </td>
            <td>
                5
            </td>
            <td>
                5
            </td>
        </tr>
    </table>
</div>

</body>
</html>
