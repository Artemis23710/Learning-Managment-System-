<?php // connect database connection file
require_Once ('../DBConnection/connection.php');
?>
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
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../Admin/Bootstrap/css/bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
   <script src="../Admin/Js/sweetalert.min.js"></script>
   <script src ="../Admin/Js/jquery.min.js"></script>
   <title>Document</title>

   <script>
     // display get selected iteam from dropdown menu and display it in text box
     $(function(){
       $("#courseid").change(function(){
         var displaycourse=$("#courseid option:selected").text();
         $("#coursename").val(displaycourse);
       })
     })
   </script>
 </head>
 <body>
   <div class="container">
     <form action="" method="post">
       <h2>Registration For a Course </h2>
      <div class="form-group">
        <label> Enter Your Full Name:</label>
        <input type="text" name="stdname" class="form-control" required>
      </div>
      <div class="form-group">
        <label> Enter Your Birthday:</label>
        <input type="date" name="stdbirthday" class="form-control" required>
      </div>
      <div class="form-group">
        <label> Enter Your Current Address :</label>
        <input type="text" name="stdaddress" class="form-control" required>
      </div>
      <div class="form-group">
        <label> Enter Your Email Address :</label>
        <input type="email" name="stdemail" class="form-control" required>
      </div>
      <br>
      <label> Select Your Gender :</label>
      <div class="form-check form-check-inline">
      
         <input class="form-check-input" type="radio" name="stdgender" id="exampleRadios1" value="male" checked>
         <label class="form-check-label" for="exampleRadios1">
           Male
         </label>
         </div>
         <div class="form-check form-check-inline">
         <input class="form-check-input" type="radio" name="stdgender" id="exampleRadios2" value="female" checked>
         <label class="form-check-label" for="exampleRadios1">
           Female
         </label>
         </div>
         <br>
      <div class="form-group">
        <label> Enter Your Contact Number :</label>
        <input type="number" name="stdcontact" class="form-control" required>
      </div>
      <div class="form-group">
        <label> Enter Your School :</label>
        <input type="text" name="stdschool" class="form-control" required>
      </div>
      <br>
      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Course</label>
        <select class="form-select" name="courselist" id="courseid" required>
            <?php echo $namelist?>
         </select>
         </div>
         <div class="form-group">
        <label> Course :</label>
        <input type="text" name="course" id ="coursename" class="form-control" readonly required>
      </div>
         <div class="form-group">
        <label> Enter Your Parent/Guardian Name :</label>
        <input type="text" name="prtname" class="form-control" required>
      </div>
      <div class="form-group">
        <label> Enter Your Parent/Guardian Contact Number :</label>
        <input type="number" name="prtcontact" class="form-control" required>
      </div>
      <div class="modal-footer">
        <input type="submit" name="btnsubmit" class="btn btn-success" value="Save">
        <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
      </div>
     </form>
   </div>
   <!--**************************************************************************************************************************************************************************-->
                  <!-- DATA INSER FUNCTION -->
  <?php
  if(isset($_POST['btnsubmit'])){
    // assing post values to variables
    $stdname = $_POST["stdname"];
    $stdbirthday = $_POST["stdbirthday"];
    $address = $_POST ["stdaddress"];
    $gender = $_POST ["stdgender"];
    $email = $_POST ["stdemail"];
    $stdcon = $_POST["stdcontact"];
    $stdschool = $_POST["stdschool"];
    $courseid = $_POST["courselist"];
    $course = $_POST["course"];
    $prtname = $_POST["prtname"];
    $prtcontact = $_POST["prtcontact"];

    //insert data to data dable
    $sql = "INSERT INTO reg_request(name ,birthday,address,gender,email,contact,school,course,course_id,prt_name,prt_contact)
    VALUES ('{$stdname}','{$stdbirthday}','{$address}','{$gender}','{$email}','{$stdcon}','{$stdschool}','{$course}','{$courseid}','{$prtname}','{$prtcontact}')";
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

 </body>
 </html>
