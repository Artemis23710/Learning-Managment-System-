<?php
session_start(); 
?>

<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>




<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../Res/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Res/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Res/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../Res/css/style.css">

    <title></title>
  </head>
  <body style ="background:#e6ffff;">


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo">
            <img src="../img/newlogo.png" alt="logo">
            </div>

            <div class="col-12">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="../Dashboard/mainpanel.php" class="nav-link">Dashboard</a></li>
                  <li><a href="../LMS/mainpanel.php" class="nav-link">Learning Materials</a></li>


                  <li>
                    <a href="../Payment/mainpanel.php" class="nav-link">Class Payment</a>
                     </li>

                  <li><a href="../Profile/mainpanel.php" class="nav-link">My Profile</a></li>

                  <li><a href="../../Logout.php" class="nav-link">Logout</a></li>
                </ul>
              </nav>

            </div>
            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </header>
<br>
<br>
<br>
      <div class ="container">
      <h1 style="text-align: center;">My Profile </h1>
    <!-- Display all data base data into table-->
        <br>
        <br>
<!--**************************************************************************************************************************************************************************-->
      <?php
      $stdid =  $_SESSION ['userid']; 

      $sql ="SELECT * FROM student WHERE std_id ='$stdid'";
      $result_set = mysqli_query($con,$sql);

      while ($row = mysqli_fetch_array($result_set)){

        $name = $row['name'];
        $bday = $row['birthday'];
        $add = $row['address'];
        $gender = $row['gender'];
        $email = $row['email'];
        $cont = $row['contact'];
        $school = $row['school'];
        $cus = $row['course'];
        $cusid = $row['course_id']; 
        $batch = $row['batch'];
        $prtname = $row['prt_name'];
        $prtcont = $row['prt_contact'];
        $pass = $row['password'];
      }
      ?> 
<!--**************************************************************************************************************************************************************************-->
<form action="" method ="POST">
<div class="form-group">
  <label >Student Registration ID:</label>
  <input type="text" class="form-control" name="std_id" value="<?php echo $stdid; ?>"  readonly>
</div>
<div class="form-group">
  <label> Full Name:</label>
  <input type="text" class="form-control" name="std_name" value="<?php echo $name; ?>" required>
</div>
<div class="form-group">
  <label> Birthday:</label>
  <input type="date" class="form-control" name="std_birthday" value="<?php echo $bday; ?>" required>
</div>
<div class="form-group">
  <label> Address:</label>
  <input type="text" class="form-control" name="std_address" value="<?php echo $add; ?>" required>
</div>
<div class="form-group">
  <label> Gender :</label>
  <input type="text" class="form-control" name="std_address" value="<?php echo $gender; ?>" required>
</div>    
<div class="form-group">
  <label> Email Address:</label>
  <input type="text" class="form-control" name="std_email" value="<?php echo $email; ?>" required>
</div>
<div class="form-group">
  <label> Contact Number:</label>
  <input type="text" class="form-control" name="std_contact" value="<?php echo $cont; ?>" required>
</div>
<div class="form-group">
  <label> School:</label>
  <input type="text" class="form-control" name="std_school" value="<?php echo $school; ?>" required>
</div>
<br>
<div class="form-group">
<label> Course :</label>
<input type="text" name="std_course" id ="coursename" class="form-control" value="<?php echo $cus; ?>" readonly required>
</div>
<div class="form-group">
<label> Course ID :</label>
<input type="text" name="std_course" id ="coursename" class="form-control" value="<?php echo $cusid; ?>" readonly required>
</div>
<div class="form-group">
  <label>Batch:</label>
  <input type="text" class="form-control" name="std_batch" value="<?php echo $batch; ?>" required>
</div>
<div class="form-group">
  <label>Parent Name:</label>
  <input type="text" class="form-control" name="prt_name" value="<?php echo $prtname; ?>" required>
</div>
<div class="form-group">
  <label>Parent Contact Number:</label>
  <input type="text" class="form-control" name="prt_contact" value="<?php echo $prtcont; ?>" required>
</div>
<div class="form-group">
  <label> Password:</label>
  <input type="password" class="form-control" name="std_password" value="<?php echo $pass; ?>" required>
</div>
<br>
</form>
<!--**************************************************************************************************************************************************************************-->
     <br><br>
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
     Change My Password
</button>

<!--**************************************************************************************************************************************************************************-->
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change My Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="mainpanel.php"method="post">
                      <div class="form-group">
                          <label >MY Username : </label>
                          <input type="text" class="form-control"  name="instruid" value="<?php echo $stdid; ?>"  readonly>
                        </div>  
                        <div class="form-group">
                          <label >Current Password : </label>
                          <input type="text" class="form-control"  name="crtpassword" value="<?php echo $pass; ?>" readonly>
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
<!--**************************************************************************************************************************************************************************-->
<?php

if(isset($_POST['btnupdate'])){
  $instruid = $_POST["instruid"];
  $newpsw = $_POST["newpassword"];
  $rtypsw = $_POST["rtynewpassword"];

  if($newpsw == $rtypsw ) {

    $sql = "UPDATE student SET password ='$newpsw' WHERE std_id ='$instruid'";
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

}else{

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
} ?>
<!--**************************************************************************************************************************************************************************-->
</div>
    <script src="../Js/jquery-3.3.1.min.js"></script>
    <script src="../Js/popper.min.js"></script>
    <script src="../Js/bootstrap.min.js"></script>
    <script src="../Js/jquery.sticky.js"></script>
    <script src="../Js/main.js"></script>
    <script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
  </body>
  

</html>