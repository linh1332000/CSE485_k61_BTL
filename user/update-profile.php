<?php include('../config/connect.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Profile</h1>

        <br><br>

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


        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td>User name: </td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>User_email: </td>
                    <td>
                        <input type="text" name="user_email" value="<?php echo $user_email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Picture: </td>
                    <td>
                        <input type="text" name="picture" value="<?php echo $picture; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Status: </td>
                    <td>
                        <input type="text" name="status" value="<?php echo $status; ?>">
                    </td>
                </tr>
                <tr>
                    <td>User Lv: </td>
                    <td>
                        <input type="text" name="user_lv" value="<?php echo $user_lv; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Id lop: </td>
                    <td>
                        <input type="text" name="id_lop" value="<?php echo $id_lop; ?>">
                    </td>
                </tr>
                <tr>
                    <td>User Pass: </td>
                    <td>
                        <input type="text" name="user_pass" value="<?php echo $user_pass; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Phone: </td>
                    <td>
                        <input type="text" name="user_sdt" value="<?php echo $user_sdt; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                        <input type="submit" name="submit" value="Update Profile" class="btn-secondary">
                    </td>
                </tr>

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