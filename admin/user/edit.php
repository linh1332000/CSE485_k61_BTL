<?php
   include '../header.php';
   include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
?>
<style>
.sidebar-container {
    position: fixed;
    width: 220px;
    height: 100%;
    left: 0;
    overflow-x: hidden;
    overflow-y: auto;
    background: #1a1a1a;
    color: #fff;
}

.content-container {
    padding-top: 20px;
}

.sidebar-logo {
    padding: 10px 15px 10px 30px;
    font-size: 20px;
    background-color: #2574A9;
}

.sidebar-navigation {
    padding: 0;
    margin: 0;
    list-style-type: none;
    position: relative;
}

.sidebar-navigation li {
    background-color: transparent;
    position: relative;
    display: inline-block;
    width: 100%;
    line-height: 20px;
}

.sidebar-navigation li a {
    padding: 10px 15px 10px 30px;
    display: block;
    color: #fff;
}

.sidebar-navigation li .fa {
    margin-right: 10px;
}

.sidebar-navigation li a:active,
.sidebar-navigation li a:hover,
.sidebar-navigation li a:focus {
    text-decoration: none;
    outline: none;
}

.sidebar-navigation li::before {
    background-color: #2574A9;
    position: absolute;
    content: '';
    height: 100%;
    left: 0;
    top: 0;
    -webkit-transition: width 0.2s ease-in;
    transition: width 0.2s ease-in;
    width: 3px;
    z-index: -1;
}

.sidebar-navigation li:hover::before {
    width: 100%;
}

.sidebar-navigation .header {
    font-size: 12px;
    text-transform: uppercase;
    background-color: #151515;
    padding: 10px 15px 10px 30px;
}

.sidebar-navigation .header::before {
    background-color: transparent;
}

.content-container {
    padding-left: 220px;
}

</style>
<div class="sidebar-container">
    <div class="sidebar-logo">
        Học và Học
    </div>
    <ul class="sidebar-navigation">
        <li class="header">Navigation</li>
        <li>
            <a href="../trangchu.php">
                <i class="fa fa-home" aria-hidden="true"></i> Homepage
            </a>
        </li>
        <li>
            <a href="../user/user.php">
                <i class="fa fa-tachometer" aria-hidden="true"></i> User
            </a>
        </li>
        <li class="header">Another Menu</li>
        <li>
            <a href="../bomom/bomon.php">
                <i class="fa fa-users" aria-hidden="true"></i> Bộ Môn
            </a>
        </li>
        <li>
            <a href="../khoa/khoa.php">
                <i class="fa fa-cog" aria-hidden="true"></i> Khóa
            </a>
        </li>
        <li>
      <a href="../event/event.php">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Event
      </a>
    </li>
    <li>
        <a href="../lop/lop.php">
          <i class="fa fa-chalkboard" aria-hidden="true"></i> Lớp
        </a>
      </li>
  </ul>
</div>

<div class="content-container">

    <div class="container-fluid">
        <main class="container">
            <form action="process-edit.php" method="post">
                <?php
                    // Quy trình 4 bước
                    // Bước 01: Đã tạo sẵn, gọi lại thôi
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT user.*, lop.ten_lop, lien_khoa.ten_LienKhoa from ((user INNER JOIN lop on  user.id_lop = lop.id_Lop) INNER JOIN lien_khoa ON user.id_LienKhoa = lien_khoa.id_LienKhoa) where id_user='$id'";
                   
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                ?>
                <div class="form-group row">
                    <label for="empName" class="col-sm-2 col-form-label">ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?php echo $id?>"
                            readonly>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empName" class="col-sm-2 col-form-label">Tên:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_name" name="user_name"
                            value="<?php echo $row['user_name'] ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empPosition" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="user_email" name="user_email"
                            value="<?php echo $row['user_email'] ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empEmail" class="col-sm-2 col-form-label">Ngày sinh</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="DOB" name="DOB" value="<?php echo $row['DOB'] ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empMobile" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="user_sdt" name="user_sdt"
                            value="<?php echo $row['user_sdt'] ?>">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empMobile" class="col-sm-2 col-form-label">User_lv</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="user_lv" name="user_lv"
                            value="<?php echo $row['user_lv'] ?>">
                    </div>
                </div>
                <br>
                <?php
                        }
                    }
                ?>
                <br>
                <div class="form-group row">
                    <label for="empMobile" class="col-sm-2 col-form-label">Lớp</label>
                    <div class="col-sm-10">
                        <select name="ten_Lop" id="ten_Lop">
                            <!-- Lấy dữ liệu từ bảng Office -->
                            <?php
                            $sql = "SELECT * FROM lop";
                            $result = mysqli_query($conn,$sql);
    
                            
                            if(mysqli_num_rows($result)){
                                while($row=mysqli_fetch_assoc($result)){
                                   
                                   echo '<option value="'.$row['id_Lop'].'">'.$row['ten_Lop'].'</option>';
                                   
                                }
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empMobile" class="col-sm-2 col-form-label">Khóa</label>
                    <div class="col-sm-10">
                        <select name="ten_LienKhoa" id="ten_LienKhoa">
                            <!-- Lấy dữ liệu từ bảng Office -->
                            <?php
                            $sql = "SELECT * FROM lien_khoa";
                            $result = mysqli_query($conn,$sql);
    
                            
                            if(mysqli_num_rows($result)){
                                while($row=mysqli_fetch_assoc($result)){
                                   
                                   echo '<option value="'.$row['id_LienKhoa'].'">'.$row['ten_LienKhoa'].'</option>';
                                   
                                }
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="empMobile" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Lưu lại</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>
<?php
    include '../footer.php';
?>
