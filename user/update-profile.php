<?php include('../config/connect.php'); ?>
<?php 
    
?>
<!doctype html>
<html lang="en">
<?php include('header.php'); ?>
<head>
    <title>Hello, world!</title>
</head>

<div class="container bg-light text-dark">
    <div class="wrapper">
        <h2 class = " text-center"  style = "padding : 3%" ;>Update Profile</h2>
        <img src="../images/back.png" input type="button" style = "margin-left : 10%; width: 5%;" onclick="history.back(-1)" alt="">
        <?php
        session_start();
        
        $id_user = $_GET['id_user'];


        $sql = "SELECT user.*, lop.ten_lop, lien_khoa.ten_LienKhoa from ((user INNER JOIN lop on  user.id_lop = lop.id_Lop) INNER JOIN lien_khoa ON user.id_LienKhoa = lien_khoa.id_LienKhoa) where id_user = '$id_user'" ;


        $res = mysqli_query($conn, $sql);


        if ($res == true) {

            $count = mysqli_num_rows($res);

            if ($count == 1) {

                $row = mysqli_fetch_assoc($res);
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $current_image = $row['picture'];
                $user_lv = $row['user_lv'];
                $user_pass = $row['user_pass'];
                $user_sdt = $row['user_sdt'];
                $ten_lop = $row['ten_lop'];
                $ten_LienKhoa=$row['ten_LienKhoa'];
                $DOB =$row['DOB'];
                $_SESSION['loginOK'] = $user_email;
            } else {

                // header('location:' . SITEURL . 'src/manage-drug.php');
        ?>
                <script>
                    window.location.href = 'index.php?id_user=<?php echo $id_user; ?>';
                </script>
        <?php
            }
        }

        ?>

        <form class="row g-3 " style= "padding: 2% 10%;" method="POST">

                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $user_name; ?>">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Ngày sinh</label>
                    <input type="text" class="form-control" name="DOB" value="<?php echo $DOB; ?>">
                </div>
                <div class="col-md-6">
            
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                </div>
                <div class="col-6">
                    <label for="inputAddress" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="user_sdt" value="<?php echo $user_sdt; ?>">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Class</label>
                    <select name="ten_Lop" id="ten_Lop">
                        <!-- Lấy dữ liệu từ bảng Office -->
                        <?php
                        $sql = "SELECT * FROM lop";
                        $result = mysqli_query($conn,$sql);

                        
                        if(mysqli_num_rows($result)){
                            while($row=mysqli_fetch_assoc($result)){
                                
                                echo '<option value="'.$row['id_Lop'].'">'.$row['ten_Lop'].'</option>';
                                
                            }
                        }
                    ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Class</label>
                    <select name="ten_LienKhoa" id="ten_LienKhoa">
                        <!-- Lấy dữ liệu từ bảng Office -->
                        <?php
                        $sql = "SELECT * FROM lien_khoa";
                        $result = mysqli_query($conn,$sql);

                        
                        if(mysqli_num_rows($result)){
                            while($row=mysqli_fetch_assoc($result)){
                                
                                echo '<option value="'.$row['id_LienKhoa'].'">'.$row['ten_LienKhoa'].'</option>';
                                
                            }
                        }
                    ?>
                    </select>
                </div>
                
              
                
                
                <div class="col-12">
                    <label for="inputCity" class="form-label">Password</label>
                    <input type="password" class="form-control" name="user_pass" value="<?php echo $user_pass; ?>">
                </div>
                
                <tr>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                //Display the Image
                                ?>
                                <img src="<?php echo SITEURL; ?>images/<?php echo $current_image; ?>" style = "width : 25%;">
                                <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>
                <div class="mb-3">
                    <input type="file" name="picture">
                </div>
                <div class="col-12">
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>"> 
                    <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                    <button type="submit" name="submit" value="Update Profile" class="btn btn-outline-success" style = "border: 1px;">Update</button>
                </div>
                </table>
            </form>
    </div>
</div>

<?php


if (isset($_POST['submit'])) {

    $id_user = $_POST['id_user'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $picture = $_POST['picture'];
    $DOB =$_POST['DOB'];
    $ten_Lop = $_POST['ten_Lop'];
    $ten_LienKhoa = $_POST['ten_LienKhoa'];
    $user_pass = $_POST['user_pass'];
    $user_sdt = $_POST['user_sdt'];
    if(isset($_FILES['picture']['name']))
    {
        //Get the Image Details
        $picture_name = $_FILES['picture']['name'];

        //Check whether the picture is available or not
        if($picture_name != "")
        {
            //Image Available

            //A. UPload the New Image

            //Auto Rename our Image
            //Get the Extension of our picture (jpg, png, gif, etc) e.g. "specialfood1.jpg"
            $ext = end(explode('.', $picture_name));

            //Rename the Image
            $picture_name = "User_Picture_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
            

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/".$picture_name;

            //Finally Upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);

            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect with error message
            if($upload==false)
            {
                //SEt message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                //Redirect to Add CAtegory Page
                header('location:'.SITEURL.'user/index.php');
                //STop the Process
                die();
            }

            //B. Remove the Current Image if available
            if($picture!="")
            {
                $remove_path = "../images/".$picture;

                $remove = unlink($remove_path);

                //CHeck whether the image is removed or not
                //If failed to remove then display message and stop the processs
                if($remove==false)
                {
                    //Failed to remove image
                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                    die();//Stop the Process
                }
            }
            

        }
        else
        {
            $picture_name = $picture;
        }
    }
    else
    {
        $picture_name = $picture;
    }


    //Create a SQL Query to Update Admin
    $sql = "UPDATE user SET
        user_name='$user_name',
        user_email='$user_email',
        picture='$picture',
        id_Lop= '$ten_Lop',
        
        user_pass='$user_pass',
        user_sdt='$user_sdt',
        id_LienKhoa= '$ten_LienKhoa',
        DOB = ' $DOB'
        
        
        WHERE id_user='$id_user'
        ";
        echo $sql;
    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['update'] = "<div class='success'>Profile Updated Successfully.</div>";
        
       

        header('location:' . SITEURL . 'src/manage-drug.php');
?>
        <script>
            window.location.href = 'index.php?id_user=<?php echo $id_user; ?>';
        </script>
    <?php
    } else {

        $_SESSION['update'] = "<div class='error'>Failed to Upadate Profile.</div>";

        header('location:' . SITEURL . 'src/manage-drug.php');
    ?>
        <script>
            window.location.href = 'index.php?id_user=<?php echo $id_user; ?>';
        </script>
<?php
    }
}

?>

<?php include('footer.php'); ?>