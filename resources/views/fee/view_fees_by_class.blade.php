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
    @media print{
        .table-bordered td, .table-bordered th {
            border-width: 3px !important;
            border-style: solid !important;
            border-color: black !important;
            -webkit-print-color-adjust:exact ;
        }
    }
    .table-bordered td, .table-bordered th {
        border: 3px solid #0a0909;
    }
    @page {
        size: A4;
        margin: 0;
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
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="4">
                        <h2 class="text-center">AL-FALAH GRAMMAR HIGH SCHOOL AND ACADEMY</h2>
                        <p class="text-center mb-0">Online Payment Jazz Cash / Easy Paisa 0321-4960275 or HBL account Title : Bilal Shahid Account # 05227902408503</p>
                    </th>
                </tr>
                <tr>
                    <th scope="col">Student Name</th>
                    <td>{{$detail->student->name}}</td>

                    <th scope="col">Father Name</th>
                    <td>{{$detail->student->father_name}}</td>
                </tr>
                <tr>
                    <th scope="col">Roll No</th>
                    <td>{{$detail->student->addmission_no}}</td>

                    <th scope="col">Class</th>
                    <td>{{$detail->student->grade->name}}</td>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col">Total Dues / FEE</th>
                        <td colspan="3">
                            @foreach($detail->payments as $payment)
                                {{$payment->detail}} = Rs : {{$payment->fee}} +
                            @endforeach
                        </td>
{{--                        <td> Rs : {{$detail->payments->sum('fee')}}</td>--}}
                    </tr>
                <tr>
                    <th scope="col">Total Payable/Fee</th>
                    <td>
                        {{$detail->issue_date->format('d/M/y')}}
                    </td>
                    <td>{{$detail->last_date->format('d/M/y')}}</td>
                    <td>
                        Rs : {{$detail->payments->sum('fee')}}
                    </td>
                </tr>
                    <tr>
                    <th scope="col">Late Payment/Fee</th>
                    <td>
                        {{ \Carbon\Carbon::parse($detail->last_date)->addDay()->format('d/M/y') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($detail->last_date)->addDays(5)->format('d/M/y') }}</td>
                    <td>
                        Rs : {{$detail->payments->sum('fee')+50}}
                    </td>
                </tr>
                    <tr>
                    <th scope="col">After Late Payment/Fee</th>
                    <td>
                        {{ \Carbon\Carbon::parse($detail->last_date)->addDays(6)->format('d/M/y') }}
                    </td>
                    <td>{{ \Carbon\Carbon::parse($detail->last_date)->addDays(8)->format('d/M/y') }}</td>
                    <td>
                        Rs : {{$detail->payments->sum('fee')+100}}
                    </td>
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
