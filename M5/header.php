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
		  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

		  <!-- Custom styles for this template -->
		  <link href="bootstrap/css/campussnapshot.css" rel="stylesheet">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="jumbotron jumbotron-fluid" style="background: linear-gradient(to right, rgba(0,0,0,0.7), rgba(105,105,105,0.3)), url('bootstrap/images/campus.jpg') no-repeat; background-size: cover; color: #ffffff; margin-bottom: 0px; padding-top: 10px; padding-bottom: 24px;">
			<div class="container">
				<h1 class="display-4">Welcome to Campus Snapshots</h1>
				<h5 class="lead">Current User: <?php echo $_SESSION['username'] ?>
				<?php if($_SESSION["userType"] === "1")
				{
					echo "| Role: administrator";
				} ?>
				</h5>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-custom">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link <?php if ($page=="Main Page") echo "active"; ?>" href="index.php">Main Page</a></li>
				<li class="nav-item"><a class="nav-link <?php if ($page=="Post Snapshot") echo  "active"; ?>" href="PostSnapshot.php">Post Snapshot</a></li>
				<li class="nav-item"><a class="nav-link <?php if ($page=="Search Snapshot") echo "active";?>" href="SearchSnapshot.php">Search Snapshot</a></li>
				<!-- <li><a href="UpdateSnapshot.php">Update Snapshot</a></li> -->
				<li class="nav-item"><a class="nav-link <?php if ($page=="Edit Account") echo "active"; ?>" href="EditAccount.php">Edit Account</a></li>
				<?php
				//show the reports link in the main page if user is admin
				if ($_SESSION["userType"] === "1") {
					if ($page == "Reports"){
						echo "<li class=\"nav-item\"><a class = \" nav-link active\" href=\"reports.php\">Reports</a></li>";
					}
					else{
						echo "<li class=\"nav-item\"><a class = \" nav-link\" href=\"reports.php\">Reports</a></li>";
					}
				}
				?>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item right nav-text"><a class="nav-link" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
			</div>
		</nav>
	</body>
</html>