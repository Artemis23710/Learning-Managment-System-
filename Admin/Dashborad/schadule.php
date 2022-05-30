<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>
<?php
// autofill dropdown menu
$sql ="SELECT course_id, cuname FROM course";
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
<h1 style="text-align: center;">Class Schedule Of Dolex Academy </h1>
    <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary me-md-4" data-bs-toggle="modal" data-bs-target="#newschadeuleemodal">+  Add New Schedule</button>
        </div>
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
            <th><h5><b>Action</h5></th>
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
             <td><button class ="btn btn-primary btnedit">Edit</button>
           </tr>
           <?php
         }
         ?>
       </table>
</div>
<script>
     // display get selected iteam from dropdown menu and display it in text box
     $(function(){
       $("#courseid").change(function(){
         var displaycourse=$("#courseid option:selected").text();
         $("#cus_name").val(displaycourse);
       })
     })
   </script>
<!--***************************************************************************************************************************************-->
<!--Marks Data insert modat-->
<div class="modal fade" id="newschadeuleemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" >Add New Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="schadule.php"method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Course</label>
                           <select class="form-select" name="courselist" id ="courseid" required>
                             <?php echo $namelist?>
                           </select>
                           </div>
                        <div class="form-group">
                          <label>  Course :</label>
                          <input type="text" name="Cusname" id ="cus_name" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="input-group mb-3">
                           <select class="form-select" name="day"  required>
                             <option selected> Select Day </option>
                             <option  value="Monday">Monday</option>
                             <option  value="Tuesday">Tuesday</option>
                             <option  value="Wednesday">Wednesday</option>
                             <option  value="Thursday">Thursday</option>
                             <option  value="Friday">Friday</option>
                             <option  value="Saturday">Saturday</option>
                             <option  value="Sunday">Sunday</option>
                           </select>
                           </div>
                        <div class="form-group">
                          <label>  Time :</label>
                          <input type="text" name="time" class="form-control" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Class Link </label>
                            <input type="text" name="classlink" class="form-control" required>
                        </div>
                        <br>
                        <div class="modal-footer">
                        <input type="submit" name="btnsubmit" class="btn btn-success" value="Save">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--**************************************************************************************************************************************************************************-->

      <?php
      // values insert to data base
      if(isset($_POST['btnsubmit'])){
        $cusid = $_POST["courselist"];
        $cusname = $_POST["Cusname"];
        $day = $_POST["day"];
        $time = $_POST["time"];
        $link = $_POST["classlink"];

        // get instructor name and id
        $sl =" SELECT instructor ,teacher_id FROM course WHERE course_id ='$cusid'";
        $restset = mysqli_query($con,$sl);

        while ($row = mysqli_fetch_array($restset)){
          $insname = $row['instructor']; 
          $insid = $row['teacher_id'];
          
      if (!empty($insid) && !empty($insname)){

        $sql = "INSERT INTO schadule ( teacher_id ,  name ,  course ,  course_id ,  class_day ,  time ,  link ) 
        VALUES ('$insid','$insname','$cusname','$cusid','$day','$time','$link')";
     // chech data is successfully entered
       $resultset = mysqli_query($con,$sql);

           if ($resultset){
            ?> 
            <script>
                swal({
                  title: "Data Insert",
                    text: "Data Successfully Inserted",
                    icon: "success",
                    button: "Ok",
                      });
                  </script>
           <?php 
          }else{
          ?> 
                <script>
                    swal({
                    title: "Data Insert",
                    text: " Unsuccessfull Data Insert",
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
               title: "Data Insert",
              text: " Unsuccessfull Data Get From Database",
               icon: "error",
               button: "Ok",
              });
            </script>
          <?php
      }
        }
    }?>
<!--**************************************************************************************************************************************************************************-->
<!--edit modal-->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" >Edit Class Schedule</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="schadule.php"method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>  No :</label>
                          <input type="text" name="schd_id" id ="schdid" class="form-control" readonly required>
                        </div>
                        <div class="form-group">
                          <label>  Instructor :</label>
                          <input type="text" name="instruc" id ="instructor" class="form-control" readonly required>
                        </div>
                         <br>
                        <div class="form-group">
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Course</label>
                           <select class="form-select" name="courselist" id ="courseid" required>
                           <option selected> Select Course </option>
                             <?php echo $namelist?>
                           </select>
                           </div>
                        <div class="form-group">
                          <label>  Course :</label>
                          <input type="text" name="Cusname" id ="cus_name" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="input-group mb-3">
                           <select class="form-select" name="day" id ="classday" required>
                             <option selected> Select Day </option>
                             <option  value="Monday">Monday</option>
                             <option  value="Tuesday">Tuesday</option>
                             <option  value="Wednesday">Wednesday</option>
                             <option  value="Thursday">Thursday</option>
                             <option  value="Friday">Friday</option>
                             <option  value="Saturday">Saturday</option>
                             <option  value="Sunday">Sunday</option>
                           </select>
                           </div>
                        <div class="form-group">
                          <label>  Time :</label>
                          <input type="text" name="time" class="form-control" id ="classtime" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Class Link </label>
                            <input type="text" name="classlink" class="form-control" id ="link" required>
                        </div>
                        <br>
                        <div class="modal-footer">
                        <input type="submit" name="btnupdate" class="btn btn-success me-md-2" value="Update">
                        <input type="submit" name="btndelete" class="btn btn-danger me-md-2" value="Delete">
                       <input type="reset" name="btnreset" class="btn btn-secondary me-md-2" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--**************************************************************************************************************************************************************************-->
<?php
//update class schadule
if(isset($_POST['btnupdate'])){
  $id = $_POST["schd_id"];
  $instructor = $_POST["instruc"];
  $cusid = $_POST["courselist"];
  $cusname = $_POST["Cusname"];
  $day = $_POST["day"];
  $time = $_POST["time"];
  $link = $_POST["classlink"];

  $sql = "UPDATE  schadule  SET  name ='$instructor', course ='$cusname', course_id ='$cusid', class_day ='$day',time ='$time',
            link ='$link' WHERE  id ='$id'";

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

} }
?>
<!--**************************************************************************************************************************************************************************-->
<?php
// delete class schadule
if(isset($_POST['btndelete'])){

  $id = $_POST["schd_id"];
  // delete data from the table
  $sql = "DELETE FROM  schadule  WHERE id ='$id'";
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
}?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!--**************************************************************************************************************************************************************************-->
</div>
<!-- javascript part to send table data to the edit form  -->
<script>
  $(document).ready(function(){
    $('.btnedit').on('click',function(){
      $('#editmodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      $('#schdid').val(data[0]);
      $('#instructor').val(data[1]);
      $('#courseid').val(data[2]);
      $('#classday').val(data[3]);
      $('#classtime').val(data[4]);
      $('#link').val(data[5]);
     
    });

  });
</script>
  </body>
</html>
