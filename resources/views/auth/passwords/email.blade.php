<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Login</title>
    <style>
        body, html {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title mdl-typography--font-bold">LOGO</span>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content pt-3">
            <div class="container" style="max-width: 500px;">
                <div class="card">
                    <form method="post" action="{{ route('verify.email') }}">
                        @csrf
                    <div class="card-header">
                        <h3>Reset password</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--full-width">
                                <label for="email">Credential(email or matric)</label><br>
                                <input class="mdl-textfield__input mdl-textfield--full-width" name="email" type="text" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="mdl-button mdl-js-button btn-block mdl-button--raised mdl-button mdl-button--colored">
                                Reset Password
                            </button>
                        </div>
                        <div class="form-group">
                            <p class="text-center">Create new account <a href="/auth/register">here</a></p>
                            <p class="text-center"><a href="/admin/login">Sign in</a></p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
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
