<?php 
    session_start();
    if(!isset($_SESSION['id_user'])){
        header("Location:index.php");
    }
    else {
        if(isset($_POST['btnThoat'])){
            unset( $_SESSION["id_user"]);
            unset( $_SESSION["user_name"]);
            unset( $_SESSION["id_lop"]);
            unset( $_SESSION["id_LienKhoa"]);
            header("Location:http://localhost/webbtl/admin/index.php");
    }
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Navbar Example</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   </head>
   <body>
      <!-- A horizontal navbar that becomes vertical on small screens -->
      <ul class="nav justify-content-end">
   <li class="nav-item">
      <a class="nav-link" href="#"><?php echo $_SESSION['user_name'] ?></a>
   </li>


   </li>
   <form action="" method="post">
<button type="submit" class="btn login_btn" name="btnThoat">Thoát</button>
</form> 
</ul>

      </nav>


      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </body>
</html>

