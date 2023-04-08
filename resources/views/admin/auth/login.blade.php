<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>{{ env('APP_NAME') }}</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/assets_admin/img/favicon.png')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/assets_admin/plugins/fontawesome/css/all.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/css/feathericon.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/plugins/morris/morris.css')}}">
	<link rel="stylesheet" href="{{ asset('assets/assets_admin/css/style.css')}}">
 </head>


<body>
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
            <div class="col-md-12 text-center mt-2">
                <!-- <h3 class="text-primary">Blog CMS</h3> -->
            <img class="img-fluid" src="{{ asset('assets/logo.png')}}" alt="Logo" style="height:50px;">
            </div>
				<div class="loginbox">
					<div class="login-right">
						<div class="login-right-wrap">
							<h1>Login</h1>
                            <div class="flash-message">
                                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                    @if (Session::has('alert-' . $msg))
                                        <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                                            {{ Session::get('alert-' . $msg) }}
                                            <button type="button" class="btn btn-info btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <form method="post" action="{{ route('adminAuthLogin') }}" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <input class="form-control" name="username" type="text" placeholder="Email" id="text1"> </div>
                                    <small class="form-text text-danger">@error('username') {{ $message }} @enderror</small>
                                <div class="form-group">
                                    <input class="form-control" name="password" type="password" placeholder="Password" id="text2"> </div>
                                    <small class="form-text text-danger">@error('password') {{ $message }} @enderror</small>
                                <div class="form-group">
                                    <button class="btn btn-info btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            @if(false)
                            <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a> </div>
                            <div class="login-or"> <span class="or-line"></span> <span class="span-or">or</span> </div>
                            {{-- <div class="social-login"> <span>Login with</span> <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#" class="google"><i class="fab fa-google"></i></a> </div> --}}
                            <div class="text-center dont-have">Don’t have an account? <a href="register.html">Register</a></div>
                            @endif
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/script.js"></script>

    <script type="text/javascript">
function validate()
{
    if(   document.getElementById("text1").value == "admin"
       && document.getElementById("text2").value == "password" )
    {
        //alert( "validation succeeded" );
		window.location.href = "dashboard.html";
    }
    else
    {
        //alert( "validation failed" );
        location.href="index.html";
    }
}
</script>
</body>

</html>
