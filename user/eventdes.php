<?php include('../config/connect.php'); ?>
<!doctype html>
<html lang="en">

<head>
   <?php include('header.php'); ?>
    <title>Chi tiết sự kiện</title>
</head>

<body>
    <div class="container bg-light text-dark">
        <div class="wrapper">
            <h2 class = " text-center"  style = "padding : 3%" ;>Thông tin chi tiết sự kiện</h2>

            <?php
            

            $sk_id = $_GET['sk_id'];


            $sql = "SELECT * FROM sukien WHERE sk_id=$sk_id";

            $res = mysqli_query($conn, $sql);

            

            if ($res == true) {

                $count = mysqli_num_rows($res);

                if ($count == 1) {

                    $row = mysqli_fetch_assoc($res);
                    $sk_name = $row['sk_name'];
                    
                    $sk_picture = $row['sk_picture'];
                    $sk_des = $row['sk_des'];
                    $sk_date = $row['sk_date'];
                    $newDate = date("d-m-Y", strtotime($sk_date));
                } else {

                    // header('location:' . SITEURL . 'src/manage-drug.php');
            ?>
                    <script>
                        window.location.href = 'index.php?sk_id=<?php echo $sk_id; ?>';
                    </script>
            <?php
                }
            }

            ?>

                <div class="card mb-3">
                  <img src="../images/<?php echo $sk_picture; ?>" class=" rounded mx-auto d-block " style = "width: 80% ;  padding :3%;"alt="...">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $sk_name; ?></h4>
                    <p class="card-text"><small class="text-muted"><?php echo $newDate; ?></small></p>
                    <p class="card-text"><?php echo $sk_des; ?></p>
                  </div>
                </div>
                <div class="col-12">
                    <button  onclick="history.back(-1)" class="btn btn-outline-success"style = "border: 1px;">Thoát</button>
                </div>
                </table>
            
        </div>
    </div>

    <?php include('footer.php'); ?>
</body>

</html>