<?php 
    //Start Session
   


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/webbtl/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'webbtl');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die('Error: ' . mysqli_error($myConnection));; //Database Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die('Error: ' . mysqli_error($myConnection));; //SElecting Database


?>
