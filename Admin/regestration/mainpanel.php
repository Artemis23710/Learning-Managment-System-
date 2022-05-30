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
<h1 style="text-align: center;">Registration Requests </h1>
    <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="newpanal.php" class="btn btn-primary">+  New Student</a>
        </div>
        <br>
     <div class ="jumbotron">
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h6><b>Request ID</h6></th>
            <th><h6><b>Student Name</h6></th>
            <th><h5><b>Student Birthday</h6></th>
            <th><h6><b>Address </h6></th>
            <th><h6><b>Gender </h6></th>
            <th><h6><b>Email </h6></th>
            <th><h6><b>Contact Number</h6></th>
            <th><h6><b>School</h6></th>
            <th><h6><b>Course</h6></th>
            <th><h6><b>Course ID</h6></th>
            <th><h6><b>Parent Name</h6></th>
            <th><h6><b>Parent Contact</h6></th>
            <th><h6><b>Action</h6></th>
             </tr>
         </thead>
         <?php
         $sql ="SELECT * FROM reg_request";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           $reqid = $row['req_id'];
           ?>
           <tr>
             <td><?php echo $reqid?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['birthday'];?></td>
             <td><?php echo $row['address'];?></td>
             <td><?php echo $row['gender'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['contact'];?></td>
             <td><?php echo $row['school'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['course_id'];?></td>
             <td><?php echo $row['prt_name'];?></td>
             <td><?php echo $row['prt_contact'];?></td>
               <td>
               <a href="newpanal.php?$rqid=<?php echo $reqid;?>" class ="btn btn-primary ">Check</a>
            </td>
             
            
           </tr>
           <?php
         }
         ?>
       </table>
     </div>  
</div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
<script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
  </body>
</html>
