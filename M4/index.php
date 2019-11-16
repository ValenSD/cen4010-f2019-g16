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

	<style>
		table,
		th,
		td {
			border: 1px solid black;
		}
	</style>


</head>


<body>
	<ul class="topnav">
		<li><a class="active" href="index.php">Main Page</a></li>
		<li><a href="PostSnapshot.html">Post Snapshot</a></li>
		<li><a href="SearchSnapshot.html">Search Snapshot</a></li>
		<li><a href="UpdateSnapshot.html">Update Snapshot</a></li>
		<li><a href="EditAccount.php">Edit Account</a></li>
		<li class="right"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
	</ul>
	<div class="container">
		<div class="col-lg mx-auto">
			<div class="logo mb-3">
				<div class="col-lg text-center">
					<h1>Welcome to Campus Snapshots</h1>
					<h5>Current User: <?php echo $_SESSION['username'] ?></h5>
				</div>
			</div>
		</div>
		<!--populate with posts table when defined -->
		<?php
		$sql = "SELECT USERS.USERSfirstname, USERS.USERSlastname, POSTS.POSTScreatedAt, POSTMESSAGES.POSTMESSAGESdesc, POSTMESSAGES.POSTMESSAGESmsg, POSTSIMGPATH.POSTSIMGPATHpath
		FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
		WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
		AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
		AND POSTS.USERS_idUSERS = USERS.idUSERS
		ORDER BY POSTS.IDPOSTS DESC
		LIMIT 10";
		$res = $dbcon->query($sql);

		echo "<table>"; // print table data from posts table

		while ($row = mysqli_fetch_array($res)) {   //Creates a loop to loop through results
			echo
				"<tr><td>" . $row['USERSfirstname']
					. " " . $row['USERSlastname'] . "</td><td>"
					. $row['POSTScreatedAt'] . "</td><td>"
					. $row['POSTMESSAGESdesc'] . "</td><td>"
					. $row['POSTMESSAGESmsg'] . "</td><td>
					<img src=' " . $target_dir . "/" . $row['POSTSIMGPATHpath'] . " ' height='200' width='200'></td></tr>";
		}

		echo "</table>"; //Close the table in HTML
		?>
	</div>
</body>

</html>