<?php
session_start(); 
?>
<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
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
<li> <a href="../Dashboard/mainpanel.php"> <img src="../img/dashboard.png" alt="image"> <h2>Dashboard</h2> </a></li>
  <li> <a href="../Course/mainpanel.php"> <img src="../img/course.png" alt="image"> <h2>Course</h2> </a></li>
  <li> <a href="../Students/mainpanel.php"> <img src="../img/student.png" alt="image"> <h2>Student</h2> </a></li>
  <li> <a href="../Lms/mainpanel.php"> <img src="../img/learning.png" alt="image"> <h2>L.M.S</h2> </a></li>
  <li> <a href="../Marks/mainpanel.php"> <img src="../img/report.png" alt="image"> <h2>Marks</h2> </a></li>
  <li> <a href="../Message/mainpanel.php"> <img src="../img/message.png" alt="image"> <h2>Messages</h2> </a></li>
  <li> <a href="../Settings/mainpanel.php"> <img src="../img/setting.png" alt="image"> <h2>Settings</h2> </a></li>
</ul>
<div class="logout">
  <ul class="sidelist">
    <li><a href="../../Logout.php"><img src="../img/logout.png" alt="image"><h2>Logout</h2></a></li>
  </ul>
</div>
</div>
<div class="main_content">
      <div class="header">
<img src="../img/newlogo.png" alt="logo">

      </div>
</div>
 <div class ="container">
 <h1 style =" text-align: center;">My Permission Details</h1>
    <!-- Display all data base data into table-->
        <br>
        <br>
     <div class ="jumbotron">
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h6><b>Instructor Username</h6></th>
            <th><h6><b>Instructor Name</h6></th>
            <th><h6><b>Instructor Password</h6></th>
            <th><h6><b>Update </h6></th>
             </tr>
         </thead>
         <?php
         // get session variable 
         $insid = $_SESSION['userid']; 
         $sql ="SELECT * FROM user WHERE username = '{$insid}'";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['username'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['password'];?></td>
              <td><button class ="btn btn-success updpassbtn">Password</button></td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>  
</div>
<!--********************************************************************************************************************************************************************************************-->
<!--Password Update form -->
<div class="modal fade" id="updpswmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update My Password</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post">
                      <div class="form-group">
                          <label >MY Username : </label>
                          <input type="text" class="form-control"  name="instruid" id="insid"readonly>
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
  $instruid = $_POST["instruid"];
  $newpsw = $_POST["newpassword"];
  $rtypsw = $_POST["rtynewpassword"];

  if($newpsw == $rtypsw ) {
   $sql = "UPDATE user SET password ='$newpsw' WHERE username ='$instruid'";
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

 </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
<script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
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
      $('#insid').val(data[0]);
      $('#crtpsw').val(data[2]);
    });

  });
</script>
  </body>
</html>
