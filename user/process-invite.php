<?php
    
    
    include('send.php');
    // Kiểm tra tính hợp lệ của dữ liệu trên FORM (Javascript)
    // Nhận dữ liệu từ FORM: coi như dữ liệu đã hợp lệ

    if(isset($_POST['sbmGuiDi'])){
     
        $email = $_POST['txtEmail'];
      
    }

    // Kiểm tra Email hoặc Username đã tồn tại chưa?
    //1. Kết nối tới Server
    $conn = mysqli_connect('localhost','root','','webbtl');
    if(!$conn){
        die("Không thể kết nối");
    }

    // 2. Truy vấn dữ liệu
    $sql = "SELECT * FROM user WHERE user_email='$email' ";
    $result = mysqli_query($conn,$sql);

    // 3. XỬ lý kết quả
    if(mysqli_num_rows($result) > 0){
        sendEmail($email);
    }else{
        echo'Email chưa tồn tại';
        
    }


?>