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
		<?php 
		$page = "Reports";
		include('header.php')
		?>
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
			<!--Most active Users -->
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
			echo "<div class=\"text-center\"><h2>Most Active Users</h2></div>";
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
							. $row['POSTS'] . "
						</td></tr>";
				}
			echo "</tbody>";
			echo "</table>"; //Close the table in HTML



			// <!--Most active day -->

			$sql = "SELECT SUBSTR(POSTS.POSTScreatedAt, 1,10) AS createdAt, 
			COUNT(POSTS.POSTScreatedAt) AS POSTS
			FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
			WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
			AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
			AND POSTS.USERS_idUSERS = USERS.idUSERS
			GROUP BY createdAt
			ORDER BY POSTS DESC
			LIMIT 25";
			$res = $dbcon->query($sql);
			echo "<div class=\"text-center\"><h2>Most Active Days</h2></div>";
			echo "<table class= \"table table-striped table-bordered\">"; // print table data from posts table
				echo "<thead class= \"thead-dark\">
						<tr>
							<th>Date</th>
							<th>Number of Posts</th>
						</tr>
					  </thead>";
				echo "<tbody>";
				while ($row = mysqli_fetch_array($res)) {   //Creates a loop to loop through results
					echo
						"<tr><td>" . $row['createdAt'] . "</td><td>"
							. " " . $row['POSTS'] . "
						</td></tr>";
				}
			echo "</tbody>";
			echo "</table>"; //Close the table in HTML
			?>
		</div>
	</body>
</html>
