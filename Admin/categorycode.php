<?php


include("authentication.php");
include("config/dbconn.php");








if(isset($_POST['addcategory']))
{

    $name=$_POST['name'];
    $status=$_POST['status'];
    $trending=$_POST['trending'];
    $description=$_POST['description'];
    $createdAt=date('Y-m-d H:i:s');
    if($name!=' ' && $status!=' ' && $trending!=' ' && $description!=' '){
            $sql="insert into category (name,status,trending,description,createdAt) values ('$name','$status','$trending','$description',$createdAt)";
            $queryRun=mysqli_query($conn,$sql);
        if($queryRun)
        {
            $_SESSION['status']="Category Added Successfully";
            header('Location:category.php');
        }
        else{
            $_SESSION['status']="user Added Failed";
            header('Location:category.php');   
        }
    } else{
        $_SESSION['status']="Please fill input!!";
        header('Location:category.php');   
    }
}

if(isset($_POST['updatecategory']))
{
    $id=$_POST['category_id'];
    $name=$_POST['name'];
    $trending=$_POST['trending'];
    $status=$_POST['status'];
    $description=$_POST['description'];


    $sql="update category set name='$name',status='$status',trending='$trending',description='$description' WHERE id='$id'";
    $query_run=mysqli_query($conn,$sql);

    if( mysqli_affected_rows($conn))
    {
        $_SESSION['status']="category Updated Successfully";
        header('Location:category.php');

    }else{
        $_SESSION['status']="category Upating Failed";
        header('Location:category.php');  
    }


}

if(isset($_POST['deleteuser']))
{
    $category_id=$_POST['delete_id'];

$sql="delete From category where id=$category_id";
$query_run=mysqli_query($conn,$sql);
if($query_run)
{
    $_SESSION['status']="Category Deleted Successfully";
    header('Location:category.php');

}else{
    $_SESSION['status']="Category Deleting Failed";
    header('Location:category.php');  
}


}
?>