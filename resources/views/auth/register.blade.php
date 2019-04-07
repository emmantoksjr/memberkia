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

        <title>Register</title>
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
                    <div class="card-header">
                        <h3>Register</h3>
                    </div>
                <form method="Post">
                    @csrf
                    <div class="card-body">
                    <div class="form-group" id="dept_input">
                                <label for="department">Enter department name<span class="required">*</span></label>
                                <input class="form-control input-group" type="text"  value="{{ old('department') }}" name="department" id="department">
                            @if ($errors->has('department'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('department') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                                <label for="fname">First name <span class="required">*</span></label>
                                <input class="form-control input-group"  value="{{ old('firstname') }}" name="firstname" type="text" id="fname">
                            @if ($errors->has('firstname'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('firstname') }}</strong>
                                </span>
                            @endif
                        </div> -->
                        <!-- <div class="form-group">
                                <label for="lname">Last name <span class="required">*</span> </label><br>
                                <input class="form-control input-group"  value="{{ old('lastname') }}" name="lastname" type="text" id="lname">

                            @if ($errors->has('lastname'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('lastname') }}</strong>
                                </span>
                            @endif
                        </div> -->
                        <div class="form-group">
                                <label for="email">Email address <span class="required">*</span></label>
                                <input class="form-control input-group" value="{{ old('email') }}" type="email" name="email" id="email">
                            @if ($errors->has('email'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                                <label for="phone">Phone number <span class="required">*</span></label>
                                <input class="form-control input-group"  value="{{ old('phone') }}" type="number" name="phone" id="phone">
                            @if ($errors->has('phone'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                                <label for="address">Address <span class="required">*</span></label>
                                <input class="form-control input-group"  value="{{ old('address') }}" type="text" name="address" id="address">
                            @if ($errors->has('address'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- <div class="form-group">
                            <label for="department">Select Account type <span class="required">*</span> </label><br>
                            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                                <input type="radio" id="option-1" class="mdl-radio__button" name="options" checked value="1">
                                <span class="mdl-radio__label">Faculty</span>
                            </label>
                            <label class="mdl-radio mdl-js-radio ml-4 mdl-js-ripple-effect" for="option-2">
                                <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2" >
                                <span class="mdl-radio__label">Department</span>
                            </label>
                        </div> -->

                        <!-- <div class="form-group" id="dept_select">
                            <label for="dept">Choose faculty</label>
                            <select class="form-control" name="faculty_id">
                                @foreach($faculties as $faculty)
                                <option value="{!! $faculty->id !!}">{!! $faculty->faculty_name !!}</option>
                                @endforeach
                            </select>
                        </div> -->
                        
                        <!-- <div class="form-group" id="faculty_input">
                                <label for="faculty">Enter faculty name<span class="required">*</span></label>
                                <input class="form-control input-group " type="text"  value="{{ old('faculty') }}"name="faculty" id="faculty">

                            @if ($errors->has('faculty'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('faculty') }}</strong>
                                </span>
                            @endif
                        </div> -->
                        <div class="form-group">
                                <label for="password">Password <span class="required">*</span></label>
                                <input class="form-control input-group" type="password" name="password" id="password">
                            @if ($errors->has('password'))
                                <span class="alert alert-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">

                                <label for="repass">Re-enter password <span class="required">*</span></label><br>
                                <input class="form-control input-group " type="password" name="password_confirmation" id="repass">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="mdl-button mdl-js-button btn-block text-center mdl-button--raised mdl-button mdl-button--colored">
                                Register account
                            </button>
                        </div>
                        <div class="form-group">
                            <p class="text-center">Already a user? <a href="/login">Sign in</a></p>
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

<!-- <script>
    var selectV = document.getElementById('dept_select');
    var deptInp = document.getElementById('dept_input');
    var facInp = document.getElementById('faculty_input');

    selectV.style.display = "none";
    deptInp.style.display = "none";

    $('#option-1').change(function () {
        console.log("hello")
        facInp.style.display = "block";
        selectV.style.display = "none";
        deptInp.style.display = "none";
    })

    $('#option-2').change(function () {
        console.log("hello")
        selectV.style.display = "block";
        deptInp.style.display = "block";
        facInp.style.display = "none";
    })
</script> -->
</body>
</html>
