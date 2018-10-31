<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=dcr_info", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {

    }
?>
<?php
/*
Author: Javed Ur Rehman
Website: https://www.allphptricks.com/
*/


$con = mysqli_connect("localhost","root","","dcr_info");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
