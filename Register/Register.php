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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../Admin/Js/sweetalert.min.js"></script>
   <script src ="../Admin/Js/jquery.min.js"></script>
    <title>Dolex English Academy</title>
    <script>
     // display get selected iteam from dropdown menu and display it in text box
     $(function(){
       $("#courseid").change(function(){
         var displaycourse=$("#courseid option:selected").text();
         $("#coursename").val(displaycourse);
       })
     })
   </script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form action="register.php" method="POST" class="appointment-form" id="appointment-form">
                <h2>Registration For a Course </h2>
                <div class="form-group-1">
                    <input type="text" name="stdname" id="name" placeholder="Your Full Name" required />
                    <input type="date" name="stdbirthday"  placeholder="Enter Your Birthday"required />
                    <input type="text" name="stdaddress" placeholder="Your Current Address" required />
                    <input type="email" name="stdemail"  placeholder="Your Email Address " required />
                    <div class="select-list">
                        <select name="stdgender">
                            <option slected value="">Select Your Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <input type="number" name="stdcontact"  placeholder="Your Contact Number" required />
                    <input type="text" name="stdschool" placeholder=" Your School" required />
                </div>
                <div class="form-group-2">
                    <div class="select-list">
                        <select name="courselist" id="courseid">
                            <option seleected value="">Course</option>
                            <?php echo $namelist?>
                        </select>
                    </div>
                <input type="text" name="course" id ="coursename" readonly  required />
                <input type="text" name="prtname" placeholder=" Your Parent/Guardian Name" required />
                <input type="number" name="prtcontact" placeholder=" Your Parent/Guardian Contact Number" required />
                </div>
                <div class="form-submit">
                    <input type="submit" name="btnsubmit" id="submit" class="submit" value="Send Request" />
                </div>
            </form>
        </div>

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
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>