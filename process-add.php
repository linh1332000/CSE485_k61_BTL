<?php
     $ten_BoMon = $_POST['ten_BoMon'];
    include '../../config/connect.php';
    // Bước 02:
    $sql = "INSERT INTO bo_mon (ten_BoMon) values ('$ten_BoMon')";
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