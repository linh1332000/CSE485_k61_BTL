<?php
    include '../header.php';
    include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
    $sql = "delete from bo_mon where id_bomon ='$id'";
    $result = mysqli_query($conn,$sql);
    if($result > 0){
        header("Location:bomon.php");
    }else{
        echo "Lỗi!";
    }
    mysqli_close($conn);

?>