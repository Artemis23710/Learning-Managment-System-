<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
<script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
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

<div class="container">
<div >
<h1 style =" text-align: center;">Admin Permission Details</h1>
    <!-- Display all data base data into table-->
        <br>
        <br>
     <div class ="jumbotron">
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h6><b>Admin ID</h6></th>
            <th><h6><b>Admin Username</h6></th>
            <th><h6><b>Admin Name</h6></th>
            <th><h6><b>Admin Password</h6></th>
            <th><h6><b>Update</h6></th>
             </tr>
         </thead>
         <?php
         $admin_type = "Admin";

         $sql ="SELECT * FROM user WHERE username = '$admin_type'";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['id'];?></td>
             <td><?php echo $row['username'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['password'];?></td>
               <td><button class ="btn btn-primary upduserbtn">Username</button>
               <button class ="btn btn-success updpassbtn">Password</button></td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>  
</div>
<br>
<br>
<br>
<div >
<h1 style =" text-align: center;">Instructor Permission Details</h1>
    <!-- Display all data base data into table-->
        <br>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="newpanal.php" class="btn btn-primary">+  Give Permission</a>
        </div>
        <br>
     <div class ="jumbotron">
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h6><b>Instructor ID</h6></th>
            <th><h6><b>Instructor Username</h6></th>
            <th><h6><b>Action</h6></th>
             </tr>
         </thead>
         <?php
         $ins_role = "instructor";
         $sql ="SELECT * FROM user WHERE role = '$ins_role'";
         $resultset = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($resultset)){
           ?>
           <tr>
             <td><?php echo $row['username'];?></td>
             <td><?php echo $row['name'];?></td>
               <td><button class ="btn btn-primary editbtn">Edit</button></td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>  
</div>
</div>
<!--********************************************************************************************************************************************************************************************-->
<!--Username Update form -->
<div class="modal fade" id="updusermodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update Admin Username</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label >Admin ID : </label>
                          <input type="text" class="form-control"  name="adminid" id="adminid"readonly>
                        </div>
                        <div class="form-group">
                          <label >Current Username : </label>
                          <input type="text" class="form-control"  name="crtusername" id="crtuser"readonly>
                        </div>
                        <div class="form-group">
                          <label >New Username : </label>
                          <input type="text" class="form-control"  name="newusername" required>
                        </div>
                        <div class="form-group">
                          <label >Retype New Username : </label>
                          <input type="text" class="form-control"  name="rtynewusername" required>
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
<!--*****************************************************************************************************************************************************************************************************-->
   <!-- username update FUNCTION -->             
                <?php

          if(isset($_POST['btnsubmit'])){
            $admid = $_POST["adminid"];
            $newusername = $_POST["newusername"];
            $rtynewusername = $_POST["rtynewusername"];

            if($newusername == $rtynewusername ) {
             $sql = "UPDATE user SET  username ='$newusername' WHERE  id ='$admid'";
                 // chech data is successfully updated
             $rst = mysqli_query($con,$sql);
             if ($rst){
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
              else {
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
            else {
              ?> 
                     <script>
                        swal({
                        title: "Username Not Match",
                        text: " Username You Enter Does Not Match",
                        icon: "error",
                         button: "Ok",
                    });
                        </script>
                   <?php
            }
          }
                ?>
<!--********************************************************************************************************************************************************************************************-->
<!--Password Update form -->
<div class="modal fade" id="updpswmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update Admin Password</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post">
                      <div class="form-group">
                          <label >Admin ID : </label>
                          <input type="text" class="form-control"  name="adminid" id="adid"readonly>
                        </div>  
                        <div class="form-group">
                          <label >Current Password : </label>
                          <input type="text" class="form-control"  name="crtpassword" id="crtpsw"readonly>
                        </div>
                        <div class="form-group">
                          <label >New password : </label>
                          <input type="password" class="form-control"  name="newpassword" required>
                        </div>
                        <div class="form-group">
                          <label >Retype New Password : </label>
                          <input type="password" class="form-control"  name="rtynewpassword" required>
                        </div>
                        <div class="modal-footer">
                        <input type="submit" name="btnupdate" class="btn btn-success" value="Save">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--********************************************************************************************************************************************************************************************-->
<!-- Password update FUNCTION -->             
<?php

if(isset($_POST['btnupdate'])){
  $admid = $_POST["adminid"];
  $newpsw = $_POST["newpassword"];
  $rtypsw = $_POST["rtynewpassword"];

  if($newpsw == $rtypsw ) {
   $sql = "UPDATE user SET  password ='$newpsw' WHERE id ='$admid'";
       // chech data is successfully updated
   $rest = mysqli_query($con,$sql);
   if ($rest){
    ?> 
        <script>
            swal({
              title: "Password Update",
              text: "Password Successfully Updated",
              icon: "success",
              button: "Ok",
              });
        </script>
    <?php 
              } 
    else {
    ?> 
           <script>
              swal({
              title: "Password Update",
              text: " Unsuccessfull Password Update",
              icon: "error",
               button: "Ok",
          });
              </script>
         <?php
      }
  }else {
    ?> 
           <script>
              swal({
              title: "Password Not Match",
              text: " Password You Enter Does Not Match",
              icon: "error",
               button: "Ok",
          });
              </script>
         <?php
  }
}
      ?>
<!--*****************************************************************************************************************************************************************************************************-->
<!--Instructor Update form -->
<div class="modal fade" id="updinsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update Instructor Permission</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post">
                      <div class="form-group">
                          <label >Instructor ID : </label>
                          <input type="text" class="form-control"  name="instrucid" id="insid"readonly>
                        </div>  
                        <div class="form-group">
                          <label >Instructor Name : </label>
                          <input type="text" class="form-control"  name="instrucname" id="insname"required>
                        </div>
                        <div class="form-group">
                          <label >Instructor password : </label>
                          <input type="password" class="form-control"  name="instrupassword" id="inspass" required>
                        </div> 
                        <div class="modal-footer">
                        <input type="submit" name="btnupd" class="btn btn-success" value="Save">
                        <input type="submit" name="btndel" class="btn btn-danger" value="Delete">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
     </div>
     <!--*****************************************************************************************************************************************************************************************-->
     <!--Instructor Permission Update-->
     <?php
     if(isset($_POST['btnupd'])){

      $insid = $_POST["instrucid"];
      $insname = $_POST["instrucname"];
      $inspass = $_POST["instrupassword"];

      $sql = "UPDATE user SET	name ='$insname',password ='$inspass' WHERE username ='$insid'";
      // chech data is successfully updated
      $rt = mysqli_query($con,$sql);

        if ($rt){
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
          else {
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
      <!--*****************************************************************************************************************************************************************************************-->
     <!--Instructor Permission Update-->
     <?php
     if(isset($_POST['btndel'])){

      $insid = $_POST["instrucid"];
      $insname = $_POST["instrucname"];
      $inspass = $_POST["instrupassword"];

      $sql = "DELETE FROM  user WHERE  username ='$insid'";
      // chech data is successfully updated
      $resut = mysqli_query($con,$sql);

        if ($resut){
          ?> 
              <script>
                  swal({
                    title: "Data Delete",
                    text: "Data Successfully Delete",
                    icon: "success",
                    button: "Ok",
                    });
              </script>
          <?php 
                    } 
          else {
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
     <!--*****************************************************************************************************************************************************************************************-->
     
</div>

<!--send admin username to model class-->
<script>
  $(document).ready(function(){
    $('.upduserbtn').on('click',function(){
      $('#updusermodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#adminid').val(data[0]);
      $('#crtuser').val(data[1]);
    });

  });
</script>
<!--send admin password to model class-->
<script>
  $(document).ready(function(){
    $('.updpassbtn').on('click',function(){
      $('#updpswmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#adid').val(data[0]);
      $('#crtpsw').val(data[3]);
    });

  });
</script>
<!--send Instructor details to model class-->
<script>
  $(document).ready(function(){
    $('.editbtn').on('click',function(){
      $('#updinsmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#insid').val(data[0]);
      $('#insname').val(data[1]);
      $('#inspass').val(data[2]);
    });

  });
</script>
  </body>
</html>
