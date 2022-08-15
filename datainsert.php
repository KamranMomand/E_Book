<?php
include "config.php";
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['Pssword'];
$userid=$_POST['userid'];


$mysql="INSERT INTO user_detail(`user_name`,`user_email`,`user_password`) VALUES ('$name','$email','$password')";
$result=$conn->query($mysql);
if($result){
header("Location:index.php");
}
else{
    echo"Something Went Wrong";
}
?>