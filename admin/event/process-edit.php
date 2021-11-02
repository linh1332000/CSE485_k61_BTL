<?php
    $sk_name = $_POST['sk_name'];
    $sk_date = $_POST['sk_date'];
    $sk_des = $_POST['sk_des'];
    $sk_picture = $_POST['fileToUpload'];
    $id = $_POST['sk_id'];
    $id = str_replace('/[^0-9]/', '', $id);

    include '../../config/connect.php';
    // Bước 02:
    $sql = "UPDATE sukien SET sk_name ='$sk_name' , sk_date ='$sk_date', sk_des = '$sk_des',sk_picture ='$sk_picture' where sk_id='$id'";
    echo $sql;
    $result = mysqli_query($conn,$sql);
    // Bước 03:
    if($result > 0){
        header("Location:event.php");
    }else{
        echo "Lỗi!";
    }


    //Bước 04: Đóng kết nối
    mysqli_close($conn);


?>