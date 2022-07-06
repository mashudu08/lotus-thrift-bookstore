<!-- ST10115884 Mashudu Luvhengo 
     ST10118368 Ledwaba David
The code is my own work unless stated otherwise as a comment at the point 
of usage -->
<?php 

$server = "localhost";
$username = "root";
$pswd = "";
$dbName = "lotus_thrift_bookstore";

$dbconnect = mysqli_connect($server, $username, $pswd, $dbName);

if($dbconnect === false){
    echo "Connection error: " . mysqli_connect_error($dbconnect);
}
else{
    echo " Connection successful";
}
?>