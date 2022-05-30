<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
// get session variable 
// autofill dropdown menu
$sql ="SELECT course_id, cuname FROM course ";
$result = mysqli_query($con,$sql);

$namelist ='';
while($rest = mysqli_fetch_assoc($result)){
  $namelist.= "<option value=\"{$rest['course_id']}\">{$rest['cuname']}</option>";
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
<h1 style="text-align: center;">List Of Learning Materials </h1>
<br>
<br>
<form action="mainpanel.php" method="post">
<div class="form-group">
   <div class="input-group mb-3">
       <label class="input-group-text" for="inputGroupSelect01">Course</label>
        <select class="form-select" name="courselist">
        <?php echo $namelist?>
      </select>
      </div>
</div>
<br>
 <input type="submit" name="btnsearch" class="btn btn-success" value="Search">
 <br><br>
</form>
<br>
<br><br>
<table class="table  table-striped table-hover table-bordered border-dark align-middle">
<thead class="table-primary">
         <tr>
            <th><h5><b>Matrial ID</h5></th>
            <th><h5><b>Course ID</h5></th>
            <th><h5><b>Course </h5></th>
            <th><h5><b>Week</h5></th>
            <th><h5><b>Description</h5></th>
            <th><h5><b>Material</h5></th>
            <th><h5><b>Action</h5></th>
             </tr>
         </thead>
<?php
  if(isset($_POST['btnsearch'])){
    $cusid = $_POST["courselist"];

    $sql ="SELECT * FROM lms WHERE course_id ='$cusid'";
    $result_set = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result_set)){
     $file = $row['lms_id'];

     ?>
     <tr>

       <td><?php echo $file?></td>
       <td><?php echo $row['course_id'];?></td>
       <td><?php echo $row['cuname'];?></td>
       <td><?php echo $row['week'];?></td>
       <td><?php echo $row['description'];?></td>
       <td><?php echo $row['file'];?></td>
       <td><a href="downloads.php?file_id=<?php echo $file;?>" class ="btn btn-success" >Download</a></td>
      
      
     </tr>
     <?php
  }
}else{
    $sql ="SELECT * FROM lms ";
    $resultset = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($resultset)){
     $file = $row['lms_id'];
     ?>
     <tr>
       <td><?php echo $file?></td>
       <td><?php echo $row['course_id'];?></td>
       <td><?php echo $row['cuname'];?></td>
       <td><?php echo $row['week'];?></td>
       <td><?php echo $row['description'];?></td>
       <td><?php echo $row['file'];?></td>
       <td><a href="downloads.php?file_id=<?php echo $file;?>" class ="btn btn-success" >Download</a></td>
      
     </tr>
     <?php
  }
}
?>
</table>


</div>
</div>
  </body>
</html>
