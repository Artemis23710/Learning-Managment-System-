<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<!--***************************************************************************************************************************************-->

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
<!--***************************************************************************************************************************************-->
<div class="container">
   <h1>Course Informations </h1>
    <!-- Display all data base data into table-->
        <br>
        
        <br>
     <div>
       <form action=""method="POST">
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h5><b>Course ID</h5></th>
            <th><h5><b>Course Name</h5></th>
            <th><h5><b>Description </h5></th>
            <th><h5><b>Enroll Date</h5></th>
            <th><h5><b>Course Price </h5></th>
            <th><h5><b>Instructor</h5></th>
            <th><h5><b>Instructor ID</h5></th>
            <th><h5><b>Image</h5></th>
             </tr>
         </thead>
         <?php
         $sql ="SELECT * FROM course";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['course_id'];?></td>
             <td><?php echo $row['cuname'];?></td>
             <td><?php echo $row['descrp'];?></td>
             <td><?php echo $row['enroll_date'];?></td>
             <td><?php echo $row['cost'];?></td>
             <td><?php echo $row['instructor'];?></td>
             <td><?php echo $row['teacher_id'];?></td>
             <td><img src="../../Image/<?php echo $row['img'];?>" width = "200px" height = "100px"></td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>   

</div>
</div>
  </body>
</html>
