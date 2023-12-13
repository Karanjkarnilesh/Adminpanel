<?php
include('config/dbconn.php');
include ("authentication.php");
?>
<?php
if(isset($_POST['loginbtn']))
{
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * FROM users where email='$email' AND password='$password'";
$query_run=mysqli_query($conn,$sql);

if(mysqli_num_rows($query_run)>0)
{
    foreach($query_run as $row)
    {
        $user_id=$row['id'];
        $name=$row['name'];
        $phone=$row['phone'];
        $email=$row['email'];
        $role_as=$row['role'];
    }
    $_SESSION['auth']=$role_as;
    $_SESSION['auth_user']=[
        "id"=>$user_id,
        "name"=>$name,
        "phone"=>$phone,
        "email"=>$email,
    ];
    $_SESSION['status']="Login user Successfully!";
    header('Location:index.php');
}else{
    $_SESSION['status']="email or password incorrect..!";
    header('Location:login.php');
}
}else{
    $_SESSION['status']="Access Denied ..!";
    header('Location:login.php');
}



?>