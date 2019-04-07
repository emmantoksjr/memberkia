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
    <title>Profile</title>
    <style>
        a:hover{
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
    <header class="demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--indigo-500 mdl-color-text--white-800">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title">Edit Profile</span>
            {{--<div class="mdl-layout-spacer"></div>--}}
            {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">--}}
            {{--<label class="mdl-button mdl-js-button mdl-button--icon" for="search">--}}
            {{--<i class="material-icons">search</i>--}}
            {{--</label>--}}
            {{--<div class="mdl-textfield__expandable-holder">--}}
            {{--<input class="mdl-textfield__input" type="text" id="search">--}}
            {{--<label class="mdl-textfield__label" for="search">Enter your query...</label>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </header>
    <div class="demo-ribbon"></div>
    <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
            <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
            <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
                {{--<div class="demo-crumbs mdl-color-text--grey-500">--}}
                {{--Google &gt; Material Design Lite &gt; How to install MDL--}}
                {{--</div>--}}
                {{--<h3>Edit Profile</h3>--}}
                <form method="post">
                    @csrf
                    <div class="form-group">
                        <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="department" value="{{ $organisation->department_name }}" type="text" id="name">
                            <label class="mdl-textfield__label" for="name">Name</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="phone" value="{{ $organisation->phone }}" type="number" id="phone">
                            <label class="mdl-textfield__label" for="phone">Phone</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="email" value="{{ $user->email }}" type="email" id="email">
                            <label class="mdl-textfield__label" for="email">Email address</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password"
                                       name="password" id="">
                                <label class="mdl-textfield__label" for="name">Password</label>
                            </div>
                            @if ($errors->has('password'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('password') }}</span>
                                </p>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" name="password_confirmation" id="">
                                <label class="mdl-textfield__label" for="name">Confirm Password</label>
                            </div>
                        </div>
                        

                    {{--<div class="form-group">--}}
                        {{--<label>Select  Faculty</label>--}}
                        {{--<select class="form-control">--}}
                            {{--<option>Natural sciences</option>--}}
                            {{--<option>Social sciences</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                    {{--<div class="form-group">--}}
                        {{--<label>Select  Department</label>--}}
                        {{--<select class="form-control">--}}
                            {{--<option>Computer sciences</option>--}}
                            {{--<option>Microbiology</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                    <div class="form-group pt-4">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Edit profile</button>
                        <a href="{!! action('AdminController@profile', Auth::user()->id)!!}" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">Back</a>
                    </div>

                </form>



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

    @elseif(Session::has('delete'))
        toastr.error("{{ Session::get('error') }}")

    @elseif(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")

    @endif
</script>

</body>

</html>