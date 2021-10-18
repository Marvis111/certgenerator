<!DOCTYPE html>
<?php 
	include '../controllers/server.php';
	if (isset($_SESSION['username'])) {
		header('location:index.php');
	}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refesh" content="3">
	<!-- js links -->
	<script type="text/javascript" src="../assets/jquery/jquery.min.js"></script>
	</script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="../assets/css/login.css">

	<link rel="stylesheet" type="text/css" href="../assets/fonts/icomoon/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/login.css">
   
    


	<title>Home | Welcome</title>
    <title>Home </title>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-light navbar-primary justify-content-space-between">
		<!-- Brand -->
		<a class="navbar-brand"  href="../">E-Certificate</a>
	  
		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		  <span class="icon-bars"></span>
		</button>
	  
		<!-- Navbar links -->
		<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
		  <ul class="navbar-nav">
			<li class="nav-item">
				<li class="nav-item">
					<a class="nav-link" href="./login.php">Login
						<span class="icon-person"></span>
					</a>
				  </li>
			  <a class="nav-link" href="./signup.php">
				  Sign up
				  <span class="icon-people"></span>
			  </a>
			</li>
		  </ul>
		</div>
	  </nav>

        <div class="formDiv">
		<div class="form_login bg-primary">
			<h3><b>Login</b></h3>
		</div>
		<div class="form">
			<form method="POST" action="login.php">
				<?php 
			include '../controllers/error.php';
			 ?>
				<input type="text" name="user_email" placeholder="Email">
				<input type="password" name="user_pwd" placeholder="Enter your password">
				<button type="submit" class="btn btn-primary" name="login">Login</button>
			</form>	

		</div>
		<div class="register">
			<p>Dont have an account? <a href="signup.php" class="text-primary">Register</a></p>
		</div>


	</div>

<style type="text/css">
	body{
		background: white;
	}
	.formDiv{	
	width: 35% !important;
	margin: 50px auto !important;
	border: 2px solid rgb(104, 104, 245);
	border-radius: 5px !important;
}
.form_login{
	width: 100% !important;
	height: 40px !important;
	text-transform: uppercase !important;
	color: white;
	margin-bottom: 15px;
	justify-content: center;
	display: flex;
	padding: 10px;
	flex-direction: column;
}
.form_login_err{
	padding: 5px;
	color: red;
	width: 80%;
	margin: 0 auto;
	margin-bottom: 5px;
	font-size: 20px;
	border-radius: 5px;

}
.form_login_err h5{
	margin-left: 10px;
	margin-top: 2px;
}

input{
	height: 35px;
	width: 90%;
	margin-left: 10px;
	padding: 10px;
	margin-bottom: 15px;

}
input::first-child{
	background: red !important;
}
.form h4{
	padding-left: 10px;
}
.form button{
	margin-left: 10px !important;
}
button:hover{
	opacity: 0.9;
}
.register{
	width: 100%;
	height: 40px;
	background: #f2f2f2;
	margin-top: 20px;
	justify-content: center;
	display: flex;
	flex-direction: column;padding-left: 10px;

}
.register a{
	color:#005580;
	font-weight: bolder;
}
@media(max-width: 760px){
	.formDiv{
		width: 80% !important;
	}
}
@media(max-width: 560px){
	.formDiv{
		width: 90% !important;
	}
}
</style>
</body>
</html>