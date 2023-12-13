
<?php include "authentication.php"?>
<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>
<?php include "includes/sidebar.php"?>
<?php 

if(!isset($_SESSION['auth']))
{

  $_SESSION['status']= isset($_SESSION['auth']);
}

?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col-md-12">   
    <?php include('message.php')?>
          <div>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php include "includes/dashboardcontent.php"?>
  <!-- /.content-wrapper -->

<?php include "includes/footer.php"?>