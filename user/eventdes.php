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
                  <img src="<?php echo $sk_picture; ?>" class=" rounded mx-auto d-block " style = "width: 80% ;  padding :3%;"alt="...">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $sk_name; ?></h4>
                    <p class="card-text"><small class="text-muted"><?php echo $newDate; ?></small></p>
                    <p class="card-text"><?php echo $sk_des; ?></p>
                  </div>
                </div>
                <div class="col-12">
                    <button  onclick="history.back(-1)" class="btn btn-outline-success">Thoát</button>
                </div>
                </table>
            
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>