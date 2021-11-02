<?php
    include '../header.php';
    include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
    $sql = "delete from lien_khoa where id_lienkhoa ='$id'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    if($result > 0){
        header("Location:khoa.php");
    }else{
        header("Location:khoa.php");
    }
?>