<?php
  session_start();
  require_once './server_vars.php';
  if (!isset($_SESSION['username'])) {
  	$_SESSION['info'] = "Please Log in first";
  	header('location:login.php');
  }
  $postid = $_POST['']
$sqlreadpostdata = "SELECT USERS.USERSfirstname, USERS.USERSlastname, POSTS.POSTScreatedAt, POSTMESSAGES.POSTMESSAGESmsg, POSTSIMGPATH.POSTSIMGPATHpath
FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
AND POSTS.USERS_idUSERS = USERS.idUSERS
AND POSTS.idPOSTS = 2
LIMIT 0 , 30 ";

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
	<ul class="topnav">
	  <li><a href="index.php">Main Page</a></li>
	  <li><a href="PostSnapshot.html">Post Snapshot</a></li>
	  <li><a href="SearchSnapshot.html">Search Snapshot</a></li>
	  <li><a class="active" href="UpdateSnapshot.html">Update Snapshot</a></li>
	  <li><a href="EditAccount.html">Edit Account</a></li>
	  <li class="right"><a href="logout.php"><i class="fa fa-sign-out"></i>  Logout</a></li>
	</ul>
	<div class="container">
		<div class="col-md-5 mx-auto">
			<div class="logo mb-3">
				<div class="col-lg text-center">
					<h1>Update Snapshot</h1>
				</div>
			</div>
			<form action="" method="post" enctype="multipart/form-data" name="UpdateSnapsot">
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Date</label>
					<div class="col-sm-9">
						<input type="text" name="dateposted"  class="form-control" id="dateposted" placeholder="Readonly input here…(Date)" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Subject</label>
					<div class="col-sm-9">
						<input type="text" name="subject"  class="form-control" id="subject" placeholder="Readonly input here…(subject)" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Reporter</label>
					<div class="col-sm-9">
						<input type="text" name="reporter"  class="form-control" id="reporter"  placeholder="Readonly input here…(reporter's name)" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Days Active</label>
					<div class="col-sm-9">
						<input type="text" name="daysactive" class="form-control" id="daysactive" placeholder="Readonly input here…(day's active)" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Views</label>
					<div class="col-sm-9">
						<input type="text" name="views" class="form-control" id="views" placeholder="Readonly input here…(views)" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Status:</label>
					<div class="col-sm-9">
						<select name="status"  class="form-control" id="status" >
						  <option>Open</option>
						  <option>Closed</option>
						</select>
					</div>
				</div>
				<div class="text-center csbuttons">
					<button type="reset" name="reset" class=" btn btn-secondary tx-tfm">Reset</button>
					<button type="submit" name="submit" class=" btn btn-primary tx-tfm">Update</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
