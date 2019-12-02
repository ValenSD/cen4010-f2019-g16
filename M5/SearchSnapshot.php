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
		$page = "Search Snapshot";
		include('header.php') 
		?>
	</head>
	<body>
		<div class="container">
			<div class="col-md-5 mx-auto">
				<div class="logo mb-3">
					<div class="col-lg text-center">
						<h1>Search Snapshot</h1>
					</div>
				</div>
						<form action="searchresults.php" method="post" enctype="multipart/form-data" name="SearchSnapshot">
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Date</label>
						<div class="col-sm-9">
							<input type="date" name="dateposted"  class="form-control" id="dateposted">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Subject</label>
						<div class="col-sm-9">
							<input type="text" name="subject"  class="form-control" id="subject" placeholder="Enter Subject" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Description</label>
						<div class="col-sm-9">
							<input type="text" name="description"  class="form-control" id="description" placeholder="Enter Description" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Reporter</label>
						<div class="col-sm-9">
							<input type="text" name="username"  class="form-control" id="username" placeholder="Enter Reporter's Name" >
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-3 col-form-label">Status:</label>
						<div class="col-sm-9">
							<select name="status"  class="form-control" id="status" >
							  <option selected="selected">Open</option>
							  <option>Closed</option>
							</select>
						</div>
					</div>
					<div class="text-center csbuttons">
						<button type="reset" name="reset" class=" btn btn-secondary tx-tfm">Reset</button>
						<button type="submit" name="submit" class=" btn btn-primary tx-tfm">Search</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
