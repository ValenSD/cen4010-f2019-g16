<?php
session_start();
require_once './server_vars.php';
if (!isset($_SESSION['username'])) {
	$_SESSION['info'] = "Please Log in first";
	header('location:login.php');

}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<?php 
	$page="Post Snapshot";
	include('header.php') 
	?>
	</head>
	<body>
		<div class="container">
			<div class="col-md-5 mx-auto">
				<div class="logo mb-3">
					<div class="col-lg text-center">
						<h1>Post Snapshot</h1>
					</div>
				</div>
				<form action="upload_post.php" method="post" enctype="multipart/form-data" name="PostSnapshot">
					<div class="form-group row">
						<!-- <label class="col-sm-3 col-form-label">Date</label>
						<div class="col-sm-9">
							<input type="date" name="dateposted"  class="form-control" id="dateposted">
						</div> -->
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Subject</label>
						<div class="col-sm-9">
							<input type="text" name="subject"  class="form-control" id="subject" placeholder="Enter Subject" >
						</div>
					</div>
					<!-- getting this from php -->
					<!-- <div class="form-group row">
						<label class="col-sm-3 col-form-label">Reporter</label>
						<div class="col-sm-9">
							<input type="text" name="reporter"  class="form-control" id="reporter" placeholder="Enter Reporter's name" >
						</div>
					</div> -->
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<textarea name="description" class="form-control" id="description" rows="3" placeholder="Enter Description..."></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Image</label>
						<div class="col-sm-9">
							<input type="file" name="fileToUpload" class="form-control-file" id="fileToUpload">
							<label class="custom-file-label" for="fileToUpload">Select image to upload</label>
						</div>
					</div>
					<div class="text-center csbuttons">
						<button type="reset" name="reset" class=" btn btn-secondary tx-tfm">Reset</button>
						<button type="submit" name="submit" class=" btn btn-primary tx-tfm">Post</button>
					</div>
				</form>
			</div>
		</div>
	  <!-- Bootstrap core JavaScript -->
	  <script src="bootstrap/jquery/jquery.min.js"></script>
	  <!-- JavaScript -->
	  <script src="bootstrap/js/post_snapshot.js"></script>
	</body>
</html>
