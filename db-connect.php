<?php 

$server = "localhost";
$username = "root";
$pswd = "";
$dbName = "lotus_thrift_bookstore";

$dbconnect = mysqli_connect($server, $username, $pswd, $dbName);

// if($dbconnect === false){
//     echo "Connection error: " . mysqli_connect_error($dbconnect);
// }
// else{
//     echo " Connection successful";
// }

// mysqli_close($dbconnect);
// $dbconnect = false;

?>