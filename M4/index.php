<?php
  session_start();
  require_once './server_vars.php';
if (!isset($_SESSION['username'])){
  $_SESSION['info'] = "Please Log in first";
  header('location:login.php');
  }
  echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Campus Snapshots</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/campussnapshot.css" rel="stylesheet">

</head>

<body>
	<ul class="topnav">
	  <li><a class="active" href="index.php">Main Page</a></li>
	  <li><a href="PostSnapshot.html">Post Snapshot</a></li>
	  <li><a href="">Search Snapshot</a></li>
	  <li><a href="">Update Snapshot</a></li>
	  <li><a href="">Edit Account</a></li>
	</ul>
	<div class="container">
		<div class="col-lg mx-auto">
			<div class="logo mb-3">
				<div class="col-lg text-center">
					<h1>Welcome to Campus Snapshots</h1>
				</div>
			</div>
		</div>
<!-- <?php
$sql = "select * from USERS";
$res = $dbcon->query($sql);

while ($row = $res->fetch_assoc()) {
    print_r($row);
}
?> -->
        <a href="postsnapshot.html">Post!<a>
	</div>
</body>
</html>