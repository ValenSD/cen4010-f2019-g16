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
		 $page="";
		 include('header.php');
		?>
	</head>
	<body>
		<div class="container">
		  <?php
		  //get values from searchsnapshot.php, escaping if empty.  gotta be a better way
		  if (empty($_POST['username'])) {
			$user = '%';
		  } else {
			$user = $_POST['username'];
		  }
		  if (empty($_POST['subject'])) {
			$subject = '%';
		  } else {
			$subject = $_POST['subject'];
		  }
		  if (empty($_POST['description'])) {
			$description = '%';
		  } else {
			$description = $_POST['description'];
		  }
		  if (empty($_POST['dateposted'])) {
			$dateposted = '%';
		  } else {
			$dateposted = $_POST['dateposted'];
		  }

		  if (empty($_POST['status'])) {
			$dateposted = '%';
		  } else if ($_POST['status'] === 'Open') {
			$status = 1;
		  } else {
			$status = 0;
		  }

		  // echo '<pre>';
		  // print_r($_POST);
		  // echo '</pre>';

		  $sql = "SELECT POSTS.IDPOSTS, POSTS.USERS_idUSERS, 
		  USERS.USERSfirstname, USERS.USERSlastname, POSTS.POSTScreatedAt, 
		  POSTMESSAGES.POSTMESSAGESmsg, POSTMESSAGES.POSTMESSAGESdesc,  POSTSIMGPATH.POSTSIMGPATHpath
		FROM USERS, POSTS, POSTMESSAGES, POSTSIMGPATH
		WHERE POSTS.IDPOSTS = POSTMESSAGES.POSTS_IDPOSTS
		AND POSTS.idPOSTS = POSTSIMGPATH.POSTS_idPOSTS
		AND POSTS.USERS_idUSERS = USERS.idUSERS
		AND (USERS.USERSlastname LIKE '%$user%' OR USERS.USERSfirstname LIKE '%$user%')
		AND POSTMESSAGES.POSTMESSAGESmsg LIKE '%$subject%'
		AND POSTMESSAGES.POSTMESSAGESdesc LIKE '%$description%'
		AND POSTS.POSTScreatedAt LIKE '%$dateposted%'
		AND POSTS.POSTSstatus = $status
		GROUP BY POSTS.IDPOSTS DESC";

		  // echo '<pre>';
		  // echo $sql;
		  // echo '</pre>';

		  $res = $dbcon->query($sql);

		  $searchResult = mysqli_num_rows($res);

		  echo "<div><h2>Search Result: $searchResult</h2></div>";
		  echo "<table class= \"table table-striped table-bordered\">"; // print table data from posts table
		  echo "<thead class= \"thead-dark\">
			  <tr>
			  <th>Reporter</th>
			  <th>Date Created</th>
			  <th>Subject</th>
			  <th>Description</th>
			  <th>Image</th>
			  <th>Edit / View</th>
			  </tr>
			  </thead>";
		  echo "<tbody>";
		  while ($row = mysqli_fetch_array($res)) {   //Creates a loop to loop through results
			echo
			  "<tr><td>" . $row['USERSfirstname']
				. " " . $row['USERSlastname'] . "</td><td>"
				. $row['POSTScreatedAt'] . "</td><td>"
				. $row['POSTMESSAGESmsg'] . "</td><td>"
				. $row['POSTMESSAGESdesc'] . "</td><td class=\"text-center\">";
			//check if this record has a image name
			if ($row['POSTSIMGPATHpath'] != '') {
			  echo "<img class=\"img-fluid\" src=' " . $target_dir . "" . $row['POSTSIMGPATHpath'] . " ' height='200' width='200'></td>";
			}
			if ($row['USERS_idUSERS'] == $_SESSION["userid"]) {
			  echo "<td><a href=UpdateSnapshot.php?postn=" . $row['IDPOSTS'] . ">Edit</a></td></tr>";
			} else {
			  echo "<td><a href=UpdateSnapshot.php?postn=" . $row['IDPOSTS'] . ">view</a></td></tr>";
			}
		  }
		  echo "</tbody>";
		  echo "</table>"; //Close the table in HTML
		?>
	  </div>
  </body>
</html>