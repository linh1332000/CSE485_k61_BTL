<?php

    $ten_Lop = $_POST['ten_Lop'];
    $id = $_POST['id_lop'];

    include '../../config/connect.php';
    // Bước 02:
    $sql = "UPDATE lop SET ten_lop='$ten_Lop' where id_lop='$id'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:lop.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>