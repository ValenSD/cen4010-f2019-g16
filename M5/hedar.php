<ul class="topnav">
    <li><a class="active" href="index.php">Main Page</a></li>
    <li><a href="PostSnapshot.php">Post Snapshot</a></li>
    <li><a href="SearchSnapshot.php">Search Snapshot</a></li>
    <!-- <li><a href="UpdateSnapshot.php">Update Snapshot</a></li> -->
    <li><a href="EditAccount.php">Edit Account</a></li>
    <?php
    //show the reports link in the main page if user is admin
    if ($userType === "1") {
        echo "<li><a href=\"Reports.php\">Reports</a></li>";
    }
    ?>
    <li class="right"><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>