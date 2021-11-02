<?php
  


    if(isset($_POST['sbmRegister'])){
        $user  = $_POST['txtUser'];
        $email = $_POST['txtEmail'];
        $pass1 = $_POST['txtPass1'];
        $pass2 = $_POST['txtPass2'];
        $idLop = $_POST['idLop'];

    }

    // Kiểm tra Email hoặc Username đã tồn tại chưa?
    //1. Kết nối tới Server
    $conn = mysqli_connect('localhost','root','','webbtl');
    if(!$conn){
        die("Không thể kết nối");
    }

    // 2. Truy vấn dữ liệu
    $sql = "SELECT * FROM user WHERE user_email='$email' OR user_name='$user'";
    $result = mysqli_query($conn,$sql);

    // 3. XỬ lý kết quả
    if(mysqli_num_rows($result) > 0){
        echo 'Email hoặc Username đã tồn tại';
    }else{
        
        $sql_2 = "INSERT INTO user (user_name, user_email, user_pass,id_lop) VALUES ('$user','$email','$pass1','$idLop')";
        $result_2 = mysqli_query($conn,$sql_2);
        
        
        echo 'Đăng kí thành công';
    }


?>