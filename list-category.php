<?php 
include 'controller/category.php';
$cate = new category();
if(isset($_GET['id'])){
  $cate->getID($_GET['id']);
  $cate->delete($_GET['id']);
}
    $data = $cate->getCate();
?>
<?php
include 'component/header.php' ?>

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
       <table class="table table-hover">
           <thead>
               <tr>
                   <th>Tên</th>
                   <th>Trạng thái</th>
               </tr>
           </thead>
           <tbody>
           <?php foreach($data as $key => $value){?>
               <tr>
                   <td><?php echo $value['name'] ?></td>
                   <td><?php echo $value['status']==1?'hiện':'ẩn' ?></td>
                   <td>
                      <a href="edit-category.php?id=<?php echo $value['id'] ?>" class="btn btn-success">sửa</a>
                      <a href="list-category.php?id=<?php echo $value['id'] ?>" class="btn btn-danger" onclick="return confirm('bạn có muốn xóa')">xóa</a>
                   </td>
               </tr>
               <?php } ?>
           </tbody>
       </table>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  </div>

 <?php include 'component/footer.php' ?>