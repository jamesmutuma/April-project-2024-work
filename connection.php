<?php
$dbname="metromovers";
$dbuser="root";
$dbpassword="";
$dbhost="localhost";

$conn=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);

if(!$conn)
 {
    
    exit("Error! Connection not established!!");
}
?>

