<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ControleImpressao";

// Create connection

if(!($link = mysql_connect($servername, $username, $password))){
	echo "erro";
}else {
	echo "ok";
}
echo"<br>";
if(!($conn = mysql_select_db($dbname, $link))){
	echo "erro";
}else {
	echo "ok";
}
echo"<br>";

/*
$servername = "localhost";
$username = "root";
$password = "";
$dbname="ControleImpressao";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
*/

?>