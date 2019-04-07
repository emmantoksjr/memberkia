<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{--Style that formats our text and other margin styling--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    {{--Addition of material design to our application--}}
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
    {{--Addition of toastr to our application--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
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
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <a href="/" class="mdl-layout-title mdl-typography--font-bold">LOGO</a>
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect">
            <a href="/login" class="mdl-layout__tab ">Login as Admin</a>
            <a href="#scroll-tab-2" class="mdl-layout__tab is-active">Login as student</a>
            <!--<a href="/alumni/login" class="mdl-layout__tab">Login as alumni</a>-->
        </div>
    </header>
    <main class="mdl-layout__content">
        <section class="mdl-layout__tab-panel  is-active" id="scroll-tab-2">
            <div class="page-content">
                <div class="container mt-4" style="max-width: 500px;">
                    <div class="card">
                        <div class="card-header">
                            <h3>Login as student</h3>
                        </div>
                        <div class="card-body">
                            <form method="post">
                            @csrf
                                <div class="form-group">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="matric">Matric number</label><br>
                                        <input class="mdl-textfield__input mdl-textfield--full-width" name="matric" type="text" id="matric">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                        <label for="matric">Password</label><br>
                                        <input type="password" name="password" class="mdl-textfield__input mdl-textfield--full-width" id="pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored btn-block">Login</button>
                                </div>
                                <div class="form-group">
                                    <p class="text-center">Create new account <a href="/student/register">here</a></p>
                                    <p class="text-center"><a href="/admin/showPasswordResetForm">Forgot password</a></p>
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
<script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}")

    @elseif(Session::has('error'))
    toastr.error("{{ Session::get('error') }}")

    @elseif(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")

    @endif
</script>
</body>
</html>