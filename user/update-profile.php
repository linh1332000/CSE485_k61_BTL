<?php include('../config/connect.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<div class="container bg-light text-dark">
    <div class="wrapper">
        <h2 class = " text-center"  style = "padding : 3%" ;>Update Profile</h2>
        <img src="../images/back.jfif" input type="button" style = "margin-left : 10%; width: 5%;" onclick="history.back(-1)" alt="">
        <?php
        session_start();
        
        $id_user = $_GET['id_user'];


        $sql = "SELECT * FROM user WHERE id_user=$id_user";

        $res = mysqli_query($conn, $sql);


        if ($res == true) {

            $count = mysqli_num_rows($res);

            if ($count == 1) {

                $row = mysqli_fetch_assoc($res);
                $user_name = $row['user_name'];
                $user_email = $row['user_email'];
                $current_image = $row['picture'];
                $status = $row['status'];
                $user_lv = $row['user_lv'];
                $id_lop = $row['id_lop'];
                $user_pass = $row['user_pass'];
                $user_sdt = $row['user_sdt'];
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
                    <input type="text" class="form-control" name="id_lop" value="<?php echo $id_lop; ?>">
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
                    <button type="submit" name="submit" value="Update Profile" class="btn btn-outline-success">Update</button>
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
    $status = $_POST['status'];
    $user_lv = $_POST['user_lv'];


    $id_lop = $_POST['id_lop'];
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
        status='$status',
        user_lv='$user_lv',
        id_lop='$id_lop' ,
        user_pass='$user_pass',
        user_sdt='$user_sdt'
        
        WHERE id_user='$id_user'
        ";

    $res = mysqli_query($conn, $sql);

    if ($res == true) {

        $_SESSION['update'] = "<div class='success'>Profile Updated Successfully.</div>";
        
       

        // header('location:' . SITEURL . 'src/manage-drug.php');
?>
        <script>
            window.location.href = 'index.php?id_user=<?php echo $id_user; ?>';
        </script>
    <?php
    } else {

        $_SESSION['update'] = "<div class='error'>Failed to Upadate Profile.</div>";

        // header('location:' . SITEURL . 'src/manage-drug.php');
    ?>
        <script>
            window.location.href = 'user/index.php?id_user=<?php echo $id_user; ?>';
        </script>
<?php
    }
}

?>
