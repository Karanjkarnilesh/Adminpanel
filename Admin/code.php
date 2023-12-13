<?php
include("config/dbconn.php");
include("authentication.php");
if(isset($_POST['email_verified']))
{
    $email=$_POST['email'];
    $check_mail="select email from users where email='$email'";
    $check_mail_run=mysqli_query($conn,$check_mail);
    if(mysqli_num_rows($check_mail_run)>0)
    {
        echo "Email is already Present !!!";
    }
    else{
      //  echo "It's Avalibale";
    }

}

if(isset($_POST['logout_btn']))
{
session_destroy();
unset($_SESSION['auth']);
unset($_SESSION['auth_user']);
header('Location:login.php');
}

if(isset($_POST['adduser']))
{


    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $conf_password=$_POST['confirm_password'];
    $createdAt=date('Y-m-d H:i:s');

    if($password==$conf_password){

        $check_mail="select email from users where email='$email'";
        $check_mail_run=mysqli_query($conn,$check_mail);
        if(mysqli_num_rows($check_mail_run)>0)
        {
            $_SESSION['status']="Email Already exists!!";
            header('Location:Registered.php');  
            exit;
        }else{
            $sql="insert into users (name,email,phone,password,createdAt) values ('$name','$email','$phone','$password','$createdAt')";
            $queryRun=mysqli_query($conn,$sql);
        if($queryRun)
        {
            $_SESSION['status']="user Added Successfully";
            header('Location:Registered.php');
        }
        else{
            $_SESSION['status']="user Added Failed";
            header('Location:Registered.php');   
        }
        }
      
    }else{
        $_SESSION['status']="Password or Confirm Pasword does not match !!";
        header('Location:Registered.php'); 
    }


}

if(isset($_POST['updateuser']))
{
    $id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    $sql="update Users set name='$name',email='$email',phone='$phone',password='$password',role='$role' WHERE id='$id'";
    $query_run=mysqli_query($conn,$sql);

    if( mysqli_affected_rows($conn))
    {
        $_SESSION['status']="user Updated Successfully";
        header('Location:Registered.php');

    }else{
        $_SESSION['status']="user Upating Failed";
        header('Location:Registered.php');  
    }


}

if(isset($_POST['deleteuser']))
{
    $user_id=$_POST['delete_id'];
    echo $user_id;

$sql="delete From Users where id=$user_id";
$query_run=mysqli_query($conn,$sql);
if($query_run)
{
    $_SESSION['status']="user Deleted Successfully";
    header('Location:Registered.php');

}else{
    $_SESSION['status']="user Deleting Failed";
    header('Location:Registered.php');  
}


}
?>
