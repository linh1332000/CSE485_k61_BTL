<?php
   include '../header.php';
   include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
    $id = str_replace('/[^0-9]/', '', $id);
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
                    $sql = "SELECT * from bo_mon where id_bomon='$id'";
                   
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                ?>
                <div class="form-group row">
                    <label for="empName" class="col-sm-2 col-form-label">ID:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_bomon" name="id_bomon" value="<?php echo $id?>"
                            readonly>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="empName" class="col-sm-2 col-form-label">Tên bộ môn:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="ten_BoMon" name="ten_BoMon"
                            value="<?php echo $row['ten_BoMon'] ?>">
                    </div>
                </div>
                <br>
                <?php
                        }
                    }
                ?>
               
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
