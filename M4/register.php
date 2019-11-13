<?php include('login_backend.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Campus Snapshot</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/campussnapshot.css" rel="stylesheet">

</head>

<body>
  <div class="container">
    <div class="col-md-5 mx-auto">
		<div class="myform form ">
			<div class="logo mb-3">
				 <div class="col-md-12 text-center">
						<h1>Registration</h1>
				 </div>
			</div>
            <form method="post" action="register.php">
				<div class="form-group">
                    <input type="hidden" name"reigister_user" value="register_user">
                    <label>Email</label>
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
                    <input type="password" name="password" id="password"  class="form-control" placeholder="Enter Password">
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
                    <p class="text-center">Already have account? <a href="login.html" >Login here</a></p>
                </div>
            </form>
        </div>
	</div>
  </div>
</body>

</html>
