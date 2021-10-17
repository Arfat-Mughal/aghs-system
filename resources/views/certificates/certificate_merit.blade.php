<!DOCTYPE html>
<html>
<head>
    <title>Template</title>
    <style type="text/css">
        p, h1, h2, h3, h4, h5, h6 {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .clearfix {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body style="max-width: 1120px; height: 950px; margin: auto; font-family: Arial, Helvetica, sans-serif;">

<div
    style="border-left: 3px solid #000; border-bottom: 3px solid #000; border-right: 3px solid #000; padding-left: 50px;border-top: 3px solid #000;margin-top: 40px;background-image: url({{asset('admin_assets/images/background.png')}});background-repeat: no-repeat;background-position: center;background-size: 50% 60%;">
    <h3 style="text-align: left;font-size: 30px;color: #027e02;position: relative;top: -39px;border: 2px solid #000;border-radius: 12px;display: inline-block;background: #fff;padding: 8px 23px;">
        CERTIFICATE OF MERIT</h3>
    <div style="width: 100%;" class="clearfix">
        <div style="float: left;width: 60%;">
            <h4 style="font-weight:400;display: inline-block;">Ref. No.</h4>
            <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left:4px;">{{$data['ref_no']}}</p>
            <div>
                <h4 style="font-weight:400;display: inline-block;">Date:</h4>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;width: 130px;">
                    {{$data['date']}}</p>
                <h4 style="margin-left: 100px;">This is to certify that</h4>
            </div>
            <div>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;width: 150px;margin-left: 40px;">
                    {{$data['name']}}</p>
                <h4 style="font-weight:400;display: inline-block;">S/O,D/O.</h4>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 200px;">
                    {{$data['father_name']}}</p>
            </div>
            <p style="margin-left: 100px;">With registration code</p>
            <p style="margin-left: 70px;display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 190px;text-align: center;">{{$data['registration_code']}}</p>
        </div>
        <div style="display: inline-block;float: right;width: 38%;text-align: center;">
            <div><img src="{{asset('admin_assets/images/logo_header.png')}}" style="width: 150px; height: 120px"/></div>
            <p style="font-size: 10px;text-align: center;margin-top: -4px;">A GROUP OF COLLEGES</p>
            <h2 style="font-size: 18px;color: #027e02;">AL-FALAH COMPUTER COLLEGE</h2>
            <h3 style="font-size: 16px;">PUNJAB PAKISTAN</h3>
        </div>
    </div>
    <div style="width: 100%;margin-top: 5px;" class="clearfix">
        <div style="float: left;width: 60%;">
            <p>has completed his/her project based training of</p>
            <p style="margin-left: 70px;display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 290px;text-align: center;">
                FOUNDATION</p>
            <div>
                <p style="margin-left: 130px;display: inline-block;">with in </p>
                <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 50px;">{{$data['weeks']}}</p>
                <p style="display: inline-block;">weeks</p>
            </div>
            <div>
                <p>The content of this course are as under</p>
                @if($data['content_1'])
                    <p style="margin-bottom: 5px;">1. <span style="margin-left:15px;">{{$data['content_1']}}</span></p>
                @endif
                @if($data['content_2'])
                    <p style="margin-bottom: 5px;margin-top: 5px;">2. <span
                            style="margin-left:15px;">{{$data['content_2']}}</span></p>
                @endif
                @if($data['content_3'])
                    <p style="margin-bottom: 5px;margin-top: 5px;">3. <span
                            style="margin-left:15px;">{{$data['content_3']}}</span></p>
                @endif
                @if($data['content_4'])
                    <p style="margin-bottom: 5px;margin-top: 5px;">4. <span
                            style="margin-left:15px;">{{$data['content_4']}}</span></p>
                @endif
                @if($data['content_5'])
                    <p style="margin-bottom: 5px;margin-top: 5px;">5. <span
                            style="margin-left:15px;">{{$data['content_5']}}</span></p>
                @endif
                @if($data['content_6'])
                    <p style="margin-bottom: 5px;margin-top: 5px;">6. <span
                            style="margin-left:15px;">{{$data['content_6']}}</span></p>
                @endif
            </div>
        </div>
        <div style="display: inline-block;float: right;width: 38%;text-align: center;">
            <div><img src="{{asset('admin_assets/images/logo_header.png')}}" style="width: 150px; height: 120px"/></div>
            <p style="font-size: 14px;text-align: center;margin-top: -4px;">BHANO CHAK CAMPUS</p>
            <p style="font-size: 12px;text-align: center;">G.T Road Wahga Lahore</p>
            <p style="font-size: 12px;text-align: center;">PH: 042-37172294</p>
        </div>
    </div>
    <div class="clearfix" style="width: 100%;margin-top: 10px;">
        <div style="width:32%;display:inline-block;text-align: center;">
            <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 150px;"></p>
            <p> Principal</p>
        </div>
        <div style="width:32%;display:inline-block;text-align: center;">
            <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 150px;"></p>
            <p> Quality Controller</p>
        </div>
        <div style="width:32%;display:inline-block;text-align: center;">
            <p style="display: inline-block; border-bottom: 1px solid #000;font-size: 14px;padding-left: 8px;width: 150px;"></p>
            <p> Managing Director</p>
        </div>
    </div>
</div>


</body>
</html>
