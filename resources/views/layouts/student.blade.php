@if(Auth::user()->has_passwordreset == 1)

@else
<script>
alert('Student has to reset initial password!!');
window.location = "/student/profile/edit";
</script>
@endif

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        @yield('more_meta')
        <link rel="shortcut icon" href="{{ asset('img/favicon.png')  }}">
        <title>Admin</title>
        <link href="{{ asset('css/switchery.min.css')  }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('css/morris.css') }}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/style.css') }}"rel="stylesheet" type="text/css">
        <script src="{{ asset('js/modernizr.min.js') }}"></script>
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    </head>


    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="index.html" class="logo"><img src="{{ asset('img/logo4.png')}}" class="img-circle" style="width: 50px;"></a>
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

                                <!-- item-->
                                <a href="/student/profile" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account"></i> <span>Profile</span>
                                </a>

                                 <a class="dropdown-item" class="dropdown-item notify-item" href="/student/profile/edit">
                                 <i class="mdi mdi-pencil"></i>
                                 <span>Edit profile</span></a>

       
                                <a href="/student/login" class="dropdown-item notify-item">
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

                  <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <!-- <li class="menu-title"> Ademola</li> -->

                            <li class="">
                                <a href="/student/home" class="waves-effect waves-primary ">
                                    <i class="ti-home"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="/student/announcement" class="waves-effect waves-primary">
                                    <i class="ti-announcement"></i><span> Announcement</span>
                                </a>
                            </li>

                            <li>
                                <a href="/student/event" class="waves-effect waves-primary">
                                    <i class=" ti-calendar"></i><span> Events</span>
                                </a>
                            </li>

                            <li>
                                <a href="/student/tutorials" class="waves-effect waves-primary">
                                    <i class=" ti-book"></i><span> Tutorial</span>
                                </a>
                            </li>

                            <li>
                                <a href="/student/dues" class="waves-effect waves-primary">
                                    <i class="ti-credit-card"></i><span> Due</span>
                                </a>
                            </li>

                            <li>
                                <a href="/student/payments" class="waves-effect waves-primary ">
                                    <i class=" ti-credit-card"></i><span> Payment</span>
                                </a>
                            </li>

                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->




            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    

                    @yield('content')
                        
                    <!-- end container -->
                </div>
                <!-- end content -->

                <footer class="footer">
                    <!-- 2016 - 2018 © Minton - Coderthemes.com -->
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            

        </div>
        <!-- END wrapper -->



        

    
        <script>
            var resizefunc = [];
        </script>

        <!-- Plugins  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script><!-- Popper for Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js ') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('js/switchery.min.js') }}"></script>
        
        <!-- Counter Up  -->
        <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

        <!--Morris Chart-->
		<script src="{{ asset('js/morris.min.js') }}"></script>
		<script src="{{ asset('js/raphael-min.js') }}"></script>

        <!-- Page js  -->
        <script src="{{ asset('js/jquery.dashboard.js') }}"></script>

        <script src="{{ asset('js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/jquery.app.js') }}"></script>

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
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>
        @yield('more_js')
    
    <!-- Required datatable js -->
<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('js/jszip.min.js')}}"></script>
<script src="{{ asset('js/pdfmake.min.js')}}"></script>
<script src="{{ asset('js/vfs_fonts.js')}} "></script>
<script src="{{ asset('js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/jquery.core.js')}}"></script>
<script src="{{ asset('js/jquery.app.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
         $('#example').DataTable( {
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
        }},
        
    ]
    } );
    // $('#example').DataTable();
        // $('#datatable').DataTable();
        // var table = $('#datatable-buttons').DataTable({
        //     lengthChange: false,
        //     buttons: ['copy', 'excel', 'pdf']
        // });
        // $('#key-table').DataTable({
        //     keys: true
        // });
        // $('#responsive-datatable').DataTable();
        // $('#selection-datatable').DataTable({
        //     select: {
        //         style: 'multi'
        //     }
        // });
        // table.buttons().container()
        //         .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
    } );
</script>
    </body>

<!-- Mirrored from coderthemes.com/minton/material/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Sep 2018 12:36:33 GMT -->
</html>

