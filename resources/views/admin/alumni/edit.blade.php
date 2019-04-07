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

    {{--Addition of toastr to our application--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

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
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <a href="/admin/dashboard" style="color: #ffffff;" class="mdl-layout-title mdl-typography--font-bold">LOGO</a>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content pt-3">
            <div class="container p-3" style="max-width: 600px;">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Alumni</h3>
                    </div>
                    <div class="card-body">
                        <div class="mdl-card__subtitle-text">
                            <small class="mdl-color-text--blue-800">Enter alumni details</small>
                        </div>
                        <form method="Post">
                            @csrf

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="firstname" value="{{ $alumni->firstname }}" type="text" id="name">
                                <label class="mdl-textfield__label" for="name">First Name <small>(required)</small></label>
                            </div>
                            @if ($errors->has('firstname'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('firstname') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="lastname" value="{{ $alumni->lastname }}" type="text" id="name">
                                <label class="mdl-textfield__label" for="name">Last Name <small>(required)</small></label>
                            </div>
                            @if ($errors->has('lastname'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('lastname') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="matric_num" value="{{ $alumni->matric_num }}" type="text" id="matric">
                                <label class="mdl-textfield__label" for="matric">Matric number <small>(required)</small></label>
                            </div>
                            @if ($errors->has('matric_num'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('matric_num') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="email" value="{{ $alumni->email }}" type="email" id="email">
                                <label class="mdl-textfield__label" for="email">Email address <small>(required)</small></label>
                            </div>
                            @if ($errors->has('email'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('email') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="phone" type="number" value="{{ $alumni->phone }}" id="phone">
                                <label class="mdl-textfield__label" for="phone">Phone number <small>(required)</small></label>
                            </div>
                            @if ($errors->has('phone'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('phone') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="course_of_study" value="{{ $alumni->course_of_study }}" type="text" id="course_of_study">
                                <label class="mdl-textfield__label" for="phone">Course of Study <small>(required)</small></label>
                            </div>
                            @if ($errors->has('course_of_study'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('course_of_study') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ $alumni->admission_year }}" name="admission_year" type="date" id="">
                                <label class="mdl-textfield__label" for="phone">Admission Year <small>(required)</small></label>
                            </div>
                            @if ($errors->has('admission_year'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('admission_year') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="grad_year" value="{{ $alumni->grad_year }}" type="date" id="phone">
                                <label class="mdl-textfield__label" for="phone">Graduation Year <small>(required)</small></label>
                            </div>
                            @if ($errors->has('expected_grad_year'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('expected_grad_year') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ $alumni->next_of_kin_name }}" name="next_of_kin_name" type="text" id="phone">
                                <label class="mdl-textfield__label" for="phone">Next of kin name<small>(required)</small></label>
                            </div>
                            @if ($errors->has('next_of_kin_name'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_name') }}</span>
                                </span>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ $alumni->next_of_kin_phone }}" name="next_of_kin_phone" type="text" id="phone">
                                <label class="mdl-textfield__label" for="phone">Next of kin phone<small>(required)</small></label>
                            </div>
                            @if ($errors->has('next_of_kin_phone'))
                                <span class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_phone') }}</span>
                                </span>
                            @endif

                            <div class="form-group">
                                <button type="submit" name="save" value="save" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                    Update
                                </button>
                                <a href="javascript:history.go(-1);" role="button" class="mdl-button mdl-js-button  mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                    Back
                                </a>
                            </div>

                        </form>
                    </div>

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

    @elseif(Session::has('delete'))
    toastr.error("{{ Session::get('error') }}")

    @elseif(Session::has('info'))
    toastr.info("{{ Session::get('info') }}")

    @endif
</script>


</body>
</html>
