<?php include('../config/connect.php'); ?>
<?php
// Dịch vụ bảo vệ:
        session_start(); //Công ty dịch vụ Bảo vệ

        if(isset($_POST['sbmGuiDi'])){
            $username = $_POST['txtEmail'];
            $password = $_POST['txtPass'];
            // $password_hash = md5($password);

            $username = mysqli_real_escape_string($conn,$username);
            $password_1 = mysqli_real_escape_string($conn,$password);
   
            // Bước 02: Truy vấn thông tin
            $sql = "SELECT * FROM user WHERE user_email='$username' AND user_pass='$password_1' limit 0,1";
            $result = mysqli_query($conn,$sql);
          
            // Bước 03: Xác thực > Đăng nhập > Ở trên, trả về 1 bản ghi thôi
            if(mysqli_num_rows($result) > 0){
                // Bảo vệ cửa CHÍNH: kiểm tra xác thực
                $row=mysqli_fetch_array($result);
                $id_user=$row['id_user'];
                if ($row['user_lv']==1){
                    $_SESSION['id_user']=$row['id_user'];
                    $_SESSION['user_name']=$row['user_name'];
                    $_SESSION['id_lop']=$row['id_lop'];
                    $_SESSION['id_LienKhoa']=$row['id_LienKhoa'];
                    ?>
                    <script>
                        window.alert('Login Success, Welcome Admin!');
                        window.location.href='./trangchu.php';
                    </script>
                    
                    <?php

                }
                else{
                    ?>
                    <script>
                        window.location.href='index.php';
                    </script>
                    <?php
                }
              
            }
            else{
                header("Location: index.php");
            }
        }
    ?>
