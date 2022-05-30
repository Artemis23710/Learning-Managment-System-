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

<?php
// auto number generate (material id)
$sql ="SELECT  lms_id FROM lms order by lms_id desc";
$rsut = mysqli_query($con,$sql);
$row = mysqli_fetch_array($rsut);
$lastcusid = $row['lms_id'];
if (empty($lastcusid)) {
  $number = "LMS-001";
}
else {
  $idd = str_replace("LMS-","",$lastcusid);
  $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
  $number = 'LMS-' .$id;
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
    <script>
     // display get selected iteam from dropdown menu and display it in text box
     $(function(){
       $("#courseid").change(function(){
         var displaycourse=$("#courseid option:selected").text();
         $("#cus_name").val(displaycourse);
       })
     })
   </script>
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
<h1 style="text-align: center;">List Of Learning Materials </h1>
    <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary me-md-4" data-bs-toggle="modal" data-bs-target="#newlmsmodal">+  Add Learning Materials </button>
        </div>
        <br>
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
         $sql ="SELECT * FROM lms";
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
             <td><button class ="btn btn-primary btnedit">Edit</button>
            <a href="downloads.php?file_id=<?php echo $file;?>" class ="btn btn-success" >Download</a>
            
           </tr>
           <?php
         }
         ?>
       </table>


<!--****************************************************************************************************************************************************************************-->
<!--Marks Data insert modat-->
<div class="modal fade" id="newlmsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" >Add Learning Materials</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label> Material ID :</label>
                          <input type="text" name="lms_id" class="form-control" value="<?php echo $number; ?>" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Course</label>
                           <select class="form-select" name="courselist" id ="courseid" required>
                             <?php echo $namelist?>
                           </select>
                           </div>
                           <div class="form-group">
                          <label>  Course :</label>
                          <input type="text" name="lms_course" id ="cus_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>  Week  :</label>
                          <input type="text" name="lms_week" class="form-control" required>
                        </div>
                        <br>

                        <div class="form-group">
                            <label>Description :</label>
                            <input type="text" name="lms_desc" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Material </label>
                            <input type="file" name="lms_file" class="form-control" required>
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
<!--****************************************************************************************************************************************************************************-->
<?php
if(isset($_POST['btnsubmit'])){
  // assing post values to variables
  $lmsid = $_POST["lms_id"];
  $cusid = $_POST["courselist"];
  $cusname = $_POST["lms_course"];
  $week = $_POST["lms_week"];
  $description = $_POST ["lms_desc"];
  $insid = $_SESSION['userid']; 
  
  // assing image to variable to store in the database
  $filename = $_FILES['lms_file']['name']; 
  $destination = '../../Files/' . $filename;
  $file = $_FILES['lms_file']['tmp_name'];
  $size = $_FILES['lms_file']['size'];

  if(move_uploaded_file($file, $destination)){


    $sql ="INSERT INTO lms ( lms_id ,  course_id , cuname , teacher_id , week , description,file) 
          VALUES ('$lmsid','$cusid','$cusname','$insid ','$week','$description','$filename')";

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
}

  }
  
}?>
<!--****************************************************************************************************************************************************************************-->
<!--Marks Data update modat-->
<div class="modal fade" id="editlmsmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel" >Add Learning Materials</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label> Material ID :</label>
                          <input type="text" name="lms_id" class="form-control" id ="lmsid"  readonly>
                        </div>
                        <br>
                           <div class="form-group">
                          <label>  Course :</label>
                          <input type="text" name="lms_course" id ="cus_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                          <label>  Course ID:</label>
                          <input type="text" name="courselist" id ="cus_id" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                          <label>  Week  :</label>
                          <input type="text" name="lms_week" id="lmsweek" class="form-control" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Description :</label>
                            <input type="text" name="lms_desc"  id ="desc"class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Material </label>
                            <input type="file" name="lms_file"  id ="file" class="form-control" required>
                        </div>
                        <br>
                        <div class="modal-footer">
                        <input type="submit" name="btnupdate" class="btn btn-success" value="Update">
                        <input type="submit" name="btndelete" class="btn btn-danger" value="Delete">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
 </div>
</div>
<!--**************************************************************************************************************************************************************************-->
<?php
if(isset($_POST['btnupdate'])){
  // assing post values to variables
  $lmsid = $_POST["lms_id"];
  $cusname = $_POST["lms_course"];
  $cusid = $_POST["courselist"];
  $week = $_POST["lms_week"];
  $description = $_POST ["lms_desc"];
  $insid = $_SESSION['userid']; 
  
  // assing image to variable to store in the database
  $filename = $_FILES['lms_file']['name']; 
  $destination = '../../Files/' . $filename;
  $file = $_FILES['lms_file']['tmp_name'];
  $size = $_FILES['lms_file']['size'];

  if(move_uploaded_file($file, $destination)){


    $sql ="UPDATE lms  SET course_id =' $cusid', cuname ='$cusname', teacher_id ='$insid', week ='$week', description ='$description', file ='$filename' WHERE lms_id ='$lmsid'";

$rset = mysqli_query($con,$sql);
if ($rset){
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
    title: "Data Insert",
    text: " Unsuccessfull Data Updated",
    icon: "error",
    button: "Ok",
   });
 </script>
 <?php
}

  }
  
}?>
<!--**************************************************************************************************************************************************************************-->
<?php
 if(isset($_POST['btndelete'])){
  $lmsid = $_POST["lms_id"];

  $sql = "DELETE FROM  lms WHERE lms_id ='$lmsid'";
  // chech data is successfully updated
  $resut = mysqli_query($con,$sql);

    if ($resut){
      ?> 
          <script>
              swal({
                title: "Data Delete",
                text: "Data Successfully Delete",
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
 <!-- javascript part to send table data to the update form  -->
<script>
  $(document).ready(function(){
    $('.btnedit').on('click',function(){
      $('#editlmsmodal').modal('show');
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
     
    });

  });
</script>
<!--**************************************************************************************************************************************************************************-->
  </body>
</html>
