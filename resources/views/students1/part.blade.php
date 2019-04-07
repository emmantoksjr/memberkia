<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm payment</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>


<div class="container mt-3" style="max-width: 600px;">

    <div class="im" style="margin: auto; text-align: center;">
        <img src="{{ asset('img/logo.jpg') }}" class="image"/>
    </div>

    <div class="card">

        <div class="card-header">
            Confirm Payment
        </div>

        <div class="card-body">

            <form>
                <div class="form-group">
                    <label>Due name</label>
                    <input type="text" value="Nausa" class="form-control" disabled="true">
                </div>

                <div class="form-group">
                    <label>Session</label>
                    <input type="text" value="2017/2018" class="form-control" disabled="true">
                </div>


                <div class="form-group">
                    <label>Total amount (NGN)</label>
                    <input type="number" value="1000" disabled="true" class="form-control" >
                </div>

                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control" />
                </div>

                <div class="form-group">
                    <label>Amount (NGN) </label>
                    <input type="number" class="form-control">
                </div>

                <div class="form-group">
                    <a href="/student/dues" class="btn btn-sm btn-primary">Back</a>
                    <button class="btn btn-sm btn-primary">Continue</button>
                </div>
            </form>

        </div>

    </div>


</div>



<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>