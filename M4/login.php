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
						<h1>Login</h1>
				 </div>
			</div>
            <form action="login.php" method="post" name="login">
              <input type="hidden" name="login_user" value="login_user">
                <div class="form-group">
                    <label>Username (email)</label>
                    <input type="username" name="username"  class="form-control" id="username" placeholder="Enter Email">
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
                    <p class="text-center">Don't have account? <a href="register.html" >Register here</a></p>
                </div>
            </form>
        </div>
	</div>
  </div>
</body>

</html>
