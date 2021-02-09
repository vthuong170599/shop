<?php 
include 'controller/category.php';
  $cate = new category();
  if(isset($_GET['id'])){
      $data = $cate->getID($_GET['id']);
      // var_dump($data);
  }
  if(isset($_POST['submit'])){
      $cate->edit($_GET['id'],$_POST['name'],$_POST['status']);
  }
?>
<?php include 'component/header.php' ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
 <?php include 'component/sidebar.php' ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
       <div class="col-md-6">
       <form action="" method="POST" role="form">
           <legend>Thêm mới danh mục</legend>
       
           <div class="form-group">
               <label for="">Tên</label>
               <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>" placeholder="Input field">
           </div>
           
           <div class="radio">
               <label>
                   <input type="radio" name="status" id="input" value="1" <?php echo $data['status']==1?'checked':''?>>
                   Hiện
               </label>
               <label>
                   <input type="radio" name="status" id="input" value="0" <?php echo $data['status']==0?'checked':''?>>
                   Ẩn
               </label>
           </div>
           
       
           <button type="submit" name="submit" class="btn btn-primary">Submit</button>
       </form>
       </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>

 <?php include 'component/footer.php' ?>