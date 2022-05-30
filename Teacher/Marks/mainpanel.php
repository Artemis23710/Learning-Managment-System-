<?php
session_start(); 
?>
<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
// get session variable 
$insid = $_SESSION['userid']; 
// autofill dropdown menu
$sql ="SELECT course_id, cuname FROM course WHERE teacher_id ='{$insid}'";
$result = mysqli_query($con,$sql);

$namelist ='';
while($rest = mysqli_fetch_assoc($result)){
  $namelist.= "<option value=\"{$rest['course_id']}\">{$rest['cuname']}</option>";
}
?>
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
<div class ="container">
<h1 style="text-align: center;">List Of Student Marks</h1>
    <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary me-md-4" data-bs-toggle="modal" data-bs-target="#newmarksemodal">+  Add Marks</button>
        </div>
        <br>

        <div>
       <table class="table  table-striped table-hover table-bordered border-dark align-middle">
         <thead class="table-primary">
         <tr>
            <th><h5><b>No</h5></th>
            <th><h5><b>Course ID</h5></th>
            <th><h5><b>Batch</h5></th>
            <th><h5><b>Student ID </h5></th>
            <th><h5><b>Student Name</h5></th>
            <th><h5><b>Writing</h5></th>
            <th><h5><b>Reading</h5></th>
            <th><h5><b>Listening</h5></th>
            <th><h5><b>Speaking</h5></th>
            <th><h5><b>Action</h5></th>
             </tr>
         </thead>
         <?php
         // get session variable 
         $insid = $_SESSION['userid']; 
         // get all marks 
         $sql ="SELECT * FROM mark WHERE teacher_id ='$insid'";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           ?>
           <tr>
             <td><?php echo $row['mark_id'];?></td>
             <td><?php echo $row['course_id'];?></td>
             <td><?php echo $row['batch'];?></td>
             <td><?php echo $row['std_id'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['writing'];?></td>
             <td><?php echo $row['reading'];?></td>
             <td><?php echo $row['listing'];?></td>
             <td><?php echo $row['speaking'];?></td>
             <td><button class ="btn btn-primary updatebtn">Edit</button></td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>   
<!--***************************************************************************************************************************************-->
<!--Marks Data insert modat-->
<div class="modal fade" id="newmarksemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" >Add Student Marks</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Course</label>
                           <select class="form-select" name="courselist" required>
                             <?php echo $namelist?>
                           </select>
                           </div>
                           <div class="form-group">
                            <label>Batch : </label>
                            <input type="number" name="batch" class="form-control" required>
                             </div> 
                        <div class="form-group">
                          <label>  Student ID  :</label>
                          <input type="text" name="stdid" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                          <label>  Student Name  :</label>
                          <input type="text" name="stdname" class="form-control" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Mark For Writing </label>
                            <input type="number" name="mrkwriting" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Mark For Reading </label>
                            <input type="number" name="mrkreading" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Mark For Listening </label>
                            <input type="number" name="mrklisting" class="form-control" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Mark For Speaking </label>
                            <input type="number" name="mrkspeaking" class="form-control" required>
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
                  <!-- DATA INSER FUNCTION -->
        <?php
if(isset($_POST['btnsubmit'])){
  // assing post values to variables
  $cusid = $_POST["courselist"];
  $batch = $_POST ["batch"];
  $stdid =$_POST["stdid"];
  $stdname =$_POST["stdname"];
  $writing =$_POST["mrkwriting"];
  $reading =$_POST["mrkreading"];
  $listing =$_POST["mrklisting"];
  $speaking =$_POST["mrkspeaking"];
  $insid = $_SESSION['userid']; 

  $sql = "INSERT INTO  mark ( course_id ,batch , teacher_id ,  std_id ,  name ,  writing ,  reading ,  listing ,  speaking )
           VALUES ('{$cusid}','{$batch}','{$insid}','{$stdid}','{$stdname}','{$writing}','{$reading}','{$listing}','{$speaking}')";
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
 } 
 else {
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
 } }?>
<!--***************************************************************************************************************************************-->
<!--Marks Data edit and delete modat-->
<div class="modal fade" id="editmarksemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" >Edit Student Marks</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label>  Mark ID  :</label>
                          <input type="number" name="edtmrkid" class="form-control" id ="edtmrkid" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Course</label>
                           <select class="form-select" name="edtcourselist" id ="edtcusid" required>
                             <?php echo $namelist?>
                           </select>
                           </div>
                           <br>
                        <div class="form-group">
                          <label>  Student ID  :</label>
                          <input type="text" name="edtstdid" class="form-control" id ="edtstdid" required>
                        </div>
                        <br>
                        <div class="form-group">
                          <label>  Student Name  :</label>
                          <input type="text" name="edtstdname" class="form-control" id ="edtstdname" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Mark For Writing </label>
                            <input type="number" name="edtmrkwriting" class="form-control" id ="edtwrite" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Mark For Reading </label>
                            <input type="number" name="edtmrkreading" class="form-control" id ="edtread" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Mark For Listening </label>
                            <input type="number" name="edtmrklisting" class="form-control" id ="edtlisting" required>
                        </div>
                       
                        <div class="form-group">
                            <label>Mark For Speaking </label>
                            <input type="number" name="edtmrkspeaking" class="form-control" id ="edtspeak" required>
                        </div>
                        <br>
                        <div class="modal-footer">
                        <input type="submit" name="btnupdate" class="btn btn-success" value="Update">
                        <input type="submit" name="btndelete" class="btn btn-success" value="Delete">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--**************************************************************************************************************************************************************************-->
<!--marks update funtion -->
<?php
if(isset($_POST['btnupdate'])){
  // assing post values to variables
  $markid =$_POST["edtmrkid"];
  $edtcusid = $_POST["edtcourselist"];
  $edtstdid =$_POST["edtstdid"];
  $edtstdname =$_POST["edtstdname"];
  $edtwriting =$_POST["edtmrkwriting"];
  $edtreading =$_POST["edtmrkreading"];
  $edtlisting =$_POST["edtmrklisting"];
  $edtspeaking =$_POST["edtmrkspeaking"];
  $insid = $_SESSION['userid']; 

  $sql = "UPDATE mark SET course_id ='$edtcusid', teacher_id ='$insid', std_id ='$edtstdid', name ='$edtstdname', writing ='$edtwriting', reading ='$edtreading', listing ='$edtlisting', speaking ='$edtspeaking' WHERE mark_id ='$markid'";
 // chech data is successfully updated
 $rst = mysqli_query($con,$sql);
 if ($rst){
  ?> 
  <script>
   swal({
                 title: "Data Update",
                 text: "Data Successfully Updated",
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
                title: "Data Update",
                 text: " Unsuccessfull Data Update",
                 icon: "error",
                 button: "Ok",
    });
  </script>
  <?php
 }

}?>

<!--**************************************************************************************************************************************************************************-->
<!--marks delete funtion -->
<?php
if(isset($_POST['btndelete'])){
  // assing post values to variables
  $markid =$_POST["edtmrkid"];
  $edtcusid = $_POST["edtcourselist"];
  $edtstdid =$_POST["edtstdid"];
  $edtstdname =$_POST["edtstdname"];
  $edtwriting =$_POST["edtmrkwriting"];
  $edtreading =$_POST["edtmrkreading"];
  $edtlisting =$_POST["edtmrklisting"];
  $edtspeaking =$_POST["edtmrkspeaking"];
  $insid = $_SESSION['userid']; 

  $sql ="DELETE FROM  mark  WHERE mark_id ='$markid'";

   // chech data is successfully deleted or not
  $rs = mysqli_query($con,$sql);
  if ($rs) {
    ?> 
    <script>
      swal({
       title: "Data Delete",
       text: "Data Successfully Deleted",
       icon: "success",
       button: "Ok",
      });
    </script>
    <?php
   }
   else{
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
<!--**************************************************************************************************************************************************************************-->
</div>
</div>

<!-- javascript part to send table data to the edit form  -->
<script>
  $(document).ready(function(){
    $('.updatebtn').on('click',function(){
      $('#editmarksemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#edtmrkid').val(data[0]);
      $('#edtcusid').val(data[1]);
      $('#edtstdid').val(data[2]);
      $('#edtstdname').val(data[3]);
      $('#edtwrite').val(data[4]);
      $('#edtread').val(data[5]);
      $('#edtlisting').val(data[6]);
      $('#edtspeak').val(data[7]);
     
    });

  });
</script>
<script>
 
</script>
  </body>
</html>
