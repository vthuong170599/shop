<?php
include 'connect.php'; 
    class category extends Connect{
       public function getCate(){
           $sql = "SELECT * FROM category";
           $data = $this->connect()->query($sql);
           return $data;
       }

       public function addCate($name,$status){
           $sql = "INSERT INTO category(name,status) VALUES ('$name','$status')";
           $data = $this->connect()->query($sql);
           if($data){
               header('location: list-category.php');
           }
       }

       public function getID($id){
            $sql = "SELECT * FROM category WHERE id = '$id'";
            $query = $this->connect()->query($sql);
            $data = mysqli_fetch_assoc($query);
            return $data;
       }

       public function edit($id,$name,$status){
           $sql = "UPDATE category SET name= '$name',status='$status' WHERE id = '$id'";
           $stmt = $this->connect()->query($sql);
           if($stmt){
               header('location: list-category.php');
           }
       }

       public function delete($id){
           $sql = "DELETE FROM category WHERE id = '$id'";
           $stmt = $this->connect()->query($sql);
           if($stmt){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
           }
       }
    }
?>