<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
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
            <span class="mdl-layout-title">Profile</span>
            <div class="mdl-layout-spacer"></div>
            <!-- <a><span class="fa fa-power-off"></span> Logout </a> -->
        </div>
    </header>
    <main class="mdl-layout__content">
        <div class="page-content">
            <div class="container mt-2 text-center" style="max-width: 600px">
                <div class="my-card p-3 text-center" style="margin-top: 30px;">
                    <img class="image" src="{{asset('img/user.png')}}" alt="image">
                    <h3>{{ $student->lastname }} {{ $student->firstname }} {{$student->middlename}}</h3>
                    <p>{{ Auth::user()->email }}</p>
                    <p><span class="badge badge-primary">Student</span></p>
                    <p>{{ $student->level }} Level</p>
                    <p>{{ $student->phone }}</p>
                    <p>{{ $student->email }}</p>
                    <div class="buttons">
                        <a href="/student/profile/edit" style="text-decoration: none"
                           class="mdl-button mdl-button--colored"><span class="fa fa-pencil"></span> Edit Profile</a>
                        <a href="/student/profile/password" style="text-decoration: none"
                           class="mdl-button mdl-button--colored"><span class="fa fa-lock "></span> Change Password</a>
                    </div>
                    <a href="/student/home" style="text-decoration: none" class="mdl-button mdl-button--colored"><span
                                class="fa fa-home "></span> Go back Home</a>
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