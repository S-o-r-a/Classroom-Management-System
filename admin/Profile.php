<?php
require('includes/Header.php');
?>

<link rel="stylesheet" href="../main-css/profile.css">

<div class="x--main-container">
  <?php
  require './Modals/Add/EditProfileModal.php';
  require './Modals/Add/ChangePasswordModal.php';
  ?>

  <div class="container">
    <div class="row d-flex justify-content-center">
      <?php
      if (isset($_GET['error'])) { ?>

        <div class="alert alert-danger d-inline p-2 text-center" role="alert">
          <button type="button" class="btn-close btn-close-dark" data-dismiss="alert" aria-label="Close"></button>
          <?= $_GET['error'] ?>
        </div>
      <?php } ?>

      <div class="col md-10 mt-5 pt-5">
        <div class="row z-depth-3">
          <div class="col-sm-4 bg-dark bg-gradient">
            <div class="card-block text-center text-white my-5">
              <div class="pictureContainer">
                <?php
                $sqlImg = "SELECT * FROM profileimg WHERE school_id='$school_id'";
                $resultImg = $con->query($sqlImg);
                while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                  if ($rowImg['status'] == 0) {
                    $filename = "../uploads/profile" . $school_id . "*";
                    $fileinfo = glob($filename);
                    $fileext = explode(".", $fileinfo[0]);
                    $fileactualext = $fileext[3];
                    echo "<img class='img-fluid rounded-circle mx-auto' src='../uploads/profile" . $school_id . ".$fileactualext?" . mt_rand() . "'>";
                  } else {
                    echo "<img class='img-fluid rounded-circle mx-auto' src='../uploads/profiledefault.jpg'>";
                  }
                }
                ?>
              </div>
              <h2 class="font-weight-bold mt-4 "><?php echo $first_name . " " . $last_name; ?></h2>
              <p class="text-uppercase fw-ligher"><?php echo $role ?></p>
            </div>
          </div>
          <div class="col-sm-8 bg-white mx-auto rounded row d-flex justify-content-center">
            <h2 class="mt-5 text-center">Profile
              <hr class="badge-primary mx-auto w-25">
            </h2>
            <div class="row text-center">
              <div class="col">
                <h5 class="fw-bolder ">School ID: </h5>
                <h6 class="text-muted"><?php echo $school_id ?></h6>
              </div>
              <div class="col">
                <h5 class="fw-bolder">Email: </h5>
                <h6 class="text-muted"><?php echo $email ?></h6>
              </div>
              <div class="col">
                <h5 class="fw-bolder">Contact Number: </h5>
                <h6 class="text-muted"><?php echo $phone ?></h6>
              </div>
            </div>
            <div class="row text-center">
              <div class="editProfile text-center mt-5 pt-3">
                <button type="button" class="btn btn-success fs-5 my-2" data-toggle="modal" data-target="#editProfile">
                  <i class="fa-solid fa-user"></i>
                  <span class="editProfile  ">EDIT PROFILE</span>
                </button>
                <button type="button" class="btn btn-danger fs-5 my-2" data-toggle="modal" data-target="#changepassword">
                  <i class="fa-solid fa-key"></i>
                  <span class="editProfile  ">CHANGE PASSWORD</span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
require('includes/Footer.php');
?>