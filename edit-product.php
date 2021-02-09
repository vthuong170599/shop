<?php
// include 'controller/product.php';
include 'controller/product.php';
$pro = new product();
$cate = $pro->getCate();
if (isset($_GET['id'])) {
    $data = $pro->update($_GET['id']);
    $img_pro = $pro->getImg($_GET['id']);
}
if(isset($_POST['submit'])){
    $pro->edit($_GET['id'],$_POST['name'],$_FILES['avatar'],$_POST['cat_id'],$_POST['status'],$_POST['descr'],$_FILES['image']);
}
?>
<?php include 'component/header.php' ?>
<style>
    .img_pro{
        width: 100px;
    }
</style>
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
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Thêm mới danh mục</legend>

                    <div class="form-group">
                        <label for="">Tên</label>
                        <input type="text" class="form-control" name="name" placeholder="Input field" value="<?php echo $data['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh đại diện</label>
                        <input type="file" class="form-control" name="avatar" placeholder="Input field">
                        <img src="public/upload/<?php echo $data['avatar']  ?>" alt="" class="img_pro">
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh chi tiết</label>
                        <input type="file" class="form-control" name="image[]" multiple placeholder="Input field">
                        <?php foreach($img_pro as $value) {?>
                        <img src="public/upload/<?php echo $value['image']  ?>" alt="" class="img_pro">
                        <?php } ?>
                    </div>
                    <div class="form-group">
                        <select name="cat_id" id="input" class="form-control">
                            <?php foreach ($cate as $value) { ?>
                                <option value="<?php echo $value['id'] ?>" <?php echo ($data['cat_id']==$value['id']?'selected':'') ?>><?php echo $value['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" id="input" value="1" checked="checked">
                                Hiện
                            </label>
                            <label>
                                <input type="radio" name="status" id="input" value="0">
                                Ẩn
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="descr" id="input" class="form-control" rows="3"><?php echo $data['descr'] ?></textarea>
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