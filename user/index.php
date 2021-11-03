<?php include('../config/connect.php'); ?>
<?php


session_start();
if (!isset($_SESSION['loginOK'])) {
    header("Location:/index.php");
} else {
    unset($_SESSION['loginOK']);
}


if (isset($_SESSION['no-user-found'])) {
    echo $_SESSION['no-user-found'];
    unset($_SESSION['no-user-found']);
}

if (isset($_SESSION['update'])) {
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
if (isset($_SESSION['upload'])) {
    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
?>
<!doctype html>
<html lang="en">

<body>
    <?php include('header.php'); ?>

    <div class="container bootstrap snippets bootdeys">
        <div class="row" id="user-profile">

            <?php

            if (isset($_GET['id_user'])) {

                $id_user = $_GET['id_user'];


                $sql = "SELECT user.*, lop.ten_lop, lien_khoa.ten_LienKhoa from ((user INNER JOIN lop on  user.id_lop = lop.id_Lop) INNER JOIN lien_khoa ON user.id_LienKhoa = lien_khoa.id_LienKhoa) where id_user = '$id_user'" ;

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if ($count == 1) {

                    $row = mysqli_fetch_assoc($res);
                    $id_user = $row['id_user'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $picture = $row['picture'];
                    $user_sdt = $row['user_sdt'];
                    $ten_lop = $row['ten_lop'];
                    $ten_LienKhoa=$row['ten_LienKhoa'];
                    $DOB =$row['DOB'];
                } else {

                    header('location:' . SITEURL);
                }
            }

            ?>

            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="main-box clearfix">
                    <h2> <?php echo $user_name; ?> </h2>

                    <img src="<?php echo SITEURL; ?>images/<?php echo $picture; ?>" width="100px" alt="" class="profile-img img-responsive center-block">
                    <div class="profile-label">
                        <span class="label label-danger">User</span>
                    </div>


                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-sm-8">
                <div class="main-box clearfix">
                    <div class="profile-header">
                        <h3><span>User info</span></h3>
                        <a href="<?php echo SITEURL; ?>user/update-profile.php?id_user=<?php echo $id_user; ?>" class="btn btn-primary edit-profile">
                            <i class="fa fa-pencil-square fa-lg"></i> Edit profile
                        </a>
                        <a href="logout.php" class="btn btn-primary float-end">Thoát</a>
                    </div>

                    <div class="row profile-user-info">
                        <div class="col-sm-8">
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Name:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $user_name; ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Email:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $user_email; ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Phone:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $user_sdt; ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Class:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $ten_lop; ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Niên Khóa:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $ten_LienKhoa; ?>
                                </div>
                            </div>
                            <div class="profile-user-details clearfix">
                                <div class="profile-user-details-label">
                                    Birthday:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $DOB; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container" style="padding: 0;">
                        <div class="row">
                            <div class="col-4">
                                <div class="badge bg-primary text-wrap" style="width: 10rem; margin: 5% 20%; font-size: 20px;">
                                    Room
                                </div>
                                <?php

                                $sql2 = "SELECT * FROM zoom ";


                                $res2 = mysqli_query($conn, $sql2);


                                $count = mysqli_num_rows($res2);


                                if ($count > 0) {

                                    while ($row = mysqli_fetch_assoc($res2)) {

                                        $id_zoom = $row['id_zoom'];
                                        $name_z = $row['name_z'];
                                        $id_user = $row['id_user'];


                                ?>

                                        <ul class="list-group ">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo $name_z; ?>
                                                <a href="" class="btn btn-primary">Tham gia</a>
                                            </li>
                                        </ul>

                                <?php
                                    }
                                } else {

                                    echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                                }

                                ?>
                            </div>
                            <div class="col">
                                <table class="table">
                                    <tr>
                                        <th scope="col">STT</th>
                                        <th scope="col">Tên sự kiện</th>
                                        <th scope="col">Ngày</th>
                                        <th scope="col">Action</th>
                                    </tr>

                                    <?php

                                    $sql1 = "SELECT * FROM sukien ";


                                    $res1 = mysqli_query($conn, $sql1);


                                    $count = mysqli_num_rows($res1);


                                    $sn = 1;

                                    if ($count > 0) {

                                        while ($row = mysqli_fetch_assoc($res1)) {

                                            $sk_id = $row['sk_id'];
                                            $sk_name = $row['sk_name'];
                                            $sk_date = $row['sk_date'];
                                    ?>

                                            <tr>
                                                <td><?php echo $sn++; ?>. </td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>user/eventdes.php?sk_id=<?php echo $sk_id; ?>" class="link-dark" style="text-decoration: none;"><?php echo $sk_name; ?> </a>

                                                </td>
                                                <td><?php echo $sk_date; ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>user/invite.php?sk_id=<?php echo $sk_id; ?>" class="btn btn-primary">Mời</a>

                                                </td>
                                            </tr>

                                    <?php
                                        }
                                    } else {

                                        echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
                                    }

                                    ?>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    
    
    <?php include('footer.php'); ?>

</body>

</html>