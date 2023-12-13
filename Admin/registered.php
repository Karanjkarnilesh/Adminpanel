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
      <form action="code.php" method="POST">
      <div class="modal-body">
          <input type="text" name="delete_id" class="form-control delete_user_id">
          <p style="color: brown;">
            Are you sure to delete User!
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
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Username">
</div>
<div class="form-group">
          <label>Email</label>
          <span class="email_error text-danger ml-2"></span>
          <input type="email" name="email" placeholder="Email" class="form-control email_id">
</div>
<div class="form-group">
          <label>Phone number</label>
          <input type="text" name="phone" placeholder="phone" class="form-control">
</div>
<div class="row">
  <div class="col-md-6">
  <div class="form-group">
          <label>password</label>
          <input type="password" name="password" placeholder="password" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
          <label>Confirm Password</label>
          <input type="password" name="confirm_password" placeholder="Confirm password" class="form-control">
</div>
</div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="adduser" value="submit" class="btn btn-primary">Save</button>
      </div>
</form>
    </div>
  </div>
</div>




    <div class="card">

  <div class="card-body">
    <h3 class="card-title">Register User</h3>
    <a href="#" data-bs-toggle="modal" data-bs-target="#adminmodal" class="btn btn-primary btn-sm float-right">Add User</a>
  </div>
</div>

    <section class="content">
  <div class="row">
  <div class="col-md-12">

  <?php include('message.php')?>
  <!-- /.card-header -->
  <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Role</th>
                    <th>CreatedAt</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql="select * from users";
                    $query_run=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($query_run)>0)
                    {
                      foreach($query_run as $key=>$row)
                      {?>
                        <tr>
                        <td><?php echo $key+1?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['role']?></td>
                        <td><?php echo $row['createdAt']?></td>
                        <td><a href="register_edit.php?user_id=<?php echo $row['id']?>" class="btn btn-warning btn-sm">Edit</a>
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

<script>
    $(document).ready(function(){
      $('.email_id').keyup(function (e) { 
        var email_check=$('.email_id').val();

    
  $.ajax({
    type: "POST",
    url: "code.php",
    data: {
      'email_verified':email_check,
      'email':email_check
    },
    success: function (response) {
      if(response){
      $('.email_error').text(response);
      }
    }
  })
})
})
  </script>
<script >
  $(document).ready(function(){
$('.deletebtn').click(function(e){
  e.preventDefault();
  var user_id=$(this).val();
 $('.delete_user_id').val(user_id);
 $('#deletemodal').modal('toggle');
})
  })
  </script>
<?php include "includes/footer.php"?>