<?php
     $user_name = $_POST['user_name'];
     $user_email = $_POST['user_email'];
     $DOB = $_POST['DOB'];
     $user_sdt = $_POST['user_sdt'];
     $user_lv = $_POST['user_lv'];
     $ten_Lop = $_POST['ten_Lop'];
     $ten_LienKhoa = $_POST['ten_LienKhoa'];
    $id = $_POST['user_id'];

    include '../../config/connect.php';
    // Bước 02:
    $sql = "UPDATE user SET user_name = '$user_name',user_email='$user_email',DOB ='$DOB', user_sdt='$user_sdt', user_lv='$user_lv', id_lop ='$ten_Lop',id_lienkhoa='$ten_LienKhoa' where id_user='$id'";
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