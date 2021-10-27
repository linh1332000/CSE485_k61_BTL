<?php include('./config/connect.php'); ?>
<?php
        // Dịch vụ bảo vệ:
        session_start(); //Công ty dịch vụ Bảo vệ

        if(isset($_POST['sbmGuiDi'])){
            $username = $_POST['txtEmail'];
            $password = $_POST['txtPass'];


            // Bước 02: Truy vấn thông tin
            $sql = "SELECT * FROM user WHERE user_email='$username' AND user_pass='$password'";
            $result = mysqli_query($conn,$sql);
          
            // Bước 03: Xác thực > Đăng nhập > Ở trên, trả về 1 bản ghi thôi
            if(mysqli_num_rows($result) > 0){
                // Bảo vệ cửa CHÍNH: kiểm tra xác thực
                $row=mysqli_fetch_array($result);
                if ($row['user_lv']==1){
                    $_SESSION['user_id']=$row['user_id'];
                    ?>
                    <script>
                        window.alert('Login Success, Welcome Admin!');
                        window.location.href='admin/';
                    </script>
                    <?php
                }
                else{
                    $_SESSION['user_id']=$row['user_id'];
                    ?>
                    <script>
                        window.alert('Login Success, Welcome User!');
                        window.location.href='user/';
                    </script>
                    <?php
                }
              
            }
            else{
                header("Location: index.php");
            }
        }
    ?>