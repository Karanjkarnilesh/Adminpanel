<?php include "authentication.php"?>
<?php 
include "includes/header.php";
include "includes/navbar.php";
 include "includes/sidebar.php";
 include "config/dbconn.php";
 include "config/encrypt.php"?>

<!-- delete user Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="categorycode.php" method="POST">
      <div class="modal-body">
          <input type="text" name="delete_id" class="form-control delete_category_id">
          <p style="color: brown;">
            Are you sure to delete Category!
                    </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="deleteuser" value="submit" class="btn btn-primary">Yes Delete.!</button>
      </div>
</form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="adminmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="categorycode.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Name">
</div>


<div class="form-group">
<label for="description">Description</label>
<textarea id="description" name="description" rows="4" cols="50">
</textarea>
</div>
<div class="form-group">
          <label>Trending</label>
          <input type="number" name="trending" placeholder="0 or 1" class="form-control" min="0" max="1">
</div>
<div class="form-group">
          <label>status</label>
          <input type="text" name="status" placeholder="Status" class="form-control">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addcategory" value="submit" class="btn btn-primary">Save</button>
      </div>
</form>
    </div>
  </div>
</div>




    <div class="card">

  <div class="card-body">
    <h3 class="card-title">Categorys</h3>
    <a href="#" data-bs-toggle="modal" data-bs-target="#adminmodal" class="btn btn-primary btn-sm float-right">Add Category</a>
  </div>
</div>

    <section class="content">
  <div class="row">
  <div class="col-md-12">
  <?php include('message.php')?>
  <?php 
  ?>
  <!-- /.card-header -->
  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Trending</th>
                    <th>status</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select * from category";
                    $query_run=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $key=>$row)
                      {?>
                        <tr>
                        <td><?php echo $key+1?></td>
                        <td><?php echo $row['name']?></td>
                        <td> <?php echo $row['trending']=="1"?"1":"0"?>        
                        </td>
                        <td><?php echo $row['status']?></td>
                        <td><?php echo $row['createdAt']?></td>
                        <td><a href="category_edit.php?category_id=<?php echo $row['id']?>" class="btn btn-warning btn-sm">Edit</a>
                        <button type="button" value="<?php echo $row['id']?>" class="btn btn-danger btn-sm deletebtn">Delete</button>
                      </td>
                      </tr>
                   <?php   }
                      
                    }else{?>

                      <tr>
                      <td>No result Found</td>  
                    </tr>
        
                   <?php }
                    
?>                  <tbody>
</table>
<div>
</div>
</div>
                    </section>










<?php 
include "includes/script.php"
?>

<script >
  $(document).ready(function(){
$('.deletebtn').click(function(e){
  e.preventDefault();
  var category_id=$(this).val();
 $('.delete_category_id').val(category_id);
 $('#deletemodal').modal('toggle');
})
  })
  </script>
<?php include "includes/footer.php"?>