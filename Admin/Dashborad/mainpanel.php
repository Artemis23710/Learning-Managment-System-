<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
  // get registration request total
  $sql = "SELECT count(*) FROM reg_request ";
  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($result)) {
     $count = $row['count(*)'];
  }
?>

<?php
  // get Payment request total
  $sql = "SELECT count(*) FROM payment_request ";
  $re = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($re)) {
     $cunt = $row['count(*)'];
  }
?>
<?php
$role = "admin";
  // get Admin Details
  $sql = "SELECT * FROM user WHERE role = '$role'";
  $ret = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($ret)) {
     $username =  $row['username'];
  }
?>


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
<div class ="container">
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Registration Requests</h4>
        <p class="card-text"><h1 style="text-align: center;"><?php echo $count;?></h1></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Payment Request</h4>
        <p class="card-text"><h1 style="text-align: center;"><?php echo $cunt;?></h1></p>
      </div>
    </div>
  </div>
  <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/admin.png" class="img-fluid rounded-start" alt="admin image" style ="margin-top: 20px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Wellcome !!!!</h5>
        <p class="card-text"><h1><?php echo $username;?></h1></p>
      </div>
    </div>
  </div>
</div>
</div>

<br>
<br>
<h1 style="text-align: center;">Class Schedule Of Dolex Academy </h1>
    <!-- Display all data base data into table-->
        <br>
        <br>

        <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h5><b>No</h5></th>
            <th><h5><b>Instructor</h5></th>
            <th><h5><b>Course</h5></th>
            <th><h5><b>Day</h5></th>
            <th><h5><b>Time</h5></th>
            <th><h5><b>Class Link</h5></th>
             </tr>
         </thead>
         <?php 
         $sql ="SELECT * FROM schadule";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['id'];?></td>
             <td><?php echo $row['name'];?></td>
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
     <div class="d-grid gap-2 col-4 mx-auto">
     <a href="schadule.php" class="btn btn-info me-md-4">Edit Class Schedule </a>

</div>
</div>

</div>
  </body>
</html>
