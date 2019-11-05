<?php
require_once './server_vars.php';
//$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_FILES['upload'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
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
//insert the filename and id into DATABASE
//$dbcon = mysqli_connect('localhost', 'root', '', 'mydb');
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//build sql insert statment
$stmt = $dbcon->prepare("INSERT INTO TESTTABLE (postnum , dateposted, subject, filename) VALUES (?,?,?,?)");
//define form-provided variables
$dateposted = $_POST["dateposted"];
$subject = $_POST["subject"];
//echo "$dateposted, <br> $subject";
//prevent SQL injection with bound params
$stmt->bind_param("ssss", $Postnumber, $dateposted, $subject, $Newfilename);


if($stmt->execute())
{
    //echo $Newfilename ;
    echo " <br/>Ticket number $Postnumber recorded! <br> <br>";

}
else
{
    echo "<br> error ";
}






//display image to user
echo "<br><img src=' ". $target_dir . "/" . $Newfilename . " ' height='200' width='200'>";






//troubleshooting
echo "<br>target dir: $target_dir <br> target file: $target_file";
echo '<pre>';
var_dump($_FILES['fileToUpload']);
echo '</pre>';
echo "IP ADDRESS: $ip_address<br>";
echo "date: ". $_POST['dateposted'] ." ";
//echo "subject: $_POST['subject']";
//echo $_SERVER["HTTP_FORWARDED_FOR"];



?>
