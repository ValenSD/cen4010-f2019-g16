<?php
session_start();
require_once './server_vars.php';
if (!isset($_SESSION['username'])){
  $_SESSION['info'] = "Please Log in first";
  header('location:login.php');
}
if(($_POST)){}else{header('location: index.php');}
//check if image is included in POST
if($_FILES['fileToUpload']['name']!=""){
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
    if (isset($_FILES['upload'])){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false){
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

  if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],
      "$target_dir/" .$Newfilename))
      { }
  else {
    echo "File not accepted!";
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
if($dbcon->query($sqlposts)){}else {
  echo("Error description: " . mysqli_error($dbcon));
}
//$dbcon->close();

//------------------post messages table
$sqlmsgs = "CREATE TABLE IF NOT EXISTS `POSTMESSAGES` (
  `idPOSTMESSAGES` INT NOT NULL AUTO_INCREMENT,
  `POSTMESSAGESmsg` VARCHAR(50000) NOT NULL,
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
if($dbcon->query($sqlmsgs)){}else {
  echo("Error description: " . mysqli_error($dbcon));
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
if($dbcon->query($sqlimgpath)){}else {
  echo("Error description: " . mysqli_error($dbcon));
}
//define form-provided variables
$dateposted = $_POST["dateposted"];
$subject = $_POST["subject"];
$descripton = $_POST["description"];


//get the next post id
$sqlgetnextpostid = "SELECT `auto_increment`
FROM INFORMATION_SCHEMA.TABLES
WHERE table_name = 'POSTS'
LIMIT 0 , 30";
if($res = $dbcon->query($sqlgetnextpostid)){}else{echo("Error description: " . mysqli_error($dbcon));}
while($row = mysqli_fetch_array($res)){
  $nextpostid = $row['auto_increment'];
echo "next id: ", $nextpostid;
}
//build insert sql
$sqlinesertmessage = "INSERT INTO `POSTMESSAGES` (`idPOSTMESSAGES` ,`POSTMESSAGESmsg`, `POSTMESSAGEScreatedAt`, `POSTMESSAGESupdatedAt`,
`POSTS_idPOSTS`) VALUES (NULL, '$subject', '$dateposted', NULL, '$nextpostid')";
if($res = $dbcon->query($sqlinesertmessage)){
  }
  else{
    echo("Error description: " . mysqli_error($dbcon));
  }
//build sql insert statment
  //echo "File is an image - " . $check["mime"] . ".";
//$sqltesttable = "INSERT INTO TESTTABLE (postnum , dateposted, subject, filename) VALUES ('$Postnumber', '$dateposted', '$subject', '$Newfilename')";
//execute insert post statment
// if ($dbcon->query($sqltesttable)){
//     echo " <br/>Ticket number $Postnumber recorded! <br> <br>";
//
// }
// else
// {
//     echo "<br> error ";
//     exit();
// }

//display image to user
echo "<br><img src=' ". $target_dir . "/" . $Newfilename . " ' height='200' width='200'>";






//troubleshooting
echo "<br>target dir: $target_dir <br> target file: $target_file";
echo '<pre>';
var_dump($_FILES['fileToUpload']);
echo '</pre>';
var_dump($_SESSION);
echo '</pre>';
echo "IP ADDRESS: $ip_address<br>";
echo "date: ". $_POST['dateposted'] ." ";
//echo "subject: $_POST['subject']";
//echo $_SERVER["HTTP_FORWARDED_FOR"];



?>
