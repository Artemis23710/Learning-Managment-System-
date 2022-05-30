<?php
session_start(); 
?>
<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<?php
// get session variable 
$insid = $_SESSION['userid']; 
$sql ="SELECT * FROM user  WHERE username ='$insid'";
$resultset = mysqli_query($con,$sql);

while ($row = mysqli_fetch_array($resultset)){
    $username = $row['name'];
}
?>

<?php
$insid = $_SESSION['userid']; 
  // get registration request total
  $sql = "SELECT count(*) FROM course WHERE teacher_id ='$insid'";
  $result = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($result)) {
     $count = $row['count(*)'];
  }
?>
<?php
 $date = date('d-m-y h:i:s');
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
<div class = "container">

<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Number Of Course</h4>
        <p class="card-text"><h1 style="text-align: center;"><?php echo $count;?></h1></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title" style="text-align: center;">Today </h4>
        <p class="card-text"><h1 style="text-align: center;"><?php $date;?></h1></p>
      </div>
    </div>
  </div>
  <div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="../img/admin.png" class="img-fluid rounded-start" alt="admin image" style ="margin-top: 15px;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Wellcome !!!!</h5>
        <p class="card-text"><h4><?php echo $username;?></h4></p>
      </div>
    </div>
  </div>
</div>
</div>

<br>
<br>
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
         $sql ="SELECT * FROM schadule WHERE teacher_id ='$insid'";
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
</div>
</div>
  </body>
</html>
