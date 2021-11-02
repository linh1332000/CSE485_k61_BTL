<?php
    $ten_BoMon = $_POST['ten_BoMon'];
    $id = $_POST['id_bomon'];
    $id = str_replace('/[^0-9]/', '', $id);

    include '../../config/connect.php';
    // Bước 02:
    $sql = "UPDATE bo_mon SET ten_BoMon =' $ten_BoMon' where id_bomon='$id'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:bomon.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>