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
</head>
<body>
    
    <div class="container" style="max-width: 500px; margin-top:60px;">
        
        <div class="my-card">
            <!-- Centered Pills -->
            <ul class="nav nav-pills nav-justified">
              <li class="active"><a href="/login/admin">Login As Admin</a></li>
              <li><a href="/student/login">Login As Student</a></li>
            </ul>
            
            <form method="post" action="/admin/login" style="margin-top: 30px;">
                
                 @csrf
                
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <div class="form-group">
                    
                    <button class="btn btn-primary btn-block">Login as admin</button>
                </div>
                
                <p class="text-center"><a href="/auth/register">Create new Account</a></p>
                
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