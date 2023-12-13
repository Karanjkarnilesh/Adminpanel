<?php 
$host="localhost";
$username="root";
$password="";
$database="adminpanel";

$conn=mysqli_connect("$host","$username","$password","$database");

if(!$conn)
{
    // header("Location:../error/dberror.php");
    die(mysqli_connect_error($conn));
}


?>