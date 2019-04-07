<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
	<title>Memberkia</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap1.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
</head>

	<style>
	    
	    body{
	        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
      url(/img/student.jpg);
    height: 100vh;
    color: #fff;
    background-size: cover;
    background-position: top left;
	    }
	    
	    .my-card{
	        border: 1px solid lightgray;
	        padding: 30px;
	        border-radius: 3px;
	        -webkit-box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.75);
box-shadow: 2px 3px 5px 0px rgba(0,0,0,0.75);
background: white;
color:black;
	    }
	    
	</style>
<body>
    
    <div class="container" style="max-width: 500px; margin-top:60px;">
        
        <div class="my-card">
            <!-- Centered Pills -->
            <ul class="nav nav-pills nav-justified">
              <li><a href="/login/admin">Login As Admin</a></li>
              <li class="active"><a href="/student/login">Login As Student</a></li>
            </ul>
            
            <form method="post" action="/student/login" style="margin-top: 30px;">
                
                 @csrf
                
                <div class="form-group">
                    <label for="matric">Matric Number</label>
                    <input type="text" name="matric" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    
                    <button class="btn btn-primary btn-block">Login as student</button>
                </div>
                
                <p class="text-center"><a href="/student/register">Create new Account</a></p>
                
                <p class="text-center"><a href="/admin/showPasswordResetForm">Forgot password?</a></p>
                
            </form>
            
        </div>
        
        
        
    </div>
    
    
    
</body>

	<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
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
</body>
</html>

<!--<!DOCTYPE html>-->
<!--<html>-->
<!--<head>-->
<!--	<meta charset="utf-8">-->
<!--	<meta name="description" content="">-->
<!--	<meta name="keywords" content="">-->
<!--    <meta name="author" content="">-->
<!--    <meta name="csrf-token" content="{{ csrf_token() }}" />-->
<!--	<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--	<meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--	<link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">-->
<!--	<title>Memberkia</title>-->
<!--	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap1.min.css') }}" rel="stylesheet">-->
<!--	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">-->
<!--    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">-->
<!--    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">-->
<!--	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway">-->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<!--	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">-->
<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">-->
<!--</head>-->
<!--<body class="">-->
<!--	<header>-->
<!--		<nav class="navbar navbar-default __navbackground" role="navigation">-->
<!--			<div class="container">-->
<!--				<div class="navbar-header">-->
<!--					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">-->
<!--						<span class="sr-only">Toggle navigation</span>-->
<!--						<span class="icon-bar"></span>-->
<!--						<span class="icon-bar"></span>-->
<!--						<span class="icon-bar"></span>-->
<!--					</button>-->
<!--					<a class="navbar-brand" href="#"><img src="{{ asset('img/logo4.png') }}" class="__memlogo"></a>-->
<!--				</div>-->
<!--				<div class="collapse navbar-collapse navbar-ex1-collapse">-->
<!--					<ul class="nav navbar-nav navbar-right">-->
<!--						<li><a data-toggle="modal" href='#modal-id' class="__navfont"><i class="icon icon-lock" aria-hidden="true"></i> Login</a></li>-->
<!--					</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--		</nav>-->
<!--		<div class="container">-->
<!--			<div class="col-lg-6 col-md-6 col-sm-5">-->
<!--				<h1 class="__memeber">MEMBERKIA</h1>-->
<!--				<p><strong>MEMBERKIA</strong> is cloud-based association management solution for professional and trade associations. It has both mobile application and web-based application.</p>-->
<!--				<p>Members of associations can use MEMBERKIA mobile application or web-based application to :</p>-->
<!--				<ol>-->
<!--					<li>Make payment</li>-->
<!--					<li>Register for events and other special programmes</li>-->
<!--					<li>Track payment records</li>-->
<!--					<li>Update their profiles</li>-->
<!--					<li>Get announcements</li>-->
<!--				</ol>-->

<!--				<p>Association’s administrator can easily:</p>-->
<!--				<ol>-->
<!--					<li>Tracks revenue, attendance and total number of members</li>-->
<!--					<li>Posts announcement to members</li>-->
<!--					<li>Sends payment receipts to members.</li>-->
<!--				</ol>-->
<!--			</div>-->
<!--			<div class="col-lg-6 col-md-6 col-sm-7">-->
<!--				<img src="{{ asset('img/management2.png') }}" class="__memeberimg img-responsive">-->
<!--			</div>-->
<!--		</div>-->
<!--	</header><br>-->
<!--	<section>-->
<!--		<p class="text-center"><a href="http://www.raoatech.com" target="_blank"> Powered by <strong>Raoatech</strong></a></p>-->
<!--	<div class="modal fade" id="modal-id">-->
<!--		<div class="modal-dialog __modal-dialog">-->
<!--			<div class="modal-content">-->
<!--				<div class="modal-header">-->
<!--					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
<!--					<img src="{{ asset('img/meet.png') }}" class="img-circle">-->
<!--					<h4 class="modal-title">User Login</h4>-->
<!--				</div>-->
<!--				<div class="modal-body">-->
<!--					<form id="regForm1" method="post">-->
<!--                        @csrf-->
<!--						<div class="form-group">-->
<!--							<div class="">-->
<!--                        		<div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                          			<label class="radio" style="font-size: 15px;padding-top: 4px; margin-top: 0;">-->
<!--                        				<a href="/admin/login"><input type="radio" name='thing' value='valuable' data-id="school" />Login as Admin</a>-->
<!--                            			<span class="checkround"></span>-->
<!--                          			</label>-->
                          
<!--                        		</div>-->
<!--                				<div class="col-md-6 col-sm-6 col-xs-6">-->
<!--                  					<label class="radio" style="font-size: 15px;padding-top: 4px; margin-top: 0;">-->
<!--                                            <input type="radio" name='thing' value='valuable' data-id="bank" checked/>Login as Student-->
<!--                    				<span class="checkround"></span>-->
<!--                  					</label>-->
<!--                    			</div>-->
<!--                 			</div>-->

<!--                 			{{-- <div id="school" class="none">-->
<!--	                        	<div class="form-group">-->
<!--									<label for="" class="__fidfor">Email Address</label>-->
<!--									<input type="email" class="form-control" name="" id="adminUsername" placeholder="">-->
<!--								</div>-->
<!--								<div class="form-group">-->
<!--									<label for="" class="__fidfor">Password</label>-->
<!--									<input type="password" class="form-control  __fomin" name="quantity" id="adminPassword" placeholder=""/>-->
<!--								</div>-->
<!--								<div class="row">-->
<!--									<div class="col-md-3 col-sm-3 col-xs-3"></div>-->
<!--									<div class="col-md-6 col-sm-6 col-xs-6">-->
<!--										<a id="admin" type="submit" class="btn btn-block">Login</a>-->
<!--									</div>-->
<!--									<div class="col-md-3 col-sm-3 col-xs-3"></div>-->
<!--								</div>-->
<!--							</div> --}}-->
<!--	                      	<div id="bank" class="">-->
<!--	                      		<div class="form-group">-->
<!--									<label for="" class="__fidfor">Matric</label>-->
<!--									<input type="text" class="form-control" name="matric"  placeholder="">-->
<!--								</div>-->
<!--								<div class="form-group">-->
<!--									<label for="" class="__fidfor">Password</label>-->
<!--									<input type="password" class="form-control" name="password"  placeholder=""/>-->
<!--								</div>-->
<!--								<div class="row">-->
<!--									<div class="col-md-3 col-sm-3 col-xs-3"></div>-->
<!--									<div class="col-md-6 col-sm-6 col-xs-6">-->
<!--										<button type="submit" class="btn btn-block">Login</button>-->
<!--									</div>-->
<!--                                    <div class="col-md-3 col-sm-3 col-xs-3"></div>-->
<!--								</div>-->
<!--								 <p class="text-center pt-3"><a href="/student/register"> Create new account here</a></p>-->
<!--                                    <p class="text-center"><a href="/admin/showPasswordResetForm"> Forgot password</a></p>-->
<!--							  </div>-->
<!--						</div>-->
<!--					</form>-->
<!--				</div>-->
<!--				<div class="modal-footer">-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--	</section>-->
<!--	<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>-->
<!--    <script src="{{ asset('js/bootstrap1.min.js') }}"></script>-->
<!--    <script src="{{ asset('js/main.js') }}"></script>-->
<!--    <script src="{{ asset('js/toastr.min.js') }}"></script>-->
<!--<script>-->
<!--    @if(Session::has('success'))-->
<!--    toastr.success("{{ Session::get('success') }}")-->

<!--    @elseif(Session::has('error'))-->
<!--    toastr.error("{{ Session::get('error') }}")-->

<!--    @elseif(Session::has('info'))-->
<!--    toastr.info("{{ Session::get('info') }}")-->

<!--    @endif-->
<!--</script>-->
<!--</body>-->
<!--</html>-->