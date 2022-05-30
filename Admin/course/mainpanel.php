<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

<?php
// auto number generate (course id)
$sql ="SELECT  course_id FROM course order by course_id desc";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$lastcusid = $row['course_id'];
if (empty($lastcusid)) {
  $number = "DEC001";
}
else {
  $idd = str_replace("DEC","",$lastcusid);
  $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
  $number = 'DEC' .$id;
}
?>
<?php
// autofill dropdown menu
$sql ="SELECT  teacher_id,name FROM teacher";
$result = mysqli_query($con,$sql);

$namelist ='';
while($rest = mysqli_fetch_assoc($result)){
  $namelist.= "<option value=\"{$rest['teacher_id']}\">{$rest['name']}</option>";
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
    <script>
     // display get selected iteam from dropdown menu and display it in text box
     $(function(){
       $("#insid").change(function(){
         var displaycourse=$("#insid option:selected").text();
         $("#insname").val(displaycourse);
       })
     })
   </script>
    <script>
     // display get selected iteam from dropdown menu and display it in text box in update modal
     $(function(){
       $("#updinsructor").change(function(){
         var displaycourse=$("#updinsructor option:selected").text();
         $("#updinsname").val(displaycourse);
       })
     })
   </script>
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
<!--***************************************************************************************************************************************-->
<div class="container">
   <h1 style="text-align: center;">Course Informations </h1>
    <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary me-md-4" data-bs-toggle="modal" data-bs-target="#newcoursemodal">+  New Course</button>
        </div>
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
            <th><h5><b>Action</h5></th>
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
             <td>
               <button class ="btn btn-primary updatebtn">Edit</button>
               <br>
               <br>
               <button class ="btn btn-danger deletebtn">Image </button>
            </td>
           </tr>
           <?php
         }
         ?>
       </table>
     </div>   
</div>

<!--***************************************************************************************************************************************-->
<!--Course Data insert modat-->
<div class="modal fade" id="newcoursemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add New Course</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="cusid">Course ID </label>
                          <input type="text" class="form-control" name="cus_id" value="<?php echo $number; ?>"readonly>
                        </div>
                        <div class="form-group">
                          <label>  Name Of The Course :</label>
                          <input type="text" name="cusname" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label>Description about The Course </label>
                       <textarea class ="form-control" name="cusdiscrp" cols="20" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Enroll Date of the Course </label>
                            <input type="date" name="enrlldate" class="form-control" required>
                        </div>
                        <div class="form-group">
                           <label>Price Of The Course </label>
                           <input type="number" name="cscost" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Instructor</label>
                           <select class="form-select" name="instreuctorlist" id ="insid" required>
                             <?php echo $namelist?>
                           </select>
                        </div>
                        <div class="form-group">
                          <label>  Name Of The  Instructor :</label>
                          <input type="text" name="cusinstruc"  class="form-control" id ="insname" required>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <input type="file" class="form-control" name="cusimage"  id="delimg">
                          <label class="input-group-text" for="inputGroupFile02">Image</label>
                        </div>
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
    $cusid = $_POST["cus_id"];
    $cusname = $_POST["cusname"];
    $description = $_POST ["cusdiscrp"];
    $enrll = $_POST["enrlldate"];
    $cost = $_POST["cscost"];
    $insid = $_POST["instreuctorlist"];
    $instructor = $_POST["cusinstruc"];
    // assing image to variable to store in the database
  

       // $name = $_FILES['cusimage']['name'];

       //$source = $_FILES['cusimage']['tmp_name'];

      //$destination = "../../Image/".$name;

    //if(move_uploaded_file($source, $destination)){

    //insert data to data dable

    $sql = "INSERT INTO course(course_id,cuname,descrp,enroll_date,cost,instructor,teacher_id)
    VALUES ('{$cusid}','{$cusname}','{$description}','{$enrll}','{$cost}','{$instructor}','{$insid}')";
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
     }
     
    
  }
  ?>
<!--***************************************************************************************************************************************-->
<!--Course Data Update modal-->
<div class="modal fade" id="courseupdatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update Course Information</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="cusid">Course ID </label>
                          <input type="text" class="form-control" name="updcus_id" id="updcus_id"readonly>
                        </div>
                        <div class="form-group">
                          <label>  Name Of The Course :</label>
                          <input type="text" name="updcusname" class="form-control" id="updcusname" required>
                        </div>
                        <div class="form-group">
                        <label>Description about The Course </label>
                       <textarea class ="form-control" name="updcusdiscrp" cols="20" rows="5" id="upddiscrp" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Enroll Date of the Course </label>
                            <input type="date" name="updenrlldate" class="form-control" id="updenrll" required>
                        </div>
                        <div class="form-group">
                           <label>Price Of The Course </label>
                           <input type="number" name="updcscost" class="form-control" id="updcost" required>
                        </div>
                        <div class="input-group mb-3">
                          <label class="input-group-text" for="inputGroupSelect01">Instructor</label>
                           <select class="form-select" name="updinstreuctorlist" id="updinsructor" required>
                             <?php echo $namelist?>
                           </select>
                        </div>
                        <div class="form-group">
                          <label>  Name Of The  Instructor :</label>
                          <input type="text" name="updcusinstruc"  class="form-control" id ="updinsname" required>
                        </div>
                        <br>
                        <div class="modal-footer">
                        <input type="submit" name="btnupdate" class="btn btn-success" value="Update">
                        <input type="submit" name="btndelete" class="btn btn-danger" value="Delete">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value ="Close">
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--***************************************************************************************************************************************-->
<!-- DATA update FUNCTION -->
<?php
  if(isset($_POST['btnupdate'])){
    // assing post values to variables
    $cusid = $_POST["updcus_id"];
    $cusname = $_POST["updcusname"];
    $description = $_POST ["updcusdiscrp"];
    $enrll = $_POST["updenrlldate"];
    $cost = $_POST["updcscost"];
    $instructorid = $_POST["updinstreuctorlist"];
    $instructor = $_POST["updcusinstruc"];
    // assing image to variable to store in the database
  

    //update data to data dable

    $sql = "UPDATE `course` SET cuname ='$cusname',descrp ='$description',enroll_date ='$enrll',cost='$cost',instructor='$instructor',teacher_id='$instructorid' WHERE course_id ='$cusid'";

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
  }
  ?>
<!--**************************************************************************************************************************************************************************-->
<!--  Image update Modal -->
<div class="modal fade" id="coursedeletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Update Course Image</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php"method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="cusid">Course ID </label>
                          <input type="text" class="form-control" name="deltcus_id" id="delcus_id"readonly>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <input type="file" class="form-control" name="detlcusimage"  id="delimg">
                          <label class="input-group-text" for="inputGroupFile02">Image</label>
                        </div>
                        <div class="modal-footer">
                        <input type="submit" name="btnchange" class="btn btn-success" value="Change">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value ="Close">
                       </div>
                      </form>
                    </div>
                    </div>
                  </div>
                </div>
<!--**************************************************************************************************************************************************************************-->
<!--UPDATE IMAGE FUNCTION-->
<?php 
  if (isset($_POST['btnchange'])){
    $cusid = $_POST["deltcus_id"];

    if(isset($_FILES['detlcusimage']['name'])) {

      $name = $_FILES['detlcusimage']['name'];

      $source = $_FILES['detlcusimage']['tmp_name'];
  
      $destination = "../../Image/".$name;

             if(move_uploaded_file($source, $destination)){

              $sql = "UPDATE course SET img ='{$name}' WHERE course_id ='{$cusid}'";

              $reslt = mysqli_query($con,$sql);
              if($reslt){
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

  
    }else{
      ?> 
      <script>
        swal({
                    title: "Image Not Insert",
                     text: " Insert An Image",
                     icon: "error",
                     button: "Ok",
        });
      </script>
      <?php

    }
  }
?>

<!--**************************************************************************************************************************************************************************-->
 
<!-- DATA DELETE FUNCTION -->
 <?php

if(isset($_POST['btndelete'])){
  // assing post values to variables
  $cusid = $_POST["updcus_id"];
   


  // delete data from the table
  $sql = "DELETE FROM course WHERE course_id ='$cusid'";

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

 }  
 ?>


</div>
<!--**************************************************************************************************************************************************************************-->

<script src="../Js/jquery-3.3.1.min.js"></script>
    <script src="../Js/popper.min.js"></script>
    <script src="../Js/bootstrap.min.js"></script>
    <script src="../Js/jquery.sticky.js"></script>
    <script src="../Js/main.js"></script>
<!-- javascript part to send table data to the update form  -->
<script>
  $(document).ready(function(){
    $('.updatebtn').on('click',function(){
      $('#courseupdatemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);
      $('#updcus_id').val(data[0]);
      $('#updcusname').val(data[1]);
      $('#upddiscrp').val(data[2]);
      $('#updenrll').val(data[3]);
      $('#updcost').val(data[4]);
      $('#updinsname').val(data[5]);
      $('#updinsructor').val(data[6]);
      $('#updimg').val(data[7]);
     
    });

  });
</script>
<!-- javascript part to send table data to the Delete form  -->
<script>
  $(document).ready(function(){
    $('.deletebtn').on('click',function(){
      $('#coursedeletemodal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      console.log(data);

      
      $('#delcus_id').val(data[0]);
    });

  });
</script>
  </body>
</html>
