<?php 
include "includes/header.php";
if(isset($_SESSION['auth']))
{
    header('Location:index.php');
}

?>

<div class="section">
<div class="container">

<div class="row justify-content-center">

<div class="col-md-5 my-5">
    <?php include('message.php')?>
<div class="card my-5">

<div class="card-header bg-light">

<h5>Login Form</h5>

</div>

<div class="card-body">

<form action="logincode.php" method="POST">
<div class="form-group">
    <label for="email"></label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Email ID">
</div>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
</div>
<hr>
<div class="form-group">
    <button type="submit" name="loginbtn" class="btn btn-primary btn-block">Login</button>
</div>
</form>


</div>



</div>



</div>


</div>


</div>








<?php 
include "includes/script.php"
?>
<?php include "includes/footer.php"?>