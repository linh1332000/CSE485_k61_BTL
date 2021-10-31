<?php
   include '../header.php';
   include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
    $sql = "delete from user where id_user ='$id'";
    $result = mysqli_query($conn,$sql);
    if($result > 0){
        header("Location:user.php");
    }else{
        echo "Lỗi!";
    }
    mysqli_close($conn);

?>
