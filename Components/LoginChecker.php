<?php
  if (isset($_POST['submit'])) {
    $school_id = $_POST['schoolID'];
    $password = $_POST['password'];

    $res = $con->query("SELECT password FROM users WHERE school_id='$school_id'");
    $row = $res->fetch_assoc();
    $DBhashedPassword = $row['password'] ?? null;

    if (password_verify($password, $DBhashedPassword)) {
      // login success!
      $res = $con->query("SELECT * FROM users WHERE school_id='$school_id'");
      $row = $res->fetch_assoc();
      $_SESSION['user'] = 1;
      $_SESSION['school_id'] = $row['school_id'];
      $_SESSION['first_name'] = $row['first_name'];
      $_SESSION['last_name'] = $row['last_name'];
      $_SESSION['age'] = $row['age'];
      $_SESSION['address'] = $row['address'];
      $_SESSION['role'] = $row['role'];

      if($row['role']=='admin'){
        header("Location: ./admin/dashboard.php");
      }
      else if($row['role']=='student'){
        header("Location: ./user/dashboard.php");
      }
      else if($row['role']=='student'){
        header("Location: ./instructor/dashboard.php");
      }
      else {
        header("Location: ./login.php?error= Incorrect Username or Password");
      }
      
    } 

  }
  ?>