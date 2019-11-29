<?php
session_start();
require_once './server_vars.php';
if (!isset($_SESSION['username'])) {
	$_SESSION['info'] = "Please Log in first";
	header('location:login.php');

}

$curuser = $_SESSION["userid"];
?>

<html lang="en">

<head>
	<?php include('header.php') ?>
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
    <!-- 
	<div class="jumbotron jumbotron-fluid" style="background: url('bootstrap/images/campus.jpg') no-repeat; background-size: cover; color: #ffffff;">
		<div class="container" >
			<h1 class="display-4">Welcome to Campus Snapshots</h1>
			<h5 class="lead">Current User: <?php echo $_SESSION['username'] ?>
			<?php if($_SESSION["userType"] === "1")
			{
				echo "| Role: administrator";
			} ?>
			</h5>
		</div>
	</div> -->
	<div class="container">
		<!--populate with posts table when defined -->
		<?php
		$sql = "SELECT USERS.USERSfirstname, USERS.USERSlastname, COUNT(USERS.USERSfirstname) AS POSTS
        FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
        WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
        AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
        AND POSTS.USERS_idUSERS = USERS.idUSERS
        GROUP BY USERS.USERSfirstname
        ORDER BY POSTS DESC
        LIMIT 10";
		$res = $dbcon->query($sql);

		echo "<table class= \"table table-striped table-bordered\">"; // print table data from posts table
			echo "<thead class= \"thead-dark\">
					<tr>
                        <th>Reporter</th>
                        <th>Number of Posts</th>
					</tr>
				  </thead>";
			echo "<tbody>";
			while ($row = mysqli_fetch_array($res)) {   //Creates a loop to loop through results
				echo
					"<tr><td>" . $row['USERSfirstname']
						. " " . $row['USERSlastname'] . "</td><td>"
						. $row['POSTScreatedAt'] . "</td><td>"
						. $row['POSTMESSAGESmsg'] . "</td><td>"
						. $row['POSTMESSAGESdesc'] . "</td><td></td></tr>";
			}
		echo "</tbody>";
		echo "</table>"; //Close the table in HTML
		?>
	</div>
</body>

</html>
