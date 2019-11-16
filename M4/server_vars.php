<?php

//get ip address
$ip_address = $_SERVER['REMOTE_ADDR'];
$LOCAL = 0;

if($LOCAL) //running on my XAMPP server
{
  //XAMPP variables
  //Enviornment
  $target_dir = "uploads/";

  //SQL server
  $dbhost = 'localhost';  // Most likely will not need to be changed
  $dbname = 'mydb';   // Needs to be changed to your designated table database name
  $dbuser = 'root';   // Needs to be changed to reflect your LAMP server credentials
  $dbpass = ''; // Needs to be changed to reflect your LAMP server credentials

  $dbcon = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

}

else { //running on FAU LAMP

  //FAU Variables
  // Do not change the following two lines.
  $teamURL = dirname($_SERVER['PHP_SELF']) . DIRECTORY_SEPARATOR;
  $server_root = dirname($_SERVER['PHP_SELF']);
  //Enviornment
  $target_dir = "uploads/";
  //SQL Server
  $dbhost = 'localhost';  // Most likely will not need to be changed
  $dbname = 'cen4010fal19_g16';   // Needs to be changed to your designated table database name
  $dbuser = 'cen4010fal19_g16';   // Needs to be changed to reflect your LAMP server credentials
  $dbpass = 'xdHHpcC89q'; // Needs to be changed to reflect your LAMP server credentials

  $dbcon = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if($dbcon->connect_errno > 0) {
      die('Unable to connect to database [' . $db->connect_error . ']');
  }
}
