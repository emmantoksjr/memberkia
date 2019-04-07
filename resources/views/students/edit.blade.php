<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profile</title>
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
            <span class="mdl-layout-title">Edit profile</span>
            <div class="mdl-layout-spacer"></div>s
            <!--<a><span class="fa fa-power-off"></span> Logout </a>-->
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class="container" style="max-width: 600px;">
                <div class="my-card mt-3 p-3">
                    <form method="post">
                        @csrf
                        <div class="form-group">
                            <label>Matric Number</label>
                            <h4>{{ Auth::user()->email }}</h4>
                        </div>
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="lastname" id="" value="{{ $student->lastname }}">
                                <label class="mdl-textfield__label" for="name">Lastname</label>
                            </div>
                            @if ($errors->has('lastname'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('lastname') }}</span>
                                </p>
                            @endif
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="firstname" id="" value="{{ $student->firstname }}">
                                <label class="mdl-textfield__label" for="name">Firstname</label>
                            </div>
                            @if ($errors->has('firstname'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('firstname') }}</span>
                                </p>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="middlename" id="" value="{{ $student->middlename }}">
                                <label class="mdl-textfield__label" for="name">Middlename</label>
                            </div>
                            @if ($errors->has('middlename'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('middlename') }}</span>
                                </p>
                            @endif
                        </div>
                        
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" name="level" id="" value="{{ $student->level }}">
                                <label class="mdl-textfield__label" for="name">Level</label>
                            </div>
                            @if ($errors->has('level'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('level') }}</span>
                                </p>
                            @endif
                        </div>
                        
                        {{--
                        
                        <div class="form-group">
                            <label>Name</label>
                            <h4>{{ $student->lastname }} {{ $student->firstname }} {{$student->middlename}}</h4>
                        </div>
                        <div class="form-group">
                            <label>Matric Number</label>
                            <h4>{{ Auth::user()->email }}</h4>
                        </div>
                        <div class="form-group">
                            <label>Level</label>
                            <h4>{{ $student->level }}</h4>
                        </div> --}}
                        
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="email" name="email" id="email" value="{{ $student->email }}">
                                <label class="mdl-textfield__label" for="name">Email address</label>
                            </div>
                            @if ($errors->has('email'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('email') }}</span>
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ $student->phone }}" type="number" pattern="-?[0-9]*(\.[0-9]+)?"
                                       name="phone" id="phone">
                                <label class="mdl-textfield__label" for="name">Phone number</label>
                            </div>
                            @if ($errors->has('phone'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('phone') }}</span>
                                </p>
                            @endif
                        </div>
                        
                        
                         <div class="form-group">
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <select name="gender">
                                    <option value='Male'>Male</option>
                                    <option value='Female'>Female</option>
                                </select>
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
                        
                        <div class="form-group">
                            <a href="/student/profile" style="text-decoration: none;"
                               class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised  mdl-js-ripple-effect">Back</a>
                            <button class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised  mdl-js-ripple-effect"
                                    type="submit">Submit
                            </button>
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