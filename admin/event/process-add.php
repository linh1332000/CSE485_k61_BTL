<?php
    $sk_name = $_POST['sk_name'];
    $sk_date = $_POST['sk_date'];
    $sk_des = $_POST['sk_des'];

    include '../../config/connect.php';
    // Bước 02:
    $sql = "INSERT INTO sukien (sk_name,sk_date,sk_des) values ('$sk_name','$sk_date','$sk_des')";
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