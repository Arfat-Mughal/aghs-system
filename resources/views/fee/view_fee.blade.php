<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Challan Form</title>
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-3">
            <img src="{{asset('web_assets/images/logo_header.png')}}" alt="aghs" width="150px" height="150px">
        </div>
        <div class="col-8">
            <h2 class="text-center">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY</h2>
            <h4 class="text-center">VILLAGE BHANO CHAK LAHORE CANTT </h4>
            <p class="text-center">CELL # 0321-4960275,PHONE # 042-37172294</p>
        </div>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col-4 text-center">
            <b>Roll No :</b> {{$details->student->addmission_no}}
        </div>
        <div class="col-4 text-center">
            <b>Student Name :</b> {{$details->student->name}}
        </div>
        <div class="col-4 text-center">
            <b>Father Name :</b> {{$details->student->father_name}}
        </div>
    </div>
    <div class="row">
        <div class="col-3 text-center">
            <b>No:</b> {{$details->id}}
        </div>
        <div class="col-3 text-center">
            <b>Issue Date:</b> {{$details->issue_date->format('d-M-y')}}
        </div>
        <div class="col-3 text-center">
            <b>Last Date:</b> {{$details->last_date->format('d-M-y')}}
        </div>
        <div class="col-3 text-center">
            <b>Class :</b> {{$details->student->grade->name}}
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Details</th>
            <th scope="col">Fee</th>
            <th scope="col">Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            @foreach($details->payments as $payment)
                <th scope="row">{{$payment->id}}</th>
                <td>{{$payment->detail}}</td>
                <td>{{$payment->fee}}</td>
                @if($payment->is_paid)
                    <td>Paid</td>
                @else
                    <td>UnPaid</td>
                @endif
            @endforeach
        </tr>
        </tbody>
    </table>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
