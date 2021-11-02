<?php
     $ten_lop = $_POST['ten_lop'];

     $ten_LienKhoa = $_POST['ten_LienKhoa'];


    include '../../config/connect.php';
    // Bước 02:
    $sql = "INSERT INTO lop (ten_lop,id_lienkhoa) 
    values ('$ten_lop','$ten_LienKhoa')";
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