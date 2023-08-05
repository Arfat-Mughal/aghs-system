<!DOCTYPE html>
<html>
<head>
    <title>Template</title>
    <style type="text/css">
        @page {
            size: A4 landscape;
        }

        body {
            max-width: 11.69in;
            height: 8.27in;
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        p, h1, h2, h3, h4, h5, h6 {
            margin: 10px 0;
        }

        .clearfix::after {
            content: "";
            display: table;
            clear: both;
        }

        .certificate-container {
            border-left: 3px solid #000;
            border-bottom: 3px solid #000;
            border-right: 3px solid #000;
            padding-left: 50px;
            border-top: 3px solid #000;
            margin-top: 40px;
            background-image: url({{asset('admin_assets/images/logo_header_background.png')}});
            background-repeat: no-repeat;
            background-position: center;
            background-size: 50% 60%;
        }

        .certificate-title {
            text-align: left;
            font-size: 30px;
            color: #027e02;
            position: relative;
            top: -39px;
            border: 2px solid #000;
            border-radius: 12px;
            display: inline-block;
            background: #fff;
            padding: 8px 23px;
        }

        .header-logo {
            width: 150px;
            height: 120px;
        }

        .college-info {
            font-size: 10px;
            text-align: center;
            margin-top: -4px;
        }

        .college-name {
            font-size: 18px;
            color: #027e02;
        }

        .college-location {
            font-size: 16px;
        }

        .content-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .content-list li {
            margin-bottom: 5px;
            font-weight: bold;
        }

        .signature-box {
            width: 32%;
            display: inline-block;
            text-align: center;
        }

        .signature-line {
            display: inline-block;
            border-bottom: 1px solid #000;
            font-size: 14px;
            padding-left: 8px;
            width: 150px;
        }
    </style>
</head>
<body>
<div class="certificate-container">
    <h3 class="certificate-title">
        CERTIFICATE OF MERIT
    </h3>
    <div class="clearfix">
        <div style="float: left;width: 60%;">
            <h4 style="font-weight:400;display: inline-block;">Ref. No.</h4>
            <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left:4px;"><strong>{{$data['ref_no']}}</strong></p>
            <div>
                <h4 style="font-weight:400;display: inline-block;">Date:</h4>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;width: 130px;">
                    <strong>{{$data['date']}}</strong></p>
                <h4 style="margin-left: 100px;">This is to certify that</h4>
            </div>
            <div>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;width: 150px;margin-left: 40px;">
                    <strong>{{$data['name']}}</strong></p>
                <h4 style="font-weight:400;display: inline-block;">S/O,D/O.</h4>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 200px;">
                    <strong>{{$data['father_name']}}</strong></p>
            </div>
            <p style="margin-left: 100px;">With registration code</p>
            <p style="margin-left: 70px;display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 190px;text-align: center;"><strong>{{$data['registration_code']}}</strong></p>
        </div>
        <div style="display: inline-block;float: right;width: 38%;text-align: center;">
            <div><img src="{{asset('web_assets/images/logo_header.jpg')}}" class="header-logo" alt="Logo"/></div>
            <p class="college-info">A GROUP OF COLLEGES</p>
            <h2 class="college-name">AL-FALAH COMPUTER COLLEGE</h2>
            <h3 class="college-location">PUNJAB PAKISTAN</h3>
        </div>
    </div>
    <div style="width: 100%;margin-top: 5px;" class="clearfix">
        <div style="float: left;width: 60%;">
            <p>has completed his/her project based training of</p>
            <p style="margin-left: 70px;display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 290px;text-align: center;">
                <strong>FOUNDATION</strong></p>
            <div>
                <p style="margin-left: 130px;display: inline-block;">with in </p>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 50px;"><strong>{{$data['weeks']}}</strong></p>
                <p style="display: inline-block;">weeks</p>
            </div>
            <div>
                <p><strong>The content of this course are as under</strong></p>
                @if(isset($data->contents))
                    <ul class="content-list">
                        @foreach($data->contents as $key => $data)
                            <li><span style="margin-left:15px;">{{$data->name}}</span></li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div style="display: inline-block;float: right;width: 38%;text-align: center;">
            <div><img src="{{asset('web_assets/images/logo_header.jpg')}}" class="header-logo" alt="Logo"/></div>
            <p class="college-info">BHANO CHAK CAMPUS</p>
            <p class="college-location">G.T Road Wahga Lahore</p>
            <p class="college-location">PH: 042-37172294</p>
        </div>
    </div>
    <div class="clearfix" style="width: 100%;margin-top: 10px;">
        <div style="width:32%;display:inline-block;text-align: center;">
            <p class="signature-line"></p>
            <p> Principal</p>
        </div>
        <div style="width:32%;display:inline-block;text-align: center;">
            <p class="signature-line"></p>
            <p> Quality Controller</p>
        </div>
        <div style="width:32%;display:inline-block;text-align: center;">
            <p class="signature-line"></p>
            <p> Managing Director</p>
        </div>
    </div>
</div>
</body>
</html>
