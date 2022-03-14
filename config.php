<?php
session_start();
$host = "localhost:3306"; /* Host name */
$user = "root"; /* User */
$password = "1234"; /* Password */
$dbname = "logbook"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>