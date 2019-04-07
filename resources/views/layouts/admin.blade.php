@if (Auth::user()->disabled == 1)
<script>
    alert('User has been disabled. Kindly contact admin for clarifications!!');
    window.location = "/student/login";
</script>
@endif

<!DOCTYPE html>
    <html>
        <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width,initial-scale=1">
                <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
                <meta name="author" content="Coderthemes">
                <link rel="shortcut icon" href="{{ asset('img/favicon.png')  }}">
                <title>Admin</title>
                <link href="{{ asset('css/switchery.min.css')}}  " rel="stylesheet" />
                <link rel="stylesheet" href="{{ asset('css/morris.css')}}">
                <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
                <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
                <link href="{{ asset('css/icons.css')}}" rel="stylesheet" type="text/css">
                <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css">
                <script src="{{ asset('js/modernizr.min.js')}}"></script>
                @yield('more_css')
                <title>@yield('title')</title>
                
                <style>
                    
                </style>
            </head>
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="#" class="logo"><img src="{{ asset('img/logo4.png')}}" class="img-circle" style="width: 50px;"></a>
                    </div>
                </div>
                <nav class="navbar-custom">
                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                {{ Auth::user()->email }} <i class=" ti-angle-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                               <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Welcome!</small> </h5>
                                </div>
                                <a href="{!! action('AdminController@profile', Auth::user()->id)!!}" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account"></i> <span>Profile</span>
                                </a>
                                <a href="/admin/login" class="dropdown-item notify-item">
                                    <i class="mdi mdi-logout"></i> <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
    
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="hide-phone app-search">
                            <form role="search" class="">
                                <input type="text" placeholder="Search..." class="form-control">
                                <a href="#"><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li class="">
                                <a href="{{ route('admin.dashboard') }}" class="waves-effect waves-primary ">
                                    <i class="ti-home"></i><span> Dashboard </span>
                                </a>
                            </li>
                        @permission('View-Announcements')
                            <li>
                                <a href="{{ route('admin.announcements') }}" class="waves-effect waves-primary">
                                    <i class="ti-announcement"></i><span> Announcement</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('View-Events')
                            <li>
                                <a href="/admin/events" class="waves-effect waves-primary">
                                    <i class=" ti-calendar"></i><span> Events</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('View-Students')
                            <li>
                                <a href="{{ route('admin.students') }}" class="waves-effect waves-primary">
                                    <i class=" ti-shield"></i><span> Student</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('View-Tutorials')
                            <li>
                                <a href="{{ route('admin.tutorials') }}" class="waves-effect waves-primary">
                                    <i class=" ti-book"></i><span> Tutorial</span>
                                </a>
                            </li>
                        @endpermission

                            <li>
                                <a href="{{ route('admin.users') }}" class="waves-effect waves-primary">
                                    <i class="ti-user"></i><span> Users</span>
                                </a>
                            </li>
                        
                            <li>
                                <a href="{{ route('admin.polls') }}" class="waves-effect waves-primary">
                                    <i class="ti-user"></i><span>Polls</span>
                                </a>
                            </li>
                            
                        @permission('View-Dues')
                            <li>
                                <a href="{{ route('admin.dues') }}" class="waves-effect waves-primary">
                                    <i class="ti-credit-card"></i><span> Due</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('View-Due-Payment')
                            <li>
                                <a href="{{ route('admin.payments') }}" class="waves-effect waves-primary">
                                    <i class=" ti-credit-card"></i><span> Dues Payment</span>
                                </a>
                            </li>
                        @endpermission
                        @permission('View-Event-Payment')
                            <li>
                                <a href="{{ route('admin.event.payments') }}" class="waves-effect waves-primary ">
                                    <i class=" ti-credit-card"></i><span> Event Payment</span>
                                </a>
                            </li>
                        @endpermission
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div> 
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">@yield('title')</h4>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
                <footer class="footer">
                </footer>
            </div>
        </div>  
        <script>
                var resizefunc = [];
        </script>
            <script src="{{ asset('js/jquery.min.js')}}"></script>
            <script src="{{ asset('js/popper.min.js')}}"></script><!-- Popper for Bootstrap -->
            <script src="{{ asset('js/bootstrap.min.js')}}"></script>
            <script src="{{ asset('js/detect.js')}}"></script>
            <script src="{{ asset('js/fastclick.js')}}"></script>
            <script src="{{ asset('js/jquery.slimscroll.js')}}"></script>
            <script src="{{ asset('js/jquery.blockUI.js')}}"></script>
            <script src="{{ asset('js/waves.js')}}"></script>
            <script src="{{ asset('js/wow.min.js')}}"></script>
            <script src="{{ asset('js/jquery.nicescroll.js')}}"></script>
            <script src="{{ asset('js/jquery.scrollTo.min.js')}}"></script>
            <script src="{{ asset('js/switchery.min.js')}}"></script>
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
            @yield('more_js')
    </body>
</html> 
