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

        h1 {
            font-size: 36px;
        }
    </style>
</head>
<body style="width: 1000px; height:2480px; margin: auto;">
<h1 style="text-align: center;">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY</h1>
<h4 style="text-align: center;">VILLAGE BHANO CHAK LAHORE CANTT <span style="margin-left:50px;">CELL # 0321-4960275,PHONE # 042-37172294</span>
</h4>
<div style="width: 100%;" class="clearfix row">
    <div style="float: left;margin-top: 10px;">
        <h4>ROLL NO:<span style="font-weight:400;"> {{$student->addmission_no}} </span></h4>
        <h4>RESULT:<span style="font-weight:400;">
                @if(isset($vals['Fail'])  && $vals['Fail'] > 2)
                    Fail
                @elseif(isset($vals['Fail']) && $vals['Fail'] <= 2)
                    Fail
                @else
                    Pass
                @endif
            </span></h4>
    </div>
    <div style="display: inline-block;width: 700px;text-align: center;margin:auto">
        <img src="{{asset('web_assets/images/logo_header.jpg')}}" style="width: 150px; height: 150px;"/>
    </div>
    <div style="float: right;margin-top: 10px;">
        <h4>CLASS:<span style="font-weight:400;"> {{$student->grade->name}}</span></h4>
        <h4>POSITION:<span style="font-weight:400;">
                 @if(isset($vals['Fail'])  && $vals['Fail'] > 2)
                    Fail
                @elseif(isset($vals['Fail']) && $vals['Fail'] <= 2)
                    Fail
                @else
                    {{ $student->position }}
                @endif
            </span></h4>
    </div>
</div>
<h3 style="text-align: center;margin-bottom
    :40px;text-decoration: underline;">SCHOOL CERTIFICATE ( {{$slip->term}} ) EXAMINATION {{$slip->session}}</h3>
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
    <h4 style="margin-bottom: 0px;">He/She obtained the marks as following:-</h4>

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
                <td style="font-weight: normal;">
                    {{$marks->subject->name}}
                </td>
                <td>
                    {{$marks->total_marks}}
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
            TOTAL MARKS
        </td>
        <td style="font-weight: bold;">
            {{$totalMarks}}
        </td>
        <td style="border-right: none;font-weight: bold;" colspan="2">
            @if(isset($vals['Fail'])  && $vals['Fail'] > 2)
                Fail
            @elseif(isset($vals['Fail']) && $vals['Fail'] <= 2)
                RESULT:--
            @else
                MARKS OBTAINED: {{$obtainMarks}}
            @endif
        </td>
    </tr>
</table>
<h4 style="margin-bottom: 0px;margin-top: 10px;">
    @if(isset($vals['Fail'])  && $vals['Fail'] > 2)
        The Candidate has failed in {{$vals['Fail']}} subjects
    @elseif(isset($vals['Fail']) && $vals['Fail'] <= 2)
        The Candidate has failed in {{$vals['Fail']}} subjects
    @else
        The Candidate has Passed and obtained Marks {{ucfirst($numberToWord)}}
    @endif
</h4>
<h4 style="margin:0; margin-top: 10px">NOTE:</h4>
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
<div style="margin-top: 20px">
    <button style="color: red" id="print-window" onclick="window.print();">Print</button>
</div>

</body>
</html>
