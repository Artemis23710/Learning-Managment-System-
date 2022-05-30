<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<?php 
// autofill dropdown menu
$sql ="SELECT  cuname,course_id FROM course";
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
<h1 style="text-align: center;">List Of Student Details </h1>
<form action="mainpanel.php" method="post">
<br><br>
<h5 style="text-align: center;">Search Student By Student ID </h5>
<div class="form-group">
<label>Student ID : </label>
 <input type="text" name="stdid" class="form-control">
 </div>
 <br>
 <input type="submit" name="btnsearch" class="btn btn-success" value="Search">
 <br><br>
 <h5 style="text-align: center;">Filter Student Details</h5>
<div class="form-group">
   <div class="input-group mb-3">
       <label class="input-group-text" for="inputGroupSelect01">Course</label>
        <select class="form-select" name="courselist">
        <?php echo $namelist?>
      </select>
      </div>
</div>

 <div class="form-group">
<label>Batch : </label>
 <input type="number" name="batch" class="form-control">
 </div>
 <br>
 <label>Course Status : </label>
 <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="stusopttion" id="inlineRadio1" value="pending">
  <label class="form-check-label" for="inlineRadio1">Pending</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="stusopttion" id="inlineRadio2" value="complete">
  <label class="form-check-label" for="inlineRadio2">Completed</label>
</div>
<br>
<br>
<input type="submit" name="btnsearch" class="btn btn-success" value="Filter">

</form>
<br>
<br>
<div>
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h6><b>Student ID</h6></th>
            <th><h6><b>Name</h6></th>
            <th><h6><b>Birthday</h6></th>
            <th><h6><b>Address</h6></th>
            <th><h6><b>Gender</h6></th>
            <th><h6><b>Email</h6></th>
            <th><h6><b>Contact</h6></th>
            <th><h6><b>School</h6></th>
            <th><h6><b>Batch</h6></th>
            <th><h6><b>Course</h6></th>
            <th><h6><b>Parent Name</h6></th>
            <th><h6><b>Parent Contact</h6></th>
            <th><h6><b>Course Status</h6></th>
            <th><h6><b>Payment</h6></th>
            <th><h6><b>Marks</h6></th>
            <th><h6><b>Action</h6></th>
             </tr>
         </thead>
         <?php
         // get session variable 
 if(isset($_POST['btnsearch'])){
  $stdid = $_POST["stdid"];
  $cusid = $_POST["courselist"];
  $batch = $_POST["batch"];
  $cousstus = $_POST["stusopttion"];
          
// serach student by student id

             if (!empty($stdid)){
               $sql ="SELECT * FROM student WHERE std_id ='$stdid'";
               $result_set = mysqli_query($con,$sql);
 
                while ($row = mysqli_fetch_array($result_set)){
                ?>
                 <tr>
                 <td><?php echo $row['std_id'];?></td>
                 <td><?php echo $row['name'];?></td>
                 <td><?php echo $row['birthday'];?></td>
                 <td><?php echo $row['address'];?></td>
                 <td><?php echo $row['gender'];?></td>
                 <td><?php echo $row['email'];?></td>
                 <td><?php echo $row['contact'];?></td>
                <td><?php echo $row['school'];?></td>
                <td><?php echo $row['batch'];?></td>
                <td><?php echo $row['course'];?></td>
                <td><?php echo $row['prt_name'];?></td>
                <td><?php echo $row['prt_contact'];?></td>
                <td><?php echo $row['course_status'];?></td>
                <td><?php echo $row['payment'];?></td>
                <td><?php echo $row['mark'];?></td>
                <td>
               <button class ="btn btn-primary updatebtn">Update</button>
               <br><br>
               <button class ="btn btn-danger deletebtn">Delete</button>
               </td>
               </tr>
               <?php
                }
               }elseif(!empty($cusid)){
                 // filter students by course 
                $sql ="SELECT * FROM student WHERE course_id ='$cusid'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                 <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                </tr>
                <?php
                 }
               }elseif(!empty($batch)){
                 // filter students by batch year
                $sql ="SELECT * FROM student WHERE batch ='$batch'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                 <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                </tr>
                <?php
                 }
               }elseif(!empty($cousstus)){
                 // filter students by course status
                $sql ="SELECT * FROM student WHERE course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                 <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                </tr>
                <?php
                 }
               }elseif(!empty($cusid)&& !empty($batch)&& !empty($cousstus)){
                 // filter students by course , batch and course status
                $sql ="SELECT * FROM student WHERE  course_id ='$cusid',batch ='$batch',course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                 <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                </tr>
                <?php
                 }
               }elseif(!empty($cusid)&& !empty($batch)){
                 // filter students by course and batch 
                 $sql ="SELECT * FROM student WHERE  course_id ='$cusid',batch ='$batch'";
                 $result_set = mysqli_query($con,$sql);
   
                  while ($row = mysqli_fetch_array($result_set)){
                  ?>
                   <tr>
                   <td><?php echo $row['std_id'];?></td>
                   <td><?php echo $row['name'];?></td>
                   <td><?php echo $row['birthday'];?></td>
                   <td><?php echo $row['address'];?></td>
                   <td><?php echo $row['gender'];?></td>
                   <td><?php echo $row['email'];?></td>
                   <td><?php echo $row['contact'];?></td>
                  <td><?php echo $row['school'];?></td>
                  <td><?php echo $row['batch'];?></td>
                  <td><?php echo $row['course'];?></td>
                  <td><?php echo $row['prt_name'];?></td>
                  <td><?php echo $row['prt_contact'];?></td>
                  <td><?php echo $row['course_status'];?></td>
                  <td><?php echo $row['payment'];?></td>
                  <td><?php echo $row['mark'];?></td>
                  <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                 </tr>
                 <?php
                  } 
               }elseif(!empty($batch)&& !empty($cousstus)){
                  // filter students by  batch and course status
                $sql ="SELECT * FROM student WHERE batch ='$batch',course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                 <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                </tr>
                <?php
                 }
               }else{
                  // filter students by course  and course status
                $sql ="SELECT * FROM student WHERE  course_id ='$cusid',course_status ='$cousstus'";
                $result_set = mysqli_query($con,$sql);
  
                 while ($row = mysqli_fetch_array($result_set)){
                 ?>
                  <tr>
                  <td><?php echo $row['std_id'];?></td>
                  <td><?php echo $row['name'];?></td>
                  <td><?php echo $row['birthday'];?></td>
                  <td><?php echo $row['address'];?></td>
                  <td><?php echo $row['gender'];?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['contact'];?></td>
                 <td><?php echo $row['school'];?></td>
                 <td><?php echo $row['batch'];?></td>
                 <td><?php echo $row['course'];?></td>
                 <td><?php echo $row['prt_name'];?></td>
                 <td><?php echo $row['prt_contact'];?></td>
                 <td><?php echo $row['course_status'];?></td>
                 <td><?php echo $row['payment'];?></td>
                 <td><?php echo $row['mark'];?></td>
                 <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
                </tr>
                <?php
                 }
               }
         
  }else {
          $sql ="SELECT * FROM student ";
         $result_set = mysqli_query($con,$sql);

         // get all students data
         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['std_id'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['birthday'];?></td>
             <td><?php echo $row['address'];?></td>
             <td><?php echo $row['gender'];?></td>
             <td><?php echo $row['email'];?></td>
             <td><?php echo $row['contact'];?></td>
             <td><?php echo $row['school'];?></td>
             <td><?php echo $row['batch'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['prt_name'];?></td>
             <td><?php echo $row['prt_contact'];?></td>
             <td><?php echo $row['course_status'];?></td>
             <td><?php echo $row['payment'];?></td>
             <td><?php echo $row['mark'];?></td>
             <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               </td>
           </tr>
           <?php
         }
        }
         ?>
       </table>
     </div>
     <br>
     <br><br><br>
<!--**************************************************************************************************************************************************************************-->
                <!-- insrtuctor model -->
                <div class="modal fade" id="editstudentmodel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"> Edit Student Details </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post">
                      <div class="form-group">
                     <label >Student Registration ID:</label>
                   <input type="text" class="form-control" name="std_id" id ="stdid" required readonly>
                   </div>
                  <div class="form-group">
  <label>Student Full Name:</label>
  <input type="text" class="form-control" name="std_name" id ="sdtname" required>
</div>
<div class="form-group">
  <label>Student Birthday:</label>
  <input type="date" class="form-control" name="std_birthday" id ="stdbirthday" required>
</div>
<div class="form-group">
  <label>Student Address:</label>
  <input type="text" class="form-control" name="std_address" id ="stdadd" required>
</div>
<div class="form-group">
<label>  Gender :</label>
<input type="text" class="form-control" name="std_gender" id ="gender"  required> 
</div>
<div class="form-group">
  <label>Student Email Address:</label>
  <input type="text" class="form-control" name="std_email" id ="stdemail" required>
</div>
<div class="form-group">
  <label>Student Contact Number:</label>
  <input type="number" class="form-control" name="std_contact" id ="stdcontact" required>
</div>
<div class="form-group">
  <label>Student School:</label>
  <input type="text" class="form-control" name="std_school" id ="stdschool" required>
</div>
<br>
<div class="form-group">
  <label>Batch:</label>
  <input type="text" class="form-control" name="std_batch" id ="stdbatch" required>
</div>
<div class="form-group">
<label> Course :</label>
<input type="text" name="std_course"  class="form-control" id ="stdcourse" required>
</div>
<div class="form-group">
  <label>Parent Name:</label>
  <input type="text" class="form-control" name="prt_name" id ="prtname" required>
</div>
<div class="form-group">
  <label>Parent Contact Number:</label>
  <input type="text" class="form-control" name="prt_contact" id ="prtcontact" required>
      </div> 
      <label> Course Status :</label>
      <div class="form-check form-check-inline">
      
<input class="form-check-input" type="radio" name="std_stuts" id="coursestu" value="pending" checked>
  <label class="form-check-label" for="exampleRadios1">
 Pending</label>
 </div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="std_stuts" id="coursestu" value="complete" checked>
<label class="form-check-label" for="exampleRadios1">
 Completed</label>
</div>
<br>
<br>
      <div class="form-group">
  <label>Payment:</label>
  <input type="number" class="form-control" name="std_payment" id ="stdpayment" required>
      </div> 
      <div class="form-group">
  <label>Marks:</label>
  <input type="number" class="form-control" name="std_matk" id ="stdmark" required>
      </div>
  <br>
  <div class="d-grid gap-2 d-md-flex justify-content-md-center">
<input type="submit" name="btnupdate" class="btn btn-success me-md-2" value="Update">
<input type="submit" name="btndelete" class="btn btn-danger me-md-2" value="Delete">
<input type="reset"  class="btn btn-primary me-md-2 " value="Reset"></div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>

<!--**************************************************************************************************************************************************************************-->
<?php
// update student details 
if (isset($_POST['btnupdate'])){
  // assingning values to variables
  $stdid = $_POST["std_id"];
    $stdname = $_POST["std_name"];
    $stdbirthday = $_POST["std_birthday"];
    $address = $_POST ["std_address"];
    $gender = $_POST ["std_gender"];
    $email = $_POST ["std_email"];
    $stdcon = $_POST["std_contact"];
    $stdschool = $_POST["std_school"];
    $batch = $_POST["std_batch"];
    $course = $_POST["std_course"];
    $prtname = $_POST["prt_name"];
    $prtcontact = $_POST["prt_contact"];
    $status= $_POST["std_stuts"];
    $payment= $_POST["std_payment"];
    $mark = $_POST["std_matk"];

    // update values
    $sql = "UPDATE student  SET name ='$stdname', birthday ='$stdbirthday', address ='$address', gender ='$gender', email ='$email', contact ='$stdcon', school ='$stdschool', course ='$course', batch ='$batch', prt_name ='$prtname', prt_contact ='$prtcontact', course_status='$status',
               payment ='$payment', mark ='$mark' WHERE std_id ='$stdid'";

    $resultset = mysqli_query($con,$sql);
   if ($resultset){
    ?> 
    <script>
         swal({
          title: "Data Update",
          text: " successfull Data Update",
          icon: "success",
          button: "Ok",
         });
       </script>
   <?php

   }else{
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

<?php
 // delete student data 
 if (isset($_POST['btndelete'])){
   // assingning values to variables
  $stdid = $_POST["std_id"];
  // delete sql
  $sql = "DELETE FROM student WHERE std_id ='$stdid'";

  // chech data is successfully deleted or not
  $rs = mysqli_query($con,$sql);

  if($rs){
   ?> 
   <script>
        swal({
         title: "Data Delete",
         text: " successfull Data Delete",
         icon: "success",
         button: "Ok",
        });
      </script>
  <?php
  } else {
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
<!--**************************************************************************************************************************************************************************-->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
<script src="../Js/sweetalert.min.js"></script>
<script src ="../Js/jquery.min.js"></script>
<!-- javascript part to send table data to the edit form  -->
<script>
  $(document).ready(function(){
    $('.updatebtn').on('click',function(){
      $('#editstudentmodel').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      $('#stdid').val(data[0]);
      $('#sdtname').val(data[1]);
      $('#stdbirthday').val(data[2]);
      $('#stdadd').val(data[3]);
      $('#gender').val(data[4]);
      $('#stdemail').val(data[5]);
      $('#stdcontact').val(data[6]);
      $('#stdschool').val(data[7]);
      $('#stdbatch').val(data[8]);
      $('#stdcourse').val(data[9]);
      $('#prtname').val(data[10]);
      $('#prtcontact').val(data[11]);
      $('#coursestu').val(data[12]);
      $('#stdpayment').val(data[13]);
      $('#stdmark').val(data[14]);
    });

  });
</script>
  </body>
</html>
