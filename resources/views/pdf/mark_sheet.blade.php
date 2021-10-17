<!DOCTYPE html>
<html lang="">
<head>
    <title></title>
    <style>
        #for1 {
            width: 100%;
            text-align: center;
        }

        #for1 th, #for1 td {
            border-bottom: 1px solid #000;
            border-right: 1px solid #000;
            padding-top: 20px;
            padding-bottom: 20px;
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
    </style>
</head>
<body style="width: 1000px; height:2480px; margin: auto;">
<h3 style="text-align: center;">AL-FALAH GRAMMAR HIGH SCHOOL $ ACADEMY <span
        style="margin-left:20px;">(P.G To MATRIC)</span></h3>
<h4 style="text-align: center;">VILLAGE BHANO CHAI LAHORE CANTT <span style="margin-left:50px;">CELL # 0321-4960275,PHONE # 042-37172294</span>
</h4>
<div style="width: 100%;" class="clearfix row">
    <div style="float: left;margin-top: 10px;">
        <h4>ROLL NO:<span style="font-weight:400;"> {{$student->addmission_no}} </span></h4>
        <h4>RESULT:<span style="font-weight:400;"> PASS</span></h4>
    </div>
    <div style="display: inline-block;width: 700px;text-align: center;margin:auto">
        <img src="{{asset('web_assets/images/logo.png')}}" style="width: 150px; height: 150px;"/>
    </div>
    <div style="float: right;margin-top: 10px;">
        <h4>CLASS:<span style="font-weight:400;"> {{$student->grade->name}}</span></h4>
        <h4>POSITION:<span style="font-weight:400;"> 1st</span></h4>
    </div>
</div>
<h3 style="text-align: center;margin-bottom
    :40px;text-decoration: underline;">SHOOL CERTIFICATE ( {{$slip->term}} ) EXAMINATION {{$slip->session}}</h3>
<div style="width: 100%;" class="clearfix">
    <div style="float: left;width: 30%;text-align: center;">
        <h4>Student Name:</h4>
        <h4>Father Name:</h4>
        <h4>Institution/District:</h4>
    </div>
    <div style="float: left;width: 48%;">
        <h4 style="font-weight:400;">{{$student->name}}</h4>
        <h4 style="font-weight:400;">{{$student->father_name}}</h4>
        <h4 style="font-weight:400;">AL-FALAH GRAMMAR HIGH SCHOOL LAHORE CANTT</h4>
    </div>
    <div style="display: inline-block;width: 16%;height: 150px;float: right;">
        <img src="{{$student->path}}" style="width: 165px; height: 160px; border-radius: 17%;"/>
    </div>
</div>
<div class="clearfix">
    <h5 style="margin-bottom: 0px;">He/She obtained the marks as following:-</h5>

</div>
<table id="for1" style="width: 100%;border: 2px solid #000;border-spacing: 0px">
    <tr style="font-size: 20px">
        <th>
            SUBJECT
        </th>
        <th>
            TOTAL MARKS
        </th>
        <th>
            OBTAINED MARKS
        </th>
        <th style="border-right: none;">
            REMARKS
        </th>
    </tr>
    @foreach($recode_marks as $marks)
            <tr style="font-size: 18px">
                <td style="font-weight: bold;">
                    {{$marks->subject->name}}
                </td>
                <td>
                    100
                </td>
                <td>
                    {{$marks->o_marks}}
                </td>
                <td style="border-right: none;">
                    {{$marks->remarks}}
                </td>
            </tr>
    @endforeach
    <tr style="font-size: 18px">
        <td style="font-weight: bold;">
            TOTAL
        </td>
        <td style="font-weight: bold;">
            350
        </td>
        <td style="border-right: none;font-weight: bold;" colspan="2">
            MARKS OBTAINED:323
        </td>
    </tr>
</table>
<h5 style="margin-bottom: 0px;margin-top: 10px;">The Candidate has Passed and obtained Marks Three Hundred and Twenty
    Three.</h5>
<h4 style="margin:0;">NOTE:</h4>
<p style="margin: 2px 0; font-size: 20px;">
    (i)This provisional result intimation is issued as a notice only . Errors and omissions excepted <span
        style="text-decoration: underline;">If a candidate finds any discrepancy in the Result lntimation or desires correction in any of the particulars, he/she may contact the AL-FALAH SCHOOL within 5 days after declaration of the result.</span>
    Any entry appearing in it does not itself confer any right or privlege independently for the grant of proper
    certificate,which will be issued under the Rules/ Regulations.
</p>
<p style="margin: 2px 0; font-size: 20px">
    (ii)The Star (*) indicates that the candidate has passed the subject/s with concessional marks under School Rule. In
    case he/she is not willing to accept the concessional marks, necessary permission to reappear in the subject/s may
    be obtained within the schedule for submission of admission form and fee for the next immediate examination provided
    he/she has the chance/s to re-appear as a compartment candidate in the said examination.
</p>

</body>
</html>
