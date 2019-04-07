<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>

    {{--Style that formats our text and other margin styling--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    {{--Addition of material design to our application--}}
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">

    {{--Addition of toastr to our application--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    {{--Addition of Laravel default app.css which consist of some bootstrap classes--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>

    <style>

        body, html {
            font-family: 'Montserrat', sans-serif;
        }

    </style>

</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Change password</span>
            <div class="mdl-layout-spacer"></div>

            <a><span class="fa fa-power-off"></span> Logout </a>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content">

            <div class="container" style="max-width: 600px;">

                <div class="my-card p-3 mt-3">

                    {{--<h3>Change password</h3>--}}

                    <form>

                        <div class="form-group">
                            <label>Select question</label>
                            <select class="form-control">
                                <option>What's the name of your favourite food?</option>
                                <option>What's the name of your favourite uncle?</option>
                                <option>What's the name of your first crush?</option>
                                <option>What's your middle name?</option>
                                <option>What's your mother maiden name?</option>
                                <option>What's your favourite football club?</option>
                            </select>
                        </div>

                        <div class="form-group">

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input  class="mdl-textfield__input" type="password" name="answer" id="answer">
                                <label class="mdl-textfield__label" for="name">Answer</label>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input  class="mdl-textfield__input" type="password" name="npass" id="npass">
                                <label class="mdl-textfield__label" for="name">New password <span class="required">*</span></label>
                            </div>

                        </div>

                        <div class="form-group">

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input  class="mdl-textfield__input" type="password" name="npass" id="cpass">
                                <label class="mdl-textfield__label" for="name">Confirm password <span class="required">*</span></label>
                            </div>

                        </div>

                        <div class="form-group">

                            <a href="/student/profile" style="text-decoration: none;" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">Back</a>

                            <button class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">Change Password</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </main>
</div>



<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/material.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>