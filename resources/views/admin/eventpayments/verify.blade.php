<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>

    {{--TODO(3): This page simply specifies the completion of the transaction made in the in-office payment mode--}}

    <div class="container my-card p-3 mt-4 mb-4" style="max-width: 700px;">

        <h3 class="text-center p-3 mt-2 mb-2" style="color:green;">Transaction Successfully</h3>
        <p class="text-center">Below consist of transaction details</p>


        <table class="table table-striped">

            <tr>
                <td><b>Matric No</b></td>
                <td>12NO2/02</td>
            </tr>

            <tr>
                <td><b>Name</b></td>
                <td>Njoku Kalu</td>
            </tr>

            <tr>
                <td><b>Email</b></td>
                <td>waleadenuga@gmail.com</td>
            </tr>

            <tr>
                <td><b>Amount Paid</b></td>
                <td>#10,000</td>
            </tr>

            <tr>
                <td><b>Balance</b></td>
                <td>#10.00</td>
            </tr>

            <tr>
                <td><b>Mode of Payment</b></td>
                <td>In-office</td>
            </tr>


            <tr>
                <td><b>Receipt No</b></td>
                <td>199911111</td>
            </tr>

            <tr>
                <td><b>Date</b></td>
                <td>23rd August, 2018</td>
            </tr>

            <tr>
                <td><b>Payer name</b></td>
                <td>Wole soyinka</td>
            </tr>

            <div class="p-2">

                <a href="/admin/payments" class="btn btn-primary">Go back home</a>
                <button class="btn btn-danger">Print</button>
            </div>

        </table>


    </div>


<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>