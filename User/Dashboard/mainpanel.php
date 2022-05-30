<?php
session_start(); 
?>

<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
// get session variable 
$stdid = $_SESSION['userid']; 
$sql ="SELECT course_id,course FROM student  WHERE std_id ='$stdid'";
$resultset = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($resultset)){
  $_SESSION['cous'] = $row['course_id'];
  $_SESSION['coursename'] = $row['course'];;
}
?>
<!--**************************************************************************************************************************************************************************-->

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
<!--**************************************************************************************************************************************************************************-->



<!--**************************************************************************************************************************************************************************-->
<br>
<br>
<br>
      <div class ="container">
      <h1 style="text-align: center;">My Class Schedule  </h1>
    <!-- Display all data base data into table-->
        <br>
        <br>

        <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h5><b>No</h5></th>
            <th><h5><b>Course</h5></th>
            <th><h5><b>Day</h5></th>
            <th><h5><b>Time</h5></th>
            <th><h5><b>Class Link</h5></th>
             </tr>
         </thead>
         <?php 
         
         // get course id from session 
         $course = $_SESSION['cous']; 


         $sql ="SELECT * FROM schadule WHERE course_id ='$course'";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['id'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['class_day'];?></td>
             <td><?php echo $row['time'];?></td>
             <td><?php echo $row['link'];?></td>
           </tr>
           <?php
         }
         ?>
       </table>

     <br><br>
<!--**************************************************************************************************************************************************************************-->
</div>
    <script src="../Js/jquery-3.3.1.min.js"></script>
    <script src="../Js/popper.min.js"></script>
    <script src="../Js/bootstrap.min.js"></script>
    <script src="../Js/jquery.sticky.js"></script>
    <script src="../Js/main.js"></script>
  </body>
  

</html>