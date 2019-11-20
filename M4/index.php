<?php
session_start();
require_once './server_vars.php';
if (!isset($_SESSION['username'])) {
	$_SESSION['info'] = "Please Log in first";
	header('location:login.php');
}
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>

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
		<li><a class="active" href="index.php">Main Page</a></li>
		<li><a href="PostSnapshot.html">Post Snapshot</a></li>
		<li><a href="SearchSnapshot.html">Search Snapshot</a></li>
		<li><a href="UpdateSnapshot.html">Update Snapshot</a></li>
		<li><a href="EditAccount.html">Edit Account</a></li>
		<li class="right"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
	</ul>
	<div class="jumbotron jumbotron-fluid" style="background: url('bootstrap/images/campus.jpg') no-repeat; background-size: cover; color: #ffffff;">
		<div class="container" >
			<h1 class="display-4">Welcome to Campus Snapshots</h1>
			<h5 class="lead">Current User: <?php echo $_SESSION['username'] ?></h5>
		</div>
	</div>
	<div class="container">
		<!--populate with posts table when defined -->
		<?php
		$sql = "SELECT POSTS.IDPOSTS, USERS.USERSfirstname, USERS.USERSlastname, POSTS.POSTScreatedAt, POSTMESSAGES.POSTMESSAGESmsg, POSTMESSAGES.POSTMESSAGESdesc,  POSTSIMGPATH.POSTSIMGPATHpath
		FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
		WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
		AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
		AND POSTS.USERS_idUSERS = USERS.idUSERS
		ORDER BY POSTS.IDPOSTS DESC
		LIMIT 10";
		$res = $dbcon->query($sql);

		echo "<table class= \"table table-striped table-bordered\">"; // print table data from posts table
			echo "<thead class= \"thead-dark\">
					<tr>
					<th>Reporter</th>
					<th>Date Created</th>
					<th>Subject</th>
					<th>Description</th>
					<th>Image</th>
					<th>Edit</th>
					</tr>
				  </thead>";
			echo "<tbody>";
			while ($row = mysqli_fetch_array($res)) {   //Creates a loop to loop through results
				echo
					"<tr><td>" . $row['USERSfirstname']
						. " " . $row['USERSlastname'] . "</td><td>"
						. $row['POSTScreatedAt'] . "</td><td>"
						. $row['POSTMESSAGESmsg'] . "</td><td>"
						. $row['POSTMESSAGESdesc'] . "</td><td>";
						//check if this record has a image name
						if($row['POSTSIMGPATHpath'] != ''){
							echo "<img src=' " . $target_dir . "" . $row['POSTSIMGPATHpath'] . " ' height='200' width='200'></td>";
						}
						echo "<td><a href=UpdateSnapshot.php?POSTn=" . $row['IDPOSTS'] . ">edit</a></td></tr>";
			}
		echo "</tbody>";
		echo "</table>"; //Close the table in HTML
		?>
	</div>
</body>

</html>
