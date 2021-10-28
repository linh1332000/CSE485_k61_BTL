<?php include('../config/connect.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
    <title>User Info</title>
</head>

<body>


    <div class="container bootstrap snippets bootdeys">
        <div class="row" id="user-profile">
            <?php
<<<<<<< HEAD
              
            if(!isset($_SESSION['loginOK'])){
                header("Location:/index.php");
            }
=======


>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2
            if (isset($_SESSION['no-user-found'])) {
                echo $_SESSION['no-user-found'];
                unset($_SESSION['no-user-found']);
            }

            if (isset($_SESSION['update'])) {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }



            ?>
            <?php

            if (isset($_GET['id_user'])) {

                $id_user = $_GET['id_user'];


                $sql = "SELECT * FROM user WHERE id_user = $id_user";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if ($count == 1) {

                    $row = mysqli_fetch_assoc($res);
                    $id_user = $row['id_user'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $picture = $row['picture'];
                    $user_sdt = $row['user_sdt'];
                    $id_lop = $row['id_lop'];
                } else {

                    header('location:' . SITEURL);
                }
            }

            ?>

            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="main-box clearfix">
                    <h2> <?php echo $user_name; ?> </h2>

                    <img src="<?php echo $picture; ?>" alt="" class="profile-img img-responsive center-block">
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
                        <a href="logout.php">Thoát</a>
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
                                    Id Class:
                                </div>
                                <div class="profile-user-details-value">
                                    <?php echo $id_lop; ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-4">
                                <div class="badge bg-primary text-wrap" style="width: 10rem; margin: 5% 20%; font-size: 20px;">
                                    Room
                                </div>
                                <?php
<<<<<<< HEAD
                               
                                $sql2 = "SELECT * FROM zoom ";

                              
                                $res2 = mysqli_query($conn, $sql2);

                             
=======
                                //Create a SQL Query to Get all the Food
                                $sql2 = "SELECT * FROM zoom ";

                                //Execute the qUery
                                $res2 = mysqli_query($conn, $sql2);

                                //Count Rows to check whether we have foods or not
>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2
                                $count = mysqli_num_rows($res2);


                                if ($count > 0) {
<<<<<<< HEAD
                                 
                                    while ($row = mysqli_fetch_assoc($res2)) {
                                     
=======
                                    //We have food in Database
                                    //Get the Foods from Database and Display
                                    while ($row = mysqli_fetch_assoc($res2)) {
                                        //get the values from individual columns
>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2
                                        $id_zoom = $row['id_zoom'];
                                        $name_z = $row['name_z'];
                                        $id_user = $row['id_user'];


                                ?>

                                        <ul class="list-group ">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <?php echo $name_z; ?>
                                                <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn btn-primary">Tham gia</a>
                                            </li>
                                        </ul>

                                <?php
                                    }
                                } else {
<<<<<<< HEAD
                                    
=======
                                    //Food not Added in Database
>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2
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
<<<<<<< HEAD
                                 
                                    $sql1 = "SELECT * FROM sukien ";

                                  
                                    $res1 = mysqli_query($conn, $sql1);

                                   
                                    $count = mysqli_num_rows($res1);

                                 
                                    $sn = 1;

                                    if ($count > 0) {
                                      
                                        while ($row = mysqli_fetch_assoc($res1)) {
                                         
=======
                                    //Create a SQL Query to Get all the Food
                                    $sql1 = "SELECT * FROM sukien ";

                                    //Execute the qUery
                                    $res1 = mysqli_query($conn, $sql1);

                                    //Count Rows to check whether we have foods or not
                                    $count = mysqli_num_rows($res1);

                                    //Create Serial Number VAriable and Set Default VAlue as 1
                                    $sn = 1;

                                    if ($count > 0) {
                                        //We have food in Database
                                        //Get the Foods from Database and Display
                                        while ($row = mysqli_fetch_assoc($res1)) {
                                            //get the values from individual columns
>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2
                                            $sk_id = $row['sk_id'];
                                            $sk_name = $row['sk_name'];
                                            $sk_date = $row['sk_date'];
                                    ?>

                                            <tr>
                                                <td><?php echo $sn++; ?>. </td>
                                                <td><?php echo $sk_name; ?></td>
                                                <td><?php echo $sk_date; ?></td>
                                                <td>
<<<<<<< HEAD
                                                    <a href="<?php echo SITEURL; ?>user/invite.php?sk_id=<?php echo $sk_id; ?>" class="btn btn-primary">Mời</a>
=======
                                                    <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn btn-primary">Mời</a>
>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2

                                                </td>
                                            </tr>

                                    <?php
                                        }
                                    } else {
<<<<<<< HEAD
                                      
=======
                                        //Food not Added in Database
>>>>>>> 699850d438d7afdc2a91158379b62c6d91af35f2
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


</body>

</html>