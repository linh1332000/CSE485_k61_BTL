<?php include('../config/connect.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('header.php'); ?>
    <title>Document</title>
</head>
<body>
    
    <main>
    <div class="container" style = "padding : 2%; width : 60%;">
        <div class="row">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="../images/sukien1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../images/sukien2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="../images/sukien3n.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

    <?php

        $sql1 = "SELECT * FROM sukien ";


        $res1 = mysqli_query($conn, $sql1);


        $count = mysqli_num_rows($res1);


       

        if ($count > 0) {

            while ($row = mysqli_fetch_assoc($res1)) {

                $sk_id = $row['sk_id'];
                $sk_name = $row['sk_name'];
                $sk_picture= $row['sk_picture'];
                $sk_des = $row['sk_des'];
                $sk_date = $row['sk_date'];
                $newDate = date("d-m-Y", strtotime($sk_date));
        ?>      
                <div class="col">
                    <div class="card shadow-sm " style = "border-radius: 10px;">
                    <img src="../images/<?php echo $sk_picture; ?>" style = "padding: 2%" alt="">
                    <div class="card-body">
                        <h5 class="card-text"><?php echo $sk_name; ?></h5>
                        <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="<?php echo SITEURL; ?>user/eventdes.php?sk_id=<?php echo $sk_id; ?>" class="link-dark" style="text-decoration: none;"> View </a></button>
                            
                        </div>
                        <small class="text-muted"><?php echo $newDate; ?></small>
                        </div>
                    </div>
                    </div>
                </div>

        <?php
            }
        } else {

            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
        }

        ?>
            </div>
        </div>
    </div>

    </main>
    <?php include('footer.php'); ?>
</body>
</html>