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
            <a href="/admin/dashboard" style="color: #ffffff;" class="mdl-layout-title mdl-typography--font-bold">LOGO</a>
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content pt-3">
            <div class="container p-3" style="max-width: 600px;">
                <div class="card">
                    <div class="card-header">
                        <h3>Add student</h3>
                    </div>
                    <div class="card-body">
                        <div class="mdl-card__subtitle-text">
                            <small class="mdl-color-text--blue-800">Enter student details</small>
                        </div>
                        <form method="Post">
                            @csrf
                            <div class="form-group" id="dept_select">
                                <label for="title">Title</label>
                                <select class="form-control" name="title">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                </select>
                            </div>
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="firstname" value="{{ old('firstname') }}" type="text" id="" >
                                <label class="mdl-textfield__label" for="name">First Name </label>
                            </div>
                            @if ($errors->has('firstname'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('firstname') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="lastname" value="{{ old('lastname') }}" type="text" id="" >
                                <label class="mdl-textfield__label" for="name">Last Name </label>
                            </div>
                            @if ($errors->has('lastname'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('lastname') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="middlename" value="{{ old('middlename') }}" type="text" id="">
                                <label class="mdl-textfield__label" for="name">Middle Name </label>
                            </div>
                            @if ($errors->has('middlename'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('middlename') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="matric_num" value="{{ old('matric_num') }}" type="text" id="matric" required>
                                <label class="mdl-textfield__label" for="matric">Matric number <span class="required">*</span></label>
                            </div>
                            @if ($errors->has('matric_num'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('matric_num') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="email" value="{{ old('email') }}" type="email" id="email">
                                <label class="mdl-textfield__label" for="email">Email address</label>
                            </div>
                            @if ($errors->has('email'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('email') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="phone" type="number" value="{{ old('phone') }}"  id="phone">
                                <label class="mdl-textfield__label" for="phone">Phone number </label>
                            </div>
                            @if ($errors->has('phone'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('phone') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" name="course_of_study" value="{{ old('course_of_study') }}"  type="text" id="course_of_study">
                                <label class="mdl-textfield__label" for="phone">Course of Study</label>
                            </div>
                            @if ($errors->has('course_of_study'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('course_of_study') }}</span>
                                </p>
                            @endif
                            <div class="form-group" id="">
                                <label for="level">Current Level</label>
                                <select class="form-control" name="level">
                                    <option value="100">100 Level</option>
                                    <option value="200">200 Level</option>
                                    <option value="300">300 Level</option>
                                    <option value="400">400 Level</option>
                                    <option value="500">500 Level</option>
                                    <option value="600">600 Level</option>
                                    <option value="700">700 Level</option>
                                </select>
                            </div>
                            <div class="form-group" id="">
                                <label for="marital_status">Marital Status</label>
                                <select class="form-control" name="marital_status">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
                            </div>
                            <div class="form-group" id="">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                Date of birth
                                <input class="mdl-textfield__input" value="{{ old('dob') }}"  name="dob" type="date" id="dob">
                            </div>
                            @if ($errors->has('dob'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('dob') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                Admission Year
                                <input class="mdl-textfield__input"  value="{{ old('admission_year') }}" name="admission_year" type="date" id="ad_year">
                                <!-- <label class="mdl-textfield__label" for="phone">Admission Year <small>(required)</small></label> -->
                            </div>
                            @if ($errors->has('admission_year'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('admission_year') }}</span>
                                </p>
                            @endif
                            <p class="alert alert-warning" style="display: none" id="nshow">Admission cannot be greater than expected Date of bitrh</p>
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                Expected Graduation Year
                                <input class="mdl-textfield__input"  name="expected_grad_year" value="{{ old('expected_grad_year') }}" type="date" id="eg_year">
                                <!-- <label class="mdl-textfield__label" for="phone">Expected Graduation Year <small>(required)</small></label> -->
                            </div>
                            <p class="alert alert-warning" style="display: none" id="show">Admission cannot be greater than expected graduation year</p>
                            @if ($errors->has('expected_grad_year'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('expected_grad_year') }}</span>
                                </p>
                            @endif
                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('lga') }}"  name="lga" type="text" id="lga">
                                <label class="mdl-textfield__label" for="phone">LGA</label>
                            </div>
                            @if ($errors->has('lga'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('lga') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('address') }}"  name="address" type="text" id="">
                                <label class="mdl-textfield__label" for="phone">Address</label>
                            </div>
                            @if ($errors->has('address'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('address') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input"  value="{{ old('state_of_origin') }}" name="state_of_origin" type="text" id="soo">
                                <label class="mdl-textfield__label" for="phone">State of origin</label>
                            </div>
                            @if ($errors->has('state_of_origin'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('state_of_origin') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input"  value="{{ old('nationality') }}" name="nationality" type="text" id="">
                                <label class="mdl-textfield__label" for="phone">Nationality</label>
                            </div>
                            @if ($errors->has('nationality'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('nationality') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('next_of_kin_name') }}" name="next_of_kin_name" type="text" id="">
                                <label class="mdl-textfield__label" for="phone">Next of kin name</label>
                            </div>
                            @if ($errors->has('next_of_kin_name'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_name') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('next_of_kin_address') }}" name="next_of_kin_address" type="text" id="">
                                <label class="mdl-textfield__label" for="phone">Next of kin address</label>
                            </div>
                            @if ($errors->has('next_of_kin_address'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_address') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('next_of_kin_phone') }}" name="next_of_kin_phone" type="text" id="nokp">
                                <label class="mdl-textfield__label" for="phone">Next of kin phone</label>
                            </div>
                            <p class="alert alert-warning" style="display: none" id="show1">Phone number already taken in the form field</p>
                            @if ($errors->has('next_of_kin_phone'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('next_of_kin_phone') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('sponsor_name') }}" name="sponsor_name" type="text" id="">
                                <label class="mdl-textfield__label" for="phone">Sponsor Name</label>
                            </div>
                            @if ($errors->has('sponsor_name'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('sponsor_name') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('sponsor_address') }}" name="sponsor_address" type="text" id="">
                                <label class="mdl-textfield__label" for="phone">Sponsor Address</label>
                            </div>
                            @if ($errors->has('sponsor_address'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('sponsor_address') }}</span>
                                </p>
                            @endif

                            <div class="mdl-textfield  mdl-textfield--full-width mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" value="{{ old('sponsor_phone') }}" name="sponsor_phone" type="text" id="sph">
                                <label class="mdl-textfield__label" for="phone">Sponsor Phone</label>
                            </div>
                            <p class="alert alert-warning" style="display: none" id="show2">Phone number already taken in the form field</p>
                            @if ($errors->has('sponsor_phone'))
                                <p class="alert alert-danger">
                                    <span>{{ $errors->first('sponsor_phone') }}</span>
                                </p>
                            @endif

                            <div class="form-group">
                                <button type="submit" name="save" value="save" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                    Save
                                </button>
                                <button type="submit" name="save" value="saveAndContinue" class="mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect">
                                    Save and continue
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
<script>
    $(function () {
        $('#nok').click(function(e){
            var dob = $('#dob').val();
            var ad_year =  $('#ad_year').val();
            var eg_year =  $('#eg_year').val();
            if((new Date(ad_year)) >= (new Date(eg_year))){
                $('#show').show();
            }
            if((new Date(ad_year)) >= (new Date(dob))){
                $('#nshow').show();
            }
        });

        $('#sph').keyup(function(e){
            var phone = $('#phone').val();
            var nokp = $('#nokp').val();
            var sph = $('#sph').val();
            if(phone == nokp){
                $('#show1').show();
            }else{
                $('#show1').hide();
            }
            if( phone == sph){
                $('#show2').show();
            }else{
                $('#show2').hide();
            }

            if(nokp == sph){
                $('#show2').show();
            }else{
                $('#show2').hide();
            }
        });

    });

</script>
</body>
</html>













