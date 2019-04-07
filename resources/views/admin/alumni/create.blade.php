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
                            <small class="mdl-color-text--blue-800">Enter Alumni details</small>
                        </div>
                        <form method="Post">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div id="" class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="firstname" value="{{ old('firstname') }}" type="text" id="name">
                                <label class="mdl-textfield__label" for="name">First Name <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('firstname'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('firstname') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="lastname" value="{{ old('lastname') }}" type="text" id="name">
                                <label class="mdl-textfield__label" for="name">Last Name <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('lastname'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('lastname') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="matric_num" value="{{ old('matric_num') }}" type="text" id="matric">
                                <label class="mdl-textfield__label" for="matric">Matric number <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('matric_num'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('matric_num') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="email" value="{{ old('email') }}" type="email" id="email">
                                <label class="mdl-textfield__label" for="email">Email address <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('email'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('email') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="phone" type="number" value="{{ old('phone') }}" id="phone">
                                <label class="mdl-textfield__label" for="phone">Phone number <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('phone'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('phone') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="course_of_study" value="{{ old('course_of_study') }}" type="text" id="course_of_study">
                                <label class="mdl-textfield__label" for="phone">Course of Study <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('course_of_study'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('course_of_study') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('admission_year') }}" name="admission_year" type="date" id="">
                                <label class="mdl-textfield__label" for="phone">Admission Year <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('admission_year'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('admission_year') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="grad_year" value="{{ old('grad_year') }}" type="date" id="phone">
                                <label class="mdl-textfield__label" for="phone">Graduation Year <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('grad_year'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('grad_year') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('next_of_kin_name') }}" name="next_of_kin_name" type="text" id="phone">
                                <label class="mdl-textfield__label" for="phone">Next of kin name<span class="required">*</span></label>
                            </div>
                            @if ($errors->has('next_of_kin_name'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_name') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('next_of_kin_phone') }}" name="next_of_kin_phone" type="text" id="phone">
                                <label class="mdl-textfield__label" for="phone">Next of kin phone<span class="required">*</span></label>
                            </div>
                            @if ($errors->has('next_of_kin_phone'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_phone') }}</span>
                                </p>
                            @endif

                            <div class="form-group">

                                <button type="submit" name="save" value="save" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                    Save
                                </button>

                                <!--This button saves to the database and remain on the page -->

                                <button type="submit" name="save" value="saveAndContinue" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                    Save and continue
                                </button>

                                <!-- This button takes user to the previous page -->
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
