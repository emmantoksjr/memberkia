<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scan QR Code</title>
    <link src="{{ asset('css/app.css') }}" rel="stylesheet" />
 

    <style>

     @import url("https://fonts.googleapis.com/css?family=Roboto:400,500,700");
    html, body{
        padding: p;
        height: 100%;
    }

    body{
       justify-content: center;
       align-content: center;
       flex-direction: column;
        text-align: center;
    }

    h3{
        font-family: 'Roboto';
        font-size: 30px;

    }

    a{
        background-color: #3f51b5;
        padding: 15px;
        color: white;
        font-family: 'Roboto';
        text-decoration: none;
        border-radius: 20px;
    }

    a:hover{
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
    }

    </style>
</head>
<body>


    <div class="container-fluid">

    <h3>Scan Barcode</h3>
   
    <a href="{{ route('student.events') }}" class="btn btn-primary">Back to Events</a>
    </div>
    

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

<!-- <div class="container">
<div class="row">
    <div class="col-md-8 mb-3">
    </div>
    <div class="col-md-4">
    {{ $qr }}
    </div>
    <div>
  
    </div>
</div>
</div> -->
