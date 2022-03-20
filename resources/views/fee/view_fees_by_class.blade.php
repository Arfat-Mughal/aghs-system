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
<style>
    @page {
        size: A4;
        margin: 2;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
        /* ... the rest of the rules ... */
    }
</style>
<body>
@foreach($fee_details as $detail)
        <div class="container mt-2 mb-2">
            <div class="row">
                <div class="col-3">
                    <img src="{{asset('web_assets/images/logo_header.png')}}" alt="aghs" width="120px" height="120px">
                </div>
                <div class="col-8">
                    <h4 class="text-center">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY</h4>
                    <h5 class="text-center">VILLAGE BHANO CHAK LAHORE CANTT </h5>
                    <p class="text-center">CELL # 0321-4960275,PHONE # 042-37172294</p>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Father Name</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Roll No</th>
                    <th scope="col">Last Date</th>
                    <th scope="col">Issue Date </th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$detail->student->name}}</td>
                        <td>{{$detail->student->father_name}}</td>
                        <td>{{$detail->student->grade->name}}</td>
                        <td>{{$detail->student->addmission_no}}</td>
                        <td>{{$detail->last_date->format('d-M-y')}}</td>
                        <td>{{$detail->issue_date->format('d-M-y')}}</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Details</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($detail->payments as $payment)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$payment->detail}}</td>
                        <td>Rs : {{$payment->fee}}</td>
                        @if($payment->is_paid)
                            <td>Paid</td>
                        @else
                            <td>UnPaid</td>
                        @endif
                    </tr>
                @endforeach
                <tr>
                    <td>Total</td>
                    <td>Payable Amount</td>
                    <td colspan="2" class="font-weight-bold text-center"> Rs : {{$detail->payments->sum('fee')}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    <br/>
@endforeach

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
