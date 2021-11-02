<?php
    include '../header.php';
    include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
    $id = str_replace('/[^0-9]/', '', $id);
    $sql = "delete from sukien where sk_id ='$id'";
    $result = mysqli_query($conn,$sql);
    if($result > 0){
        header("Location:event.php");
    }else{
        echo "Lỗi!";
    }
    mysqli_close($conn);

?>