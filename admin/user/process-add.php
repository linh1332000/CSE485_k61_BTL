<?php
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $DOB = $_POST['DOB'];
     $user_sdt = $_POST['user_sdt'];
     $user_lv = $_POST['user_lv'];
     $ten_Lop = $_POST['ten_Lop'];
     $ten_LienKhoa = $_POST['ten_LienKhoa'];
     $status = $_POST['status'];

    include '../../config/connect.php';
    // Bước 02:
    $sql = "INSERT INTO user (user_name,user_email,DOB,user_sdt,user_lv,id_lop,id_lienkhoa,status) 
    values ('$user_name','$user_email',' $DOB ','$user_sdt','$user_lv ','$ten_Lop',' $ten_LienKhoa',' $status')";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:user.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>