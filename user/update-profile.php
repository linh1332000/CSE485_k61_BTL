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

<body>
    <div class="container bg-light text-dark">
        <div class="wrapper">
            <h2 class = " text-center"  style = "padding : 3%" ;>Update Profile</h2>

            

            <?php

            $id_user = $_GET['id_user'];


            $sql = "SELECT * FROM user WHERE id_user=$id_user";

            $res = mysqli_query($conn, $sql);


            if ($res == true) {

                $count = mysqli_num_rows($res);

                if ($count == 1) {

                    $row = mysqli_fetch_assoc($res);
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $picture = $row['picture'];
                    $status = $row['status'];
                    $user_lv = $row['user_lv'];
                    $id_lop = $row['id_lop'];
                    $user_pass = $row['user_pass'];
                    $user_sdt = $row['user_sdt'];
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
                <div class="col-6">
                    <label for="inputCity" class="form-label">Password</label>
                    <input type="password" class="form-control" name="user_pass" value="<?php echo $user_pass; ?>">
                </div>
                <div class="col-6">
                    <label for="inputAddress2" class="form-label">Picture</label>
                    <input type="text" class="form-control" name="picture" value="<?php echo $picture; ?>">
                </div>
                <div class="col-12">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>
