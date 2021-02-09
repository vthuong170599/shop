<?php
include 'connect.php';
include 'trait/upload.php';
class product extends Connect
{
    use Upload;
    public function getProduct()
    {
        $sql = "SELECT product.*,category.name as catName FROM product join category where product.cat_id=category.id";
        $data = $this->connect()->query($sql);

        // var_dump($data);
        return $data;
    }

    public function getCate()
    {
        $sql = "SELECT * FROM category";
        $data = $this->connect()->query($sql);
        return $data;
    }

    public function addProduct($name, $avatar, $cat_id, $descr, $status, $image)
    {
        $filename = $this->uploadImage($avatar);
        $sql = "INSERT INTO product(name,avatar,cat_id,descr,status) VALUES ('$name','$filename','$cat_id','$descr','$status')";
        $conn = mysqli_connect('localhost', 'root', '', 'shoope');
        $query = mysqli_query($conn, $sql);
        $id_pro =   mysqli_insert_id($conn);
        foreach ($image['name'] as $key => $value) {
            move_uploaded_file($image['tmp_name'][$key],'public/upload/'.$value);
            $sql = "INSERT INTO image_product(id_product,image) VALUES ('$id_pro','$value')";
            $this->connect()->query($sql);
        }
        if ($query) {
            header('location: list-product.php');
        }
    }

    public function update($id)
    {
        $sql = "SELECT * FROM product WHERE id='$id'";
        $query = $this->connect()->query($sql);
        // $data = array();
        $data = mysqli_fetch_assoc($query);
        return $data;
    }

    public function getImg($id)
    {
        $sql = "SELECT * FROM image_product WHERE id_product='$id'";
        $query = $this->connect()->query($sql);
        return $query;
    }

    public function edit($id, $name, $avatar, $cat_id, $status, $descr, $image)
    {
        $data = $this->update($id);
        $filename = $data['avatar'];
        if (!empty($avatar['name'])) {
            unlink('public/upload/' . $filename);
            $filename = $this->uploadImage($avatar);
        }
        $sql = "UPDATE product SET name='$name',avatar='$filename',cat_id='$cat_id',status='$status',descr='$descr' WHERE id='$id'";
        $query = $this->connect()->query($sql);
        $data_img = $this->getImg($id);;
        if(!empty($image['name'][0])){
            foreach($data_img as $value){
                unlink('public/upload/' . $value['image']);
                $delete_img = "DELETE FROM image_product WHERE id_product='$id'";
                $this->connect()->query($delete_img);
            }
            foreach ($image['name'] as $key => $value) {
                move_uploaded_file($image['tmp_name'][$key],'public/upload/'.$value);
                $sql = "INSERT INTO image_product(id_product,image) VALUES ('$id','$value')";
                $this->connect()->query($sql);
            }
        }
        if ($query) {
            header('location: list-product.php');
        }
    }

    public function delete($id){
        $delete_img = "DELETE FROM image_product WHERE id_product='$id'";
        $this->connect()->query($delete_img);
        $sql = "DELETE FROM product WHERE id='$id'";
        $query = $this->connect()->query($sql);
        if($query){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
