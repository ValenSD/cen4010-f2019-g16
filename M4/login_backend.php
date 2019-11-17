
<?php session_start();

//initialize variables
$firstname = "";
$lastname = "";
$email    = "";
$error_array   = array();

//server variables
require_once './server_vars.php';

// first time registration
if (isset($_POST['register_user'])){

  //get form values
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password = $_POST["password"];


  //validate fields
  if (empty($firstname)) { array_push($error_array, "First Name is empty");}
  if (empty($lastname)) { array_push($error_array, "Last Name is empty");}
  if (empty($email)) { array_push($error_array, "email is empty");}
  if (empty($password)) { array_push($error_array, "Username is empty");}
//ecrypt Password
  $password_encr = md5($password);

//create user table if it does not exists
//build sql to create table
$stmnt = $dbcon->prepare("CREATE TABLE IF NOT EXISTS `USERS` (
  `idUSERS` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `USERSfirstname` VARCHAR(45) NULL,
  `USERSlastname` VARCHAR(100) NULL,
  `USERSemail` VARCHAR(100) NOT NULL,
  `USERSpassword` VARCHAR(45) NULL,
  `USERSremember_token` VARCHAR(45) NULL,
  `USERScreatedAt` TIMESTAMP NULL,
  `USERSupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUSERS`))
ENGINE = InnoDB;");
//try to create table
if($stmnt->execute()){}else{echo "<br> user table create error";}

//insert user
$timestamp = strftime("%Y%m%d%H%M%S");
if (count($error_array) == 0){
  $stmnt = $dbcon->prepare("INSERT INTO `USERS` (`idUSERS` , `USERSfirstname` , `USERSlastname` , `USERSemail` , `USERSpassword` ,
  `USERSremember_token` , `USERScreatedAt` ,`USERSupdatedAt`)
  VALUES (NULL , '$firstname', '$lastname', '$email', '$password_encr', NULL , $timestamp, NULL)");
if ($stmnt->execute()){} else {echo "Insert User Error";}
$dbcon->close();
  $_SESSION['email'] = $email;
  $_SESSION['firstname']=$firstname;
  $_SESSION['lastname']=$lastname;
  $_SESSION['success'] = "Success";
  header('location: index.php');
  //troubleshooting...remove later
  echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
  }

} //end of register user if

//login user
if (isset($_POST['login_user'])){
  $username = $_POST["email"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_encr = md5($password);

//build sql to verify user
  $sql = "SELECT USERS.idUSERS FROM USERS WHERE USERS.USERSemail LIKE '$email' AND USERS.USERSpassword = '$password_encr'";
  //execute SQL
  $result = $dbcon->query($sql);

  //see if we matched any records
  $row_count = mysqli_num_rows($result);
  echo "row count: ", $row_count;
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1){
    //authenticated user, start new session
    session_start();
    //store user data in session variables
    $_SESSION['success'] = "Thanks for logging in";
    $_SESSION['username'] = $email;
    $_SESSION['email'] = $email;
    $_SESSION['userid'] = $row['idUSERS'];
    //send to main page
    header('location: index.php');
  }else{
    echo "issue with login";
    array_push($error_array, "Wrong username or password");
  }

  //troubleshooting, remove later
  echo '<pre>';
  var_dump($result);
  echo '</pre>';

} //end login user 'if'

//troubleshooting, remove later
echo '<pre>';
var_dump($_POST);
echo '</pre>';

echo '<pre>', "session: ";
var_dump($_SESSION);
echo '</pre>';




 ?>
