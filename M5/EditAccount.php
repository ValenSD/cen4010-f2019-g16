<?php include('login_backend.php');
$email = $_SESSION['username'];
?>

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
	<?php include('header.php') ?>
	<div class="container">
		<div class="col-md-5 mx-auto">
			<div class="logo mb-3">
				<div class="col-lg text-center">
					<h1>Edit Account</h1>
				</div>
			</div>
			<form action="EditAccount.php" method="post" name="EditAccount">
        <?php include('errors.php'); ?>
        <input type="hidden" name="update_user" value="update_user">
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Email address</label>
					<div class="col-sm-8">
						<input type="email" name="email" value="<?php echo $email ?>" class="form-control" id="email" placeholder="Enter Email">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 col-form-label">Password</label>
					<div class="col-sm-8">
						<input type="password1" name="password1" id="password1"  class="form-control" placeholder="Enter or Change Password">
            <input type="password2" name="password2" id="password2"  class="form-control" placeholder="Verify above Password">
					</div>
				</div>
				<div class="text-center csbuttons">
					<button type="reset" name="reset" class=" btn btn-secondary tx-tfm">Reset</button>
					<button type="submit" name="submit" class=" btn btn-primary tx-tfm">Save</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
