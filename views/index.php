<?php
	include '../controllers/cert.gen.php';
	include '../controllers/pdfdownload.php';
	if (!isset($_SESSION['username'])) {
		header('location:login.php');
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refrsh" content="3">
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
		<a class="navbar-brand"  href="#">E-Certificate</a>
	  
		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler text-primary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		  <span class="icon-bars"></span>
		</button>
	  
		<!-- Navbar links -->
		<div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
		  <ul class="navbar-nav">
			<li class="nav-item">
					<a class="nav-link" href="./index.php">
						<?php echo $_SESSION['username']; ?>
						<span class="icon-person"></span>
					</a>	 
			</li>
				<li class="nav-item">
					<button type="button" class="btn btn-danger">
						<a href="logout.php" class="text-light" style="text-decoration: none;">Logout</a>
					</button>	 
			</li>
		  </ul>
		</div>
	  </nav>
	  <section class="container generate col-md-6 bg-color justify-content-center">
	  	<div class="certificate">
	  		<div class="cert ">
	  			<span class="username "><?php echo $_SESSION['username']; ?></span>
	  		<img src="../assets/images/certificate.jpg" />
	  		</div>
	  		<div class="">
	  			<form method="POST" action="index.php">
	  				<button type="submit" name="downloadcert" class="btn btn-primary">
	  					<span>Download as JPG <i class="icon-chevron-down"></i></span>
	  				</button>
	  				<button type="submit" name="downloadcertpdf" class="btn btn-success">
	  					<span>Download As PDF <i class="icon-chevron-down"></i></span>
	  				</button>
	  			</form>
	  		</div>
	  	</div>
	  </section>
	  <style type="text/css">

	  	.username{
	  		position: absolute;
	  		top: 150px;
	  		text-align: center;
	  		font-size: 30px;
	  		left:22%;
	  	}
	  		@media all and (max-width:760px ){
	  		.username{
	  			left: 15%;
	  		}
	  	}
	  	.cert{
	  		text-align: center;
	  		width: 98%;
	  		height: 350px;
	  		margin: 5px auto ;
	  		box-shadow: 1px 1px 4px grey;
	  		position: relative !important;
	  	} 
	  	.cert img{
	  		width: 100%;
	  		height: inherit;
	  		box-shadow: inherit;

	  	}
	  	.certificate{
	  		width: 100%;
	  		height: 100%;
	  	}
	  	.generate{
	  		margin: 50px auto  !important;
	  		box-shadow: 1px 1px 4px grey;
	  		padding: 10px 0;
	  		text-align: center;

	  	}
	  	body{
	  		background: white;
	  	}
	  </style>
</body>
</html>