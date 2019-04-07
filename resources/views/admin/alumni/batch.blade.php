<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    {{--Style that formats our text and other margin styling--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    {{--Addition of material design to our application--}}
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">

    {{--Addition of Laravel default app.css which consist of some bootstrap classes--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Members Platform</title>
    <style>
        body, html {
            font-family: 'Montserrat', sans-serif;
        }

        a:hover{
            text-decoration: none;
        }

        .outer-body{
            border: 1px solid #3f51b5;
            padding: 50px;
            background: #ffffff;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <a href="/admin/dashboard" style="color: #ffffff;" class="mdl-layout-title mdl-typography--font-bold">LOGO</a>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content pt-3">
            <div class="container" style="max-width: 600px;">
                <p style="margin-left: 20px;">
                    Follow the CSV structure in <a href="{{ asset('file/alumni.csv') }}">Example</a> CSV to create your upload format.
                </p>
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="outer-body text-center">
                        <h3>Select file</h3>
                        <p>file should be in .xls, .csv</p>
                        <input type="file"  name="import" required>
                    </div>
                    <div class="mt-4">
                        <button  type="submit" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                            Save and continue
                        </button>
                        <a href="javascript:history.go(-1);" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/material.min.js') }}"></script>

</body>
</html>
