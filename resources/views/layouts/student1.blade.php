<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('more_meta')
    {{--Style that formats our text and other margin styling--}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    {{--Addition of material design to our application--}}
    <link href="{{ asset('css/material.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.css') }}">

    {{--Addition of toastr to our application--}}
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    {{--Addition of Laravel default app.css which consist of some bootstrap classes--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>

     <style>

body, html {
    font-family: 'Montserrat', sans-serif;
}

a:hover{
    text-decoration: none;
}

#view-source {
    position: fixed;
    display: block;
    right: 0;
    bottom: 0;
    margin-right: 40px;
    margin-bottom: 40px;
    z-index: 900;
}

th{
    font-size: 15px;
}

/* .comment {
	width: 400px;
	background-color: #f0f0f0;
	margin: 10px;
} */
a.morelink {
	text-decoration:none;
	outline: none;
}
.morecontent span {
	display: none;

}

</style>

</head>
<body>

<div class="mdl-layout mdl-js-layout
            mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <span class="mdl-layout-title mdl-typography--font-bold">@yield('bar')</span>
            <div class="mdl-layout-spacer"></div>

            <div class="dropdown">
               <a class="dropdown-toggle" href="#" id="navbardrop" style="color: #fff;" data-toggle="dropdown">
                  {{ Auth::user()->email }}
                   {{--<img src="{{ asset('img/user.png') }}" style="width: 30px; height: 30px; border-radius: 50%;" />--}}
               </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/student/profile">View profile</a>
                    <a class="dropdown-item" href="/student/profile/edit">Edit profile</a>
                    <a class="dropdown-item" href="/student/login">Sign out</a>
                </div>
            </div>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <header class="demo-drawer-header mdl-color--indigo-500">
            <img src="{{ asset('img/user.png') }}" class="demo-avatar">
            <div class="demo-avatar-dropdown">
                <span class="text-left" style="color: #ffffff; word-wrap: break-word; width: 150px;">{{ Auth::user()->email }}</span>
                <div class="mdl-layout-spacer"></div>
                <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                    <i class="material-icons" role="presentation">arrow_drop_down</i>
                    <span class="visuallyhidden">Accounts</span>
                </button>
                <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                    <li class="mdl-menu__item" ><a style="text-decoration: none; color: #222;" href="/student/profile">View profile</a></li>
                    <li class="mdl-menu__item" ><a style="text-decoration: none; color: #222;" href="/student/profile/edit">Edit profile</a></li>
                    <li class="mdl-menu__item mdl-color-text--red-500"><a href="/student/login">Sign out</a></li>
                </ul>
            </div>
        </header>
        <nav class="mdl-navigation">
            <ul class="mdl-list">
                <li class="mdl-list__item">
                    <a href="/student/home" style="color: black" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">home</i>
                         Overview
                    </a>
                </li>

                <li class="mdl-list__item">
                    <a href="/student/announcement" style="color: black" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">record_voice_over</i>
                        Announcement
                    </a>
                </li>

                <li class="mdl-list__item">
                    <a href="/student/event" style="color: black" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">calendar_today</i>
                        Events
                    </a>
                </li>

                <li class="mdl-list__item">
                    <a href="/student/tutorials" style="color: black" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">calendar_today</i>
                        Tutorials
                    </a>
                </li>

                <li class="mdl-list__item">
                    <a href="/student/dues" style="color: black" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">payments</i>
                        Dues
                    </a>
                </li>
                <li class="mdl-list__item">
                    <a href="/student/payments" style="color: black" class="mdl-list__item-primary-content">
                        <i class="material-icons mdl-list__item-icon">account_balance</i>
                        Payments
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <main class="mdl-layout__content">
        <div class="page-content mt-3">
            @yield('content')
        </div>


    </main>
</div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script> 
    <script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script>

    $(document).ready(function() {
	var showChar = 200;
	var ellipsestext = "...";
	var moretext = "more";
	var lesstext = "less";
	$('.more').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});
    </script>
<script>
    $(document).ready(function() {
        $('#example1').DataTable( {
            dom: 'Bfrtip',

            // buttons: [
            //     'copy', 'csv', 'excel', 'pdf', 'print'
            // ]

            buttons: [
                {
                    extend: 'excel',
                    text: 'Excel',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    }},
                {
                    extend: 'copy',
                    text: 'Copy',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    }},
                {
                    extend: 'csv',
                    text: 'CSV',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    }},
                {
                    extend: 'pdf',
                    text: 'PDF',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    }},
                {
                    extend: 'print',
                    text: 'Print',
                    className: 'btn btn-default',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    }
                },
            ]
        } );
    } );
</script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
@yield('more_js')
</body>
</html>