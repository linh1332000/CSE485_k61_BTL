<?php
    include '../header.php';
    include '../../config/connect.php';
    $id = $_GET['id'];
    settype($id,"int");
    $sql = "SELECT * from sukien where sk_id= '$id'";
    $result = mysqli_query($conn,$sql);

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
          <i class="fa fa-chalkboard	" aria-hidden="true"></i> Lớp
        </a>
      </li>
  </ul>
</div>
<div class="content-container">

  <div class="container-fluid">
  <script src="ckeditor/ckeditor.js"></script>
<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h2>Cập nhật bài viết</h2>
			</div>
		</div>
		<!-- /. ROW  -->
		<hr />

<form action="process-edit.php" method="post" enctype="multipart/form-data">
<?php 

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
?>
Tiêu đề:<br>
<input type="text" name="title" value="<?php echo $row['sk_name'] ?>" class="form-control"><br>

Ngày tổ chức:<br>
<input type="text" name="title" value="<?php echo $row['sk_date'] ?>" class="form-control"><br>

Nội dung:<br>
<textarea name="content" id="content" rows="25" cols="120"><?php echo $row['sk_des'] ?></textarea>
<script>
CKEDITOR.replace( 'content' );
</script>
<br>

Hình ảnh:<img src="../../img/<?php echo $row['sk_picture']?>" style="width: 10%;height: 5%;" alt="">

<br>
<?php 
    }
}
?>
</form>

<!-- /. ROW  -->
	</div>
	<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->

</div>
<?php
    include '../footer.php';
?>


