<?php


include("authentication.php");
include("config/dbconn.php");








if(isset($_POST['addproduct']))
{

    $name=$_POST['name'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $filename=$_FILES['profile']['name'];
$allowed_extension=array('png','jpg','jpeg');

$file_extension=pathinfo($filename,PATHINFO_EXTENSION);
if(!in_array($file_extension,$allowed_extension))
{
    $_SESSION['status']="You are allowed with only jpg png jpeg";
    header("Location:product.php");
}


    $createdAt=date('Y-m-d H:i:s');
    if($name!=' ' && $status!=' '  && $description!=' '){
            $sql="insert into product (name,status,price,description,quantity,createdAt) values ('$name','$status','$price','$description','$quantity','$createdAt')";
            $queryRun=mysqli_query($conn,$sql);
        if($queryRun)
        {
            $_SESSION['status']="Product Added Successfully";
            header('Location:product.php');
        }
        else{
            $_SESSION['status']="Product Added Failed";
            header('Location:product.php');   
        }
    } else{
            $_SESSION['status']="Please fill input!!";
            header('Location:product.php');   
        }
}

if(isset($_POST['updateproduct']))
{
    $id=$_POST['product_id'];
    $name=$_POST['name'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];



    $sql="update product set name='$name',status='$status',price='$price',description='$description', quantity='$quantity' WHERE id='$id'";
    $query_run=mysqli_query($conn,$sql);

    if( mysqli_affected_rows($conn))
    {
        $_SESSION['status']="product Updated Successfully";
        header('Location:product.php');

    }else{
        $_SESSION['status']="product Upating Failed";
        header('Location:product.php');  
    }


}

if(isset($_POST['deleteproduct']))
{
    $product_id=$_POST['delete_id'];

$sql="delete From product where id=$product_id";
$query_run=mysqli_query($conn,$sql);
if($query_run)
{
    $_SESSION['status']="product Deleted Successfully";
    header('Location:product.php');

}else{
    $_SESSION['status']="product Deleting Failed";
    header('Location:product.php');  
}

}
?>