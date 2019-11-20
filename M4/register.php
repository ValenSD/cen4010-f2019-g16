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
		<div class="jumbotron jumbotron-fluid" style="background: url('bootstrap/images/campus.jpg') no-repeat; background-size: cover; color: #ffffff;">
			<div class="container" >
				<h1 class="display-4">Welcome to Campus Snapshots</h1>
			</div>
		</div>
	  <div class="container">
		<div class="col-md-5 mx-auto">
			<div class="myform form ">
				<div class="logo mb-3">
					 <div class="col-md-12 text-center">
							<h1>Register</h1>
					 </div>
				</div>
				<form method="post" action="register.php" name="register">
					<?php include ('errors.php'); ?>
					<div class="form-group">
						<input type="hidden" name="register_user" value="register_user">
						<label>Email Address</label>
						<input type="email" name="email"  class="form-control" id="email" placeholder="Enter Email" value="<?php echo $email; ?>">
					</div>
					<div class="form-group">
						<label>First name</label>
						<input type="First Name" name="firstname"  class="form-control" id="firstname" placeholder="Enter First Name" value="<?php echo $firstname; ?>">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="Last Name" name="lastname"  class="form-control" id="lastname" placeholder="Enter Last Name" value="<?php echo $lastname; ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password1" id="password1"  class="form-control" placeholder="Enter Password">
						<input type="password" name="password2" id="password2"  class="form-control" placeholder="Confirm Password">
					</div>
					<div class="col-md-12 text-center ">
						<button type="submit" name="register_user" value="register_user" class="btn btn-block mybtn btn-primary tx-tfm">Register</button>
					</div>
					<div class="col-md-12 ">
						<div class="login-or">
						<hr class="hr-or">
						<span class="span-or">or</span>
						</div>
					</div>
					<div class="form-group">
						<p class="text-center">Already have account? <a href="login.php" >Login here</a></p>
					</div>
				</form>
			</div>
		</div>
	  </div>
	</body>

</html>
