<!-- Modal -->
<div class="modal fade" id="adminModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <form method="post" class="bg-light border border-primary rounded px-5">

        <!-- ADD STUDENT MODAL -->
        <h1 class="text-center pt-3 fw-bold fst-italic">Add ADMIN</h1>
        <div class="input-group mb-5 px-1">
          <span class="input-group-text" id="basic-addon1"><i class="fa fa-id-badge" aria-hidden="true"></i></span>
          <input type="text" class="form-control" placeholder="School ID" aria-label="SchoolID" aria-describedby="basic-addon1" name="schoolID" required>
        </div>

        <div class="input-group mb-5 px-1">
          <span class="input-group-text">First Name</span>
          <input type="text" aria-label="Firstname" placeholder="First Name" class="form-control" name="firstName" required>

        </div>
        <div class="input-group mb-5 px-1">
          <span class="input-group-text">Last Name</span>
          <input type="text" aria-label="Lastname" placeholder="Last Name" class="form-control" name="lastName" required>
        </div>

        <div class="d-flex justify-content-evenly py-2 mb-4">
          <input type="submit" class="btn btn-success btn-lg mx-2" name="addingAdminSubmit" value="Add User"></input>
          <input type="reset" class="btn btn-danger btn-lg mx-2" value="Clear"></input>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </form>

    </div>
  </div>
</div>

<?php
require '../Components/Database.php';
if (isset($_POST['addingAdminSubmit'])) {

  $school_id = $_POST['schoolID'];
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $password =$_POST['schoolID'];

  $options = [
    'cost' => 10,
  ];
  $hashedpassword = password_hash($password, PASSWORD_BCRYPT, $options);

  $checkSchoolID = mysqli_query($con, "SELECT *  FROM admins where school_id = '$school_id' ");
  if (mysqli_num_rows($checkSchoolID)) { ?>
     <div class="alert alert-danger text-center mx-5" role="alert">User Already Exist!
    <button type="button" class="btn-close btn-close-white" data-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    $checkSchoolID = null;
  } else {
    $res = $con->query("INSERT INTO `admins`(`school_id`, `first_name`, `last_name`, `status`) 
  VALUES ('$school_id','$fname','$lname', 1)");

   $sql = "INSERT INTO `users`(`school_id`, `first_name`, `last_name`, `password`, `role`) 
    VALUES ('$school_id', '$fname', '$lname', '$hashedpassword', 'admin')";
    $con->query($sql);

    $sql = "SELECT * FROM users WHERE school_id='$school_id' AND first_name='$fname'";
    $res = $con->query($sql);

    if(mysqli_num_rows($res)>0){
      while($row = mysqli_fetch_assoc($res)){
        $school_id = $row['school_id'];
        $sql2 = "INSERT INTO `profileimg`(`school_id`, `status`) VALUES ('$school_id','1')";
        $con->query($sql2);
      }
      
    }else{
      echo "You have an error!";
    }
  }
}

?>