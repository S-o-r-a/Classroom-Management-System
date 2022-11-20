<?php
  require('../Components/usermanager.php');
  require('includes/Header.php');
if (isset($_SESSION['user'])) {

} else {
  header("location: ../login.php");
}
$targetid = null;
?>


<div class="x--main-container">

<!-- modal imports -->
<?php
  require './Modals/Add/AddSectionModal.php';

?>

<div class="container pt-5 "> 
    <div class="container-lg p-2 bg-white rounded">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addClassModal">
      Add Class
    </button>
      <table
        id="table"
        data-show-columns="true"
        data-search="true"
        data-url=""
        data-mobile-responsive="true"
        data-check-on-init="true">
        <thead>
          <tr>
            <th data-field="id" data-sortable="true">ID</th>
            <th data-field="name" data-sortable="true">COURSE</th>
            <th data-field="section">SECTION</th>
            <th class="text-center">ACTION</th>
          </tr>
        </thead>
        
        <tbody>
          <?php 
            include '../Components/Database.php';
            $sections = $con->query("SELECT * FROM sections");
            if($sections->num_rows > 0) {
              while($row = $sections->fetch_assoc()){?>

                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['course'] ?></td>
                  <td><?php echo $row['section'] ?></td>
                  <td class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary mx-1" data-toggle="modal" data-target="#editStudentModal" >
                        Edit
                        <i class="fa-solid fa-pen-to-square h5"></i>
                    </button>
                    <!-- Button trigger modal -->
                    <button  type="button" class="btn btn-danger mx-1" data-toggle="modal" data-target="#deleteStudentModal" >
                        Delete
                      <i class="fa fa-trash h5" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
              <?php
              }
            }
          ?>
        </tbody>
      </table>
    </div>
</div>


</div>



<?php
require('includes/Footer.php');
?>