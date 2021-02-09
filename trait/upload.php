<?php
    trait Upload{
        public function uploadImage($avatar){
            if (isset($avatar)) {
                $filename = $avatar['name'];
                move_uploaded_file($avatar['tmp_name'], 'public/upload/' . $filename);
            }
            return $filename;
        }
    }
?>
