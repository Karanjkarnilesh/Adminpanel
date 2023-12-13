<?php
session_start();
if(!isset($_SESSION['auth']))
{
    header('Location:login.php');
}
else{
    if($_SESSION['auth']=='User')
    {
        header('Location:../index.php'); 
    }
}
?>

