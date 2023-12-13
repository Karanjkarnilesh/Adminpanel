<?php include "authentication.php"?>
<?php 
include "includes/header.php";
include "includes/navbar.php";
 include "includes/sidebar.php";
 include "config/dbconn.php";?>

    <div class="card">

<div class="card-body">
  <h3 class="card-title"> Edit Register User</h3>
  <a href="registered.php" class="btn btn-primary btn-sm float-right">Back</a>
</div>
</div>

              <section class="content">
  <div class="row">
  <div class="col-md-12">

 
  <!-- /.card-header -->
  <div class="card-body">
    <div class="row">
        <div class="col-md-6">
<?php 
if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
    $sql="select * from users where id=$user_id";
    $query_run=mysqli_query($conn,$sql);


if(mysqli_num_rows($query_run)>0)
{

foreach($query_run as $row)
{

    ?>

<?php include('message.php')?>
        <form action="code.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="user_id" value="<?php echo @$row['id']?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo @$row['name']?>" placeholder="Username">
</div>
<div class="form-group">
          <label>Email</label>
          <input type="email" name="email" placeholder="Email" value="<?php echo @$row['email']?>" class="form-control">
</div>
<div class="form-group">
          <label>Phone number</label>
          <input type="text" name="phone" placeholder="phone" value="<?php echo @$row['phone']?>" class="form-control">
</div>
<div class="form-group">
          <label>password</label>
          <input type="password" name="password" placeholder="password" value="<?php echo @$row['password']?>" class="form-control">
</div>

<div class="form-group">
          <label>Role</label>
          <select class="form-select" aria-label="Default select example" name="role" required>

  <option>--Select--</option>
  <option <?php echo $row['role']=="Admin"? "selected":" " ?> value="Admin">Admin</option>
  <option <?php echo $row['role']=="User"? "selected":" " ?> value="User">User</option>
</select>
</div>





      </div>
      <div class="modal-footer">
        <button type="submit" name="updateuser" value="submit" class="btn btn-info">Update</button>
      </div>
</form>
<?php } }
}
?>
</div>
</div>
</div>
</section>
<?php 
include "includes/script.php"
?>
<?php include "includes/footer.php"?>