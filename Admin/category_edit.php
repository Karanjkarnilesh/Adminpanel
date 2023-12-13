<?php include "authentication.php"?>
<?php 
include "includes/header.php";
include "includes/navbar.php";
 include "includes/sidebar.php";
 include "config/dbconn.php";?>

    <div class="card">

<div class="card-body">
  <h3 class="card-title"> Edit Category</h3>
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
if(isset($_GET['category_id']))
{

    $category_id=$_GET['category_id'];
    $sql="select * from category where id='$category_id'";
    $query_run=mysqli_query($conn,$sql);


if(mysqli_num_rows($query_run)>0)
{

foreach($query_run as $row)
{

    ?>
<?php include('message.php')?>
        <form action="categorycode.php" method="POST">
      <div class="modal-body">
        <input type="hidden" name="category_id" value="<?php echo @$row['id']?>">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="<?php echo @$row['name']?>" placeholder="Name">
</div>


<div class="form-group">
<p><label>Description</label></p>
<textarea id="description" name="description" rows="4" cols="75">
<?php echo $row['description'] ?>
</textarea>
</div>


<div class="form-group">
          <label>Trending</label>
          <select class="form-select" aria-label="Default select example" name="trending" required>
  <option <?php echo $row['trending']=="0"? "selected":" " ?> value="0">0</option>
  <option <?php echo $row['trending']=="1"? "selected":" " ?> value="1">1</option>
</select>
</div>


<div class="form-group">
          <label>Status</label>
          <select class="form-select" aria-label="Default select example" name="status" required>
  <option <?php echo $row['status']=="Active"? "selected":" " ?> value="Active">Active</option>
  <option <?php echo $row['status']=="inActive"? "selected":" " ?> value="InActive">InActive</option>
</select>
</div>



      </div>
      <div class="modal-footer">
        <button type="submit" name="updatecategory" value="submit" class="btn btn-info">Update</button>
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