<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction Details</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class="container my-card p-3 mt-4 mb-4" style="max-width: 700px;">
    <div class="im" style="margin: auto; text-align: center;">
        <img src="{{ asset('img/logo.jpg') }}" class="image" />
        <h4>University of Lagos Medical students</h4>
    </div>
    <p class="text-center">Below consist of transaction details</p>
    <table class="table table-striped">
        <tr>
            <td><b>Matric No</b></td>
            <td>{{$payment->matric}}</td>
        </tr>
        <tr>
            <td><b>Name</b></td>
            <td>{{$student->lastname}} {{$student->firstname}}</td>
        </tr>
        <tr>
            <td><b>Email</b></td>
            <td>{{$student->email}}</td>
        </tr>
        <tr>
            <td><b>Amount Paid</b></td>
            <td>#{{$payment->paid}}</td>
        </tr>
        <tr>
            <td><b>Balance</b></td>
            <td>#{{$payment->balance}}</td>
        </tr>
        <tr>
            <td><b>Receipt No</b></td>
            <td>{{$payment->reciept}}</td>
        </tr>
        <tr>
            <td><b>Mode of Payment</b></td>
            <td>{{$payment->mode}}</td>
        </tr>
        <tr>
            <td><b>Date</b></td>
            <td>{{$payment->payin_time}}</td>
        </tr>
        {{--TODO(1): This can be optional if the mode of payment is online. so you can hide it with If--}}
        <!-- <tr>
            <td><b>Payer name</b></td>
            <td>Wole soyinka</td>
        </tr> -->
        <div id="btn" class="p-2">
            {{-- TODO(2): This consist of button the first on takes user to the payment homepage while the second print the present page--}}
            <a href="/admin/payments" class="btn btn-primary">Go back home</a>
            <button class="btn btn-danger" onclick="openPrint()">Print</button>
        </div>
    </table>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    function openPrint()
    {
        // document.getElementById('btn').style.display = none;
        window.print();
    }
</script>
</body>
</html>