<?php include('login_backend.php') ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">

	  <title>Campus Snapshots</title>

	  <!-- Bootstrap core CSS -->
	  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

	  <!-- Custom styles for this template -->
	  <link href="bootstrap/css/campussnapshot.css" rel="stylesheet">

	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</head>
	<body>
	  <div class="jumbotron jumbotron-fluid" style="background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(105,105,105,0.3)), url('bootstrap/images/campus.jpg') no-repeat; background-size: cover; color: #ffffff; padding: 10px 0px 55px 0px;">
			<div class="container" >
				<h1 class="display-4">Welcome to Campus Snapshots</h1>
			</div>
	  </div>
	  <div class="container">
		<div class="col-md-5 mx-auto">
			<div class="myform form ">
				<div class="logo mb-3">
					 <div class="col-md-12 text-center">
							<h1>Login</h1>
					 </div>
				</div>
				<form action="login.php" method="post" name="login">
					<?php include('errors.php'); ?>
				  <input type="hidden" name="login_user" value="login_user">
					<div class="form-group">
						<label>Email address</label>
						<input type="email" name="email"  class="form-control" id="email" placeholder="Enter Email">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
					</div>
					<div class="col-md-12 text-center ">
						<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
					</div>
					<div class="col-md-12 ">
						<div class="login-or">
						<hr class="hr-or">
						<span class="span-or">or</span>
						</div>
					</div>
					<div class="form-group">
						<p class="text-center">Don't have account? <a href="register.php" >Register here</a></p>
					</div>
				</form>
			</div>
		</div>
	  </div>
	</body>
</html>
