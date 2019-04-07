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

    <title>Login</title>

    <style>

        body, html {
            font-family: 'Montserrat', sans-serif;
        }


        
        a:hover{
            color: #ffffff;
            text-decoration: none;
        }

    </style>


</head>
<body>

<!-- Always shows a header, even in smaller screens. -->
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <a href="/" class="mdl-layout-title mdl-typography--font-bold">LOGO</a>
            <!-- Add spacer, to align navigation to the right -->
        </div>
        <!-- Tabs -->
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="/login" class="mdl-layout__tab ">Login as Admin</a>
            <a href="/student/login" class="mdl-layout__tab is-active">Login as student</a>
            <a href="#scroll-tab-3" class="mdl-layout__tab">Login as alumni</a>
        </div>
    </header>

    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel" id="scroll-tab-1">
            <div class="page-content">
                <!-- Your content goes here -->
                <div class="container mt-4" style="max-width: 500px;">

                    <div class="card">

                        <div class="card-header">
                            <h3>Login as admin</h3>
                        </div>

                        <div class="card-body">

                            <form action="/dashboard">

                                <div class="form-group">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="email">Email address</label><br>
                                        <input class="mdl-textfield__input mdl-textfield--full-width" type="email" id="email">

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="email">Password</label><br>
                                        <input type="password" class="mdl-textfield__input" id="pswd">

                                    </div>
                                </div>

                                <div class="form-group">

                                    <button class="mdl-button mdl-js-button btn-block mdl-button--raised mdl-button mdl-button--colored">
                                        LOGIN
                                    </button>
                                </div>

                                <div class="form-group">
                                    <p class="text-center">Create new account <a href="/register">here</a></p>

                                    <p class="text-center"><a href="{{ route('password.request') }}">Forgot password</a></p>
                                </div>


                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </section>
        <section class="mdl-layout__tab-panel" id="scroll-tab-2">
            <div class="page-content">
                <!-- Your content goes here -->

                <div class="container mt-4" style="max-width: 500px;">

                    <div class="card">

                        <div class="card-header">
                            <h3>Login as student</h3>
                        </div>

                        <div class="card-body">

                            <form>

                                <div class="form-group">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="matric">Matric number</label><br>
                                        <input class="mdl-textfield__input mdl-textfield--full-width" type="text" id="matric">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="matric">Password</label><br>
                                        <input type="password" class="mdl-textfield__input mdl-textfield--full-width" id="s_pswd">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored btn-block">Login</div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </section>
        <section class="mdl-layout__tab-panel is-active" id="scroll-tab-3">
            <div class="page-content">
                <!-- Your content goes here -->
                <div class="container mt-4" style="max-width: 500px;">

                    <div class="card">

                        <div class="card-header">
                            <h3>Login as alumni</h3>
                        </div>

                        <div class="card-body">

                            <form>

                                <div class="form-group">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="matric">Email address</label><br>
                                        <input class="mdl-textfield__input mdl-textfield--full-width" type="email" id="alum_Email">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="matric">Password</label><br>
                                        <input type="password"  class="mdl-textfield__input mdl-textfield--full-width" id="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored btn-block">Login</div>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div>







<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/material.min.js') }}"></script>

</body>
</html>



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
