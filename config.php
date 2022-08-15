<?php
// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ebook";

// $conn = mysqli_connect("localhost","root"," ","e-book");
// if(!$conn){
//     die('Could not Connect My Sql:' .mysqli_error(die()));
//  }


?>
<?php
$host="localhost";
$username="root";
$password="";
$dbname="e-book";
$conn=mysqli_connect($host,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect My Sql:' .mysqli_error(die()));
}

?>