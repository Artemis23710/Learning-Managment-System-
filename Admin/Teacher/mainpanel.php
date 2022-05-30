<?php
 // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
// auto number generate (teacher id)
$sql ="SELECT  teacher_id FROM teacher order by teacher_id desc";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$lastregid = $row['teacher_id'];
if (empty($lastregid)) {
  $number = "INS001";
}
else {
  $idd = str_replace("INS","",$lastregid);
  $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
  $number = 'INS' .$id;
}
?>

<!--**************************************************************************************************************************************************************************-->
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <title></title>
  </head>
  <body>
<div class="mainpage">
<div class="sidepanel">
<ul class="sidelist">
  <li> <a href="../Dashborad/mainpanel.php"> <img src="../img/dashboard.png" alt="image"> <h2>Dashboard</h2> </a></li>
  <li> <a href="../course/mainpanel.php"> <img src="../img/course.png" alt="image"> <h2>Course</h2> </a></li>
  <li> <a href="../Teacher/mainpanel.php"> <img src="../img/teacher.png" alt="image"> <h2>Teacher</h2> </a></li>
  <li> <a href="../student/mainpanel.php"> <img src="../img/student.png" alt="image"> <h2>Student</h2> </a></li>
  <li> <a href="../regestration/mainpanel.php"> <img src="../img/registration.png" alt="image"> <h2>Registration</h2> </a></li>
  <li> <a href="../payment/mainpanel.php"> <img src="../img/payment.png" alt="image"> <h2>Payments</h2> </a></li>
  <li> <a href="../lms/mainpanel.php"> <img src="../img/learning.png" alt="image"> <h2>L.M.S</h2> </a></li>
  <li> <a href="../Message/mainpanel.php"> <img src="../img/message.png" alt="image"> <h2>Messages</h2> </a></li>
  <li> <a href="../report/mainpanel.php"> <img src="../img/report.png" alt="image"> <h2>Reports</h2> </a></li>
  <li> <a href="../Setting/mainpanel.php"> <img src="../img/setting.png" alt="image"> <h2>Settings</h2> </a></li>
</ul>
<div class="logout">
  <ul class="sidelist">
  <li><a href="../../Login.php"><img src="../img/logout.png" alt="image"><h2>Logout</h2></a></li>
  </ul>
</div>
</div>
<div class="main_content">
      <div class="header">
<img src="../img/newlogo.png" alt="logo">

      </div>
</div>
<!--**************************************************************************************************************************************************************************-->
<div class="container ">
          <h1 style="text-align: center;">Course Instructors </h1>
        <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary me-md-4" data-bs-toggle="modal" data-bs-target="#newinsrtuctormodal">+  New Instructor</button>
        </div>
        
        <br>

          <?php
          $sql ="SELECT * FROM teacher";
          $result_set = mysqli_query($con,$sql);
          if ($result_set-> num_rows > 0) {
          echo '<table class="table  table-striped table-hover table-bordered border-dark align-middle">';
            echo'<thead class="table-primary">
            <tr>
            <th><h5><b>Register ID</h5></th>
            <th><h5><b>Name</h5></th>
            <th><h5><b>Address</h5></th>
            <th><h5><b>Email address</h5></th>
            <th><h5><b>Mobile Number</h5></th>
            <th><h5><b>Action</h5></th>
             </tr>
             </thead>';
             while ($row = $result_set ->fetch_assoc()) {

               echo'<tr>
               <td>'.$row['teacher_id'].'</td>
               <td>'.$row['name'].'</td>
               <td>'.$row['address'].'</td>
               <td>'.$row['email'].'</td>
               <td>'.$row['con_number'].'</td>
               <td>
               <button class ="btn btn-primary updatebtn">Update</button>
               <button class ="btn btn-danger deletebtn">Delete</button>
               </td>
               </tr>
               ';
             }
            echo '</table>';
          }
          else {
            echo "Empty Table";
          }
           ?>

        </div>
    
<!--**************************************************************************************************************************************************************************-->
              <!-- insrtuctor update model -->
              <div class="modal fade" id="updatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update Instructor Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" class =" needs-validation">
                        <div class="form-group">
                          <label for="regid">Registration ID </label>
                          <input type="text" class="form-control" name="regid" id ="updreg_id"readonly>
                        </div>
                        <div class="form-group">
                          <label> Instructor's Full Name :</label>
                          <input type="text" name="updfullname" class="form-control" id ="updfname" required>
                        </div>
                        <div class="form-group">
                        <label>Address </label>
                        <input type="text" name="updaddress" class="form-control" id ="updadd" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address </label>
                            <input type="text" name="updemailadd" class="form-control" id ="updemail" required>
                        </div>
                        <div class="form-group">
                           <label>Contact Number </label>
                           <input type="number" name="updphonenumber" class="form-control" id="updcontact" required>
                        </div>
                        <div class="modal-footer">
                        <input type="submit" name="btnupdate" class="btn btn-success" value="Update">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value ="Close">
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--**************************************************************************************************************************************************************************-->
              <!-- DATA UPDATE FUNCTION -->
              <?php
              if (isset($_POST['btnupdate'])) {
                // assing post values to variables
                $regid = $_POST["regid"];
                $name = $_POST["updfullname"];
                $address = $_POST ["updaddress"];
                $email = $_POST["updemailadd"];
                $number = $_POST["updphonenumber"];

                //update data to data dable

                $sql = "UPDATE `teacher` SET name ='$name',address ='$address',email ='$email',con_number='$number' WHERE teacher_id ='$regid'";

                // chech data is successfully updated
                $rst = mysqli_query($con,$sql);
                if ($rst) {
                  ?> 
                  <script>
                    swal({
                     title: "Data Update",
                     text: "Data Successfully Updated",
                     icon: "success",
                     button: "Ok",
                    });
                  </script>
                  <?php
                }
                else{
                  ?> 
                  <script>
                    swal({
                     title: "Data Update",
                     text: " Unsuccessfull Data Update",
                     icon: "error",
                     button: "Ok",
                    });
                  </script>
                  <?php
                }

              }
               ?>
               <!-- DATA DELETE FUNCTION -->
               <?php
               if (isset($_POST['btndelete'])) {
                 // assing post values to variables
                 $regid = $_POST["regid"];
                 $name = $_POST["updfullname"];
                 $address = $_POST ["updaddress"];
                 $email = $_POST["updemailadd"];
                 $number = $_POST["updphonenumber"];

                 //delete data to data dable

                 $sql = "DELETE FROM teacher WHERE teacher_id ='$regid'";

                 // chech data is successfully deleted
                 $rs = mysqli_query($con,$sql);
                 if ($rs) {
                  ?> 
                  <script>
                    swal({
                     title: "Data Delete",
                     text: "Data Successfully Deleted",
                     icon: "success",
                     button: "Ok",
                    });
                  </script>
                  <?php
                 }
                 else{
                  ?> 
                  <script>
                    swal({
                     title: "Data Delete",
                     text: " Unsuccessfull Data Delete",
                     icon: "error",
                     button: "Ok",
                    });
                  </script>
                  <?php
                 }

               }
                ?>
                </div>
<!--**************************************************************************************************************************************************************************-->

<!-- Data Delete Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Delete Instructor Details</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post">
                        <div class="form-group">
                          <label for="regid">Registration ID </label>
                          <input type="text" class="form-control" name="regid" id ="deltreg_id"readonly>
                        </div>
                        <div class="form-group">
                          <label> Instructor's Full Name :</label>
                          <input type="text" name="updfullname" class="form-control" id ="deltfname" required>
                        </div>
                        <div class="form-group">
                        <label>Address </label>
                        <input type="text" name="updaddress" class="form-control" id ="deltadd" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address </label>
                            <input type="text" name="updemailadd" class="form-control" id ="deltemail" required>
                        </div>
                        <div class="form-group">
                           <label>Contact Number </label>
                           <input type="number" name="updphonenumber" class="form-control" id="deltcontact" required>
                        </div>
                        <div class="modal-footer">
                        <input type="submit" name="btndelete" class="btn btn-danger" value="Delete">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value ="Close">
                      </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--**************************************************************************************************************************************************************************-->
                <!-- insrtuctor model -->
                <div class="modal fade" id="newinsrtuctormodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add New Instructor</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post">
                        <div class="form-group">
                          <label for="regid">Registration ID </label>
                          <input type="text" class="form-control" name="reg_id" value="<?php echo $number; ?>"readonly>
                        </div>
                        <div class="form-group">
                          <label> Instructor's Full Name :</label>
                          <input type="text" name="fullname" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Address </label>
                        <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address </label>
                            <input type="text" name="emailadd" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label>Contact Number </label>
                           <input type="number" name="phonenumber" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                        <input type="submit" name="btnsubmit" class="btn btn-success" value="Save">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>

<!--**************************************************************************************************************************************************************************-->
                  <!-- DATA INSER FUNCTION -->
                <?php
                if (isset($_POST['btnsubmit'])) {
                  // assing post values to variables
                  $regid = $_POST["reg_id"];
                  $name = $_POST["fullname"];
                  $address = $_POST ["address"];
                  $email = $_POST["emailadd"];
                  $number = $_POST["phonenumber"];

                  //insert data to data dable

                  $sql = "INSERT INTO teacher(teacher_id ,name,address,email,con_number)
                          VALUES ('{$regid}','{$name}','{$address}','{$email}','{$number}')";

                  // chech data is successfully entered
                  $resultset = mysqli_query($con,$sql);
                  if ($resultset) {
                    ?> 
                    <script>
                      swal({
                       title: "Data Insert",
                       text: "Data Successfully Inserted",
                       icon: "success",
                       button: "Ok",
                      });
                    </script>
                    <?php
                  }
                  else{
                    ?> 
                  <script>
                    swal({
                     title: "Data Insert",
                     text: " Unsuccessfull Data Insert",
                     icon: "error",
                     button: "Ok",
                    });
                  </script>
                  <?php
                  }

                }
                 ?>
                
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
<script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
<!--**************************************************************************************************************************************************************************-->

<!-- javascript part to send table data to the update form  -->
<script>
  $(document).ready(function(){
    $('.updatebtn').on('click',function(){
      $('#updatemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);

      $('#updreg_id').val(data[0]);
      $('#updfname').val(data[1]);
      $('#updadd').val(data[2]);
      $('#updemail').val(data[3]);
      $('#updcontact').val(data[4]);
    });

  });
</script>
<!-- javascript part to send table data to the delete form  -->
<script>
  $(document).ready(function(){
    $('.deletebtn').on('click',function(){
      $('#deletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);

      $('#deltreg_id').val(data[0]);
      $('#deltfname').val(data[1]);
      $('#deltadd').val(data[2]);
      $('#deltemail').val(data[3]);
      $('#deltcontact').val(data[4]);
    });

  });
</script>
</body>
</html>
