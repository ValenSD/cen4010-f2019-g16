
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
  var_dump($_POST);

  //get form values
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];


  //validate fields
  if (empty($firstname)) { array_push($error_array, "First Name is empty");}
  if (empty($lastname)) { array_push($error_array, "Last Name is empty");}
  if (empty($email)) { array_push($error_array, "email is empty");}
  if (empty($password1)) { array_push($error_array, "Password is empty");}
  if (empty($password2)) { array_push($error_array, "Confirm Password is empty");}
  if ($password1 != $password2)
  {
    array_push($error_array, "The passwords do not mach");
    session_destroy();
    //header('location:index.php');

  }
  //ecrypt Password
  $password_encr = md5($password1);

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
    `USERSTYPE` INT(10) NULL,
    `USERSupdatedAt` TIMESTAMP NULL ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`idUSERS`))
    ENGINE = InnoDB;");
    //try to create table
    if($stmnt->execute()){}else{echo "<br> user table create error";}

    //see if user email exists Already
    $sqlusercheck = "SELECT * FROM USERS WHERE USERS.USERSemail LIKE '$email'";
    //execute SQL
    $result = $dbcon->query($sqlusercheck);
    //see if we matched any records
    $row_count = mysqli_num_rows($result);
    //echo "row count: ", $row_count;
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1){
      array_push($error_array, "Sorry, that email already exists");
    }


    //insert user
    $timestamp = strftime("%Y%m%d%H%M%S");
    if (count($error_array) == 0){
      $stmnt = $dbcon->prepare("INSERT INTO `USERS` (`idUSERS` , `USERSfirstname` , `USERSlastname` , `USERSemail` , `USERSpassword` ,
        `USERSremember_token` , `USERScreatedAt` ,`USERSTYPE`, `USERSupdatedAt`)
        VALUES (NULL , '$firstname', '$lastname', '$email', '$password_encr', NULL , '$timestamp', 0, NULL)");
        if ($stmnt->execute()){} else {echo "Error description: " . mysqli_error($dbcon);}
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
  if (empty($username)) {
    array_push($error_array, "Username is required");
  }
  if (empty($password)) {
    array_push($error_array, "Password is required");
  }

  if (count($error_array) == 0){

    $password_encr = md5($password);

    //build sql to verify user
    $sql = "SELECT USERS.idUSERS, USERS.USERStype FROM USERS WHERE USERS.USERSemail LIKE '$email' AND USERS.USERSpassword = '$password_encr'";
    //execute SQL
    $result = $dbcon->query($sql);

    //see if we matched any records
    $row_count = mysqli_num_rows($result);
    //echo "row count: ", $row_count;
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1){
      //authenticated user, start new session
      session_start();
      //store user data in session variables
      $_SESSION['success'] = "Thanks for logging in";
      $_SESSION['username'] = $email;
      $_SESSION['email'] = $email;
      $_SESSION['userid'] = $row['idUSERS'];
      $_SESSION['userType'] = $row['USERStype'];
      //send to main page
      header('location: index.php');
    }else{
      array_push($error_array, "Wrong username or password");
    }
  }

} //end login user 'if'

//edit account

if (isset($_POST['update_user'])){
  //verify passwords match and are not empty
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];
  if (empty($password1)) { array_push($error_array, "Password is empty");}
  if (empty($password2)) { array_push($error_array, "Confirm Password is empty");}
  if ($password1 != $password2){
    array_push($error_array, "The passwords do not mach");
  }
  //if no errors, set user variables
  if (count($error_array) == 0){
    var_dump($_SESSION);
    $userid = $_SESSION['userid'];
    $username = $_POST["email"];
    $email = $_POST["email"];
    $password_encr = md5($password1);
    $_SESSION['username'] = $username;

    //sql to get user info
    $sql = "SELECT * FROM USERS WHERE idUSERS = $userid";
    //execute SQL
    $result = $dbcon->query($sql);
    //confirm database match
    if($result){}else{array_push($error_array, "could not locate user");}

    //update user record
    $row_count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1){
      $sql = "UPDATE USERS
      set USERS.USERSemail = '$email', USERS.USERSpassword = '$password_encr'
      WHERE idUSERS = $userid";
      if($result = $dbcon->query($sql)){
        //notify user of sucessful update
        array_push($error_array, "update sucessful");
        //update session variable with (possibly) new email
        $_SESSION['username'] == $email;
      }

    }else{
      //catch unknown issue
      array_push($error_array, "There was a problem. Please contact the administrator");
    }
  } //end array 0 if
} //end update user if
