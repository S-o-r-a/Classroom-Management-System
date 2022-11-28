<?php
session_start();
require('../Components/Database.php');

if(isset($_SESSION['user'])){
    if($_SESSION['role']=='admin'){
        header('Location: \Classroom-Management-System\admin\dashboard.php');
        die;
      }
      else if($_SESSION['role']=='student'){
        header('Location: \Classroom-Management-System\student\dashboard.php');
        die;
      }
      else if($_SESSION['role']=='instructor'){
    
      }


}else {
    header("location: ../login.php");
}

$user       =   $_SESSION['user'];
$school_id  =   $_SESSION['school_id'];
$first_name =   $_SESSION['first_name'];
$last_name  =   $_SESSION['last_name'];
$role       =   $_SESSION['role'];
require('../Components/upload.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"/>
    <script src="https://kit.fontawesome.com/e630d1fe84.js" crossorigin="anonymous"></script>
    <script src="jquery.bootstrap-growl.min.js" crossorigin="anonymous"></script>
    
    <!-- local bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <script src="../js/bootstrap.min.js"></script>

    <!-- custom/vanilla css -->
    <link rel="stylesheet" href="../main-css/userManage.css"/>
    <link rel="stylesheet" href="../main-css/aboutUs.css"/>
    <link rel="stylesheet" href="../main-css/main.css"/>
    
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
    rel="stylesheet"
    />

</head>
<?php
require('NavigationBar.php');
?>