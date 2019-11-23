<?php
session_start();
require_once './server_vars.php';
if (!isset($_SESSION['username'])) {
  $_SESSION['info'] = "Please Log in first";
  header('location:login.php');
}
if (($_POST)) { } else {
  header('location: index.php');
}

$error_array   = array();
//check if image is included in POST
if ($_FILES['fileToUpload']['name'] != "") {
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  if (isset($_FILES['upload'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  //Move the file over.
  $temp = explode(".", $_FILES["fileToUpload"]["name"]);
  //create ticket number
  $Postnumber = strftime("%Y%m%d%H%M%S");
  //create timestamp filename
  $Newfilename = strftime("%Y%m%d%H%M%S") . '.' . end($temp);

  if (move_uploaded_file(
    $_FILES['fileToUpload']['tmp_name'],
    "$target_dir/" . $Newfilename
  )) { } else {
    echo "File not accepted!";
    array_push($error_array, "File not accepted!");
  }
} //end file empty IF
//create tables if necessary
//--------------posts table---------------------------
$sqlposts = "CREATE TABLE IF NOT EXISTS `POSTS` (
  `idPOSTS` INT NOT NULL AUTO_INCREMENT,
  `POSTScreatedAt` TIMESTAMP NULL,
  `POSTSupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `USERS_idUSERS` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idPOSTS`),
  INDEX `fk_POSTS_USERS_idx` (`USERS_idUSERS` ASC),
  CONSTRAINT `fk_POSTS_USERS`
    FOREIGN KEY (`USERS_idUSERS`)
    REFERENCES `USERS` (`idUSERS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;";
if ($dbcon->query($sqlposts)) { } else {
  echo ("Error description1: " . mysqli_error($dbcon));
  array_push($error_array, "Error description: " . mysqli_error($dbcon));
}


//------------------post messages table
$sqlmsgs = "CREATE TABLE IF NOT EXISTS `POSTMESSAGES` (
  `idPOSTMESSAGES` INT NOT NULL AUTO_INCREMENT,
  `POSTMESSAGESdesc` VARCHAR(5000) NOT NULL,
  `POSTMESSAGESmsg` VARCHAR(5000) NOT NULL,
  `POSTMESSAGEScreatedAt` TIMESTAMP NULL,
  `POSTMESSAGESupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `POSTS_idPOSTS` INT NOT NULL,
  PRIMARY KEY (`idPOSTMESSAGES`),
  INDEX `fk_POSTMESSAGES_POSTS1_idx` (`POSTS_idPOSTS` ASC),
  CONSTRAINT `fk_POSTMESSAGES_POSTS1`
    FOREIGN KEY (`POSTS_idPOSTS`)
    REFERENCES `POSTS` (`idPOSTS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB";
if ($dbcon->query($sqlmsgs)) { } else {
  echo ("Error description2: " . mysqli_error($dbcon));
  array_push($error_array, "Error description: " . mysqli_error($dbcon));
}
//mysqli_free_result($sqlmsgs);

//------------------img path table
$sqlimgpath = "CREATE TABLE IF NOT EXISTS `POSTSIMGPATH` (
  `idPOSTSIMGPATH` INT NOT NULL AUTO_INCREMENT,
  `POSTSIMGPATHpath` VARCHAR(255) NULL,
  `POSTSIMGPATHcreatedAt` TIMESTAMP NULL,
  `POSTSIMGPATHupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  `POSTS_idPOSTS` INT NOT NULL,
  PRIMARY KEY (`idPOSTSIMGPATH`),
  INDEX `fk_POSTSIMGPATH_POSTS1_idx` (`POSTS_idPOSTS` ASC),
  CONSTRAINT `fk_POSTSIMGPATH_POSTS1`
    FOREIGN KEY (`POSTS_idPOSTS`)
    REFERENCES `POSTS` (`idPOSTS`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;";
if ($dbcon->query($sqlimgpath)) { } else {
  echo ("Error description3: " . mysqli_error($dbcon));
  array_push($error_array, "Error description: " . mysqli_error($dbcon));
}
//get today's date
$dateposted = strftime("%Y%m%d%H%M%S");

//define form-provided variables
//$dateposted = $_POST["dateposted"];
$subject = $_POST["subject"];
$descripton = $_POST["description"];

//insert into POSTS table to get the last inserted ID;
$userId = $_SESSION['userid'];
$sqlInsertPost = "
INSERT INTO `cen4010fal19_g16`.`POSTS` (
  `idPOSTS` ,
  `POSTScreatedAt` ,
  `POSTSupdatedAt` ,
  `USERS_idUSERS`, 
  `POSTSviews`,
  `POSTSstatus`
  )
  VALUES (
  NULL , '$dateposted', NULL , '$userId', 1, 1
  )";

// echo "<p>" . $sqlInsertPost;

if ($res = $dbcon->query($sqlInsertPost)) { } else {
  echo ("Error description: " . mysqli_error($dbcon));
  array_push($error_array, "Error description4: " . mysqli_error($dbcon));
}

// GET THE LAST INSERTED ID FROM POSTS
$sqlGetLastPOSTSInsertId = "
SELECT idPOSTS
FROM `POSTS`
ORDER BY idPOSTS DESC
LIMIT 1";

// echo "<p>" . $sqlGetLastPOSTSInsertId;

if ($res = $dbcon->query($sqlGetLastPOSTSInsertId)) {
  $row = mysqli_fetch_array($res);
  $lastInsertedPOSTSId = $row['idPOSTS'];
} else {
  echo ("Error description5: " . mysqli_error($dbcon));
}


// insert the image path using the POSTS id from the previous query
$sqlInsertImgPath = "
INSERT INTO `cen4010fal19_g16`.`POSTSIMGPATH` (
`idPOSTSIMGPATH` ,
`POSTSIMGPATHpath` ,
`POSTSIMGPATHcreatedAt` ,
`POSTSIMGPATHupdatedAt` ,
`POSTS_idPOSTS`
)
VALUES (
NULL , '$Newfilename', '$dateposted', NULL , '$lastInsertedPOSTSId'
)";

// echo "<p>" . $sqlInsertImgPath;

if ($res = $dbcon->query($sqlInsertImgPath)) { } else {
  echo ("Error description6: " . mysqli_error($dbcon));
  array_push($error_array, "Error description: " . mysqli_error($dbcon));
}

//build insert sql
$sqlinesertmessage = "INSERT INTO `POSTMESSAGES` (`idPOSTMESSAGES` ,`POSTMESSAGESdesc`,`POSTMESSAGESmsg`, `POSTMESSAGEScreatedAt`, `POSTMESSAGESupdatedAt`,
`POSTS_idPOSTS`) VALUES (NULL, '$descripton', '$subject', '$dateposted', NULL, '$lastInsertedPOSTSId')";

// echo "<p>" . $sqlinesertmessage;

if ($res = $dbcon->query($sqlinesertmessage)) { } else {
  echo ("Error description: " . mysqli_error($dbcon));
  array_push($error_array, "Error description7: " . mysqli_error($dbcon));
}

echo count($error_array);

if (count($error_array) > 0) {
  echo "<pre>";
  print_r($error_array);
  echo "</pre>";
} else {
  header('location: index.php');
}


//display image to user
// echo "<br><img src=' " . $target_dir . "/" . $Newfilename . " ' height='200' width='200'>";

//troubleshooting
// echo "<br>target dir: $target_dir <br> target file: $target_file";
// echo '<pre>';
// var_dump($_FILES['fileToUpload']);
// echo '</pre>';
// var_dump($_SESSION);
// echo '</pre>';
// echo "IP ADDRESS: $ip_address<br>";
// echo "date: " . $_POST['dateposted'] . " ";
//echo "subject: $_POST['subject']";
//echo $_SERVER["HTTP_FORWARDED_FOR"];
