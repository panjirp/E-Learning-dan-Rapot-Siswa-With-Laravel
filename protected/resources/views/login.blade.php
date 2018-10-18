
<html>
<head>
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>
<body>
<div class = "container">
	<div class="wrapper">
		
	@if (session('message'))
    <div class="alert alert-danger">
        <center>{{ session('message') }}</center>
    </div>
	@endif

		<form action="" method="post" name="Login_Form" class="form-signin"> 
		@csrf      
		    <h3 class="form-signin-heading">Log In</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
			  <input type="password" class="form-control" name="password" placeholder="Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>  			
		</form>	


	</div>
</div>
</body>
</html>