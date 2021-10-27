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
        

        if(isset($_SESSION['no-user-found']))
        {
            echo $_SESSION['no-user-found'];
            unset($_SESSION['no-user-found']);
        }

        if(isset($_SESSION['update']))
        {
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
                    $id_user=$row['id_user'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $picture = $row['picture'];
                    $user_sdt=$row['user_sdt'];
                    $id_lop=$row['id_lop'];
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

                    <div class="tabs-wrapper profile-tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-activity" data-toggle="tab">Activity</a></li>
                            <li><a href="#tab-friends" data-toggle="tab">Friends</a></li>
                            <li><a href="#tab-chat" data-toggle="tab">Chat</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>
