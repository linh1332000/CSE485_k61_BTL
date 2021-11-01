<?php
    $ten_LienKhoa = $_POST['ten_LienKhoa'];
    $id = $_POST['id_lienkhoa'];

    include '../../config/connect.php';
    // Bước 02:
    $sql = "UPDATE lien_khoa SET ten_lienkhoa ='$ten_LienKhoa' where id_lienkhoa='$id'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:khoa.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>