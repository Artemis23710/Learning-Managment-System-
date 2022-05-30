<?php
session_start(); 
?>

<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <title>Document</title>
</head>
<body>
    <!--**************************************************************************************************************************************************************************-->
                  <!-- DATA get from data base  -->
    <?php
    $stid = $_SESSION['stdid'];

     $sql ="SELECT name,course , course_id FROM student  WHERE std_id ='$stid'";
     $result_set = mysqli_query($con,$sql);
     while ($row = mysqli_fetch_array($result_set)){
         $stname =  $row['name'];
         $course =  $row['course'];
         $cusid = $row['course_id'];
     }
    ?>
    <!--**************************************************************************************************************************************************************************-->
                
    <div class ="container">
        <form action="test.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="cusid">Student ID </label>
            <input type="text" class="form-control" name="std_id" value ="<?php echo $stid;?>" readonly>
        </div>
        <div class="form-group">
            <label for="cusid">Student Name </label>
            <input type="text" class="form-control" name="std_name" value ="<?php echo  $stname;?>" required>
        </div>
        <div class="form-group">
            <label for="cusid">Course </label>
            <input type="text" class="form-control" name="cus_name" value ="<?php echo $course;?>" readonly>
        </div>
            <input type="hidden" class="form-control" name="cou_id" value ="<?php echo $cusid;?>" readonly>
            <br>
            <div class="input-group mb-3">
                           <select class="form-select" name="month"  required>
                             <option selected> Select Month </option>
                             <option  value="January">January</option>
                             <option  value="February">February</option>
                             <option  value="March">March</option>
                             <option  value="April">April</option>
                             <option  value="May">May</option>
                             <option  value="June">June</option>
                             <option  value="July">July</option>
                             <option  value="August">August</option>
                             <option  value="September">September</option>
                             <option  value="October">October</option>
                             <option  value="November">November</option>
                             <option  value="December">December</option>
                           </select>
                           </div>
        <div class="form-group">
            <label for="cusid">Attach fee slip </label>
            <input type="file" class="form-control" name="image" required>
        </div>
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
        <input type="submit" name="btnsubmit" class="btn btn-success me-md-2" value="Send">
        <input type="reset" name="btnreset" class="btn btn-primary me-md-2" value="Reset"> 
        </div>
        </form>
<!--**************************************************************************************************************************************************************************-->
                  <!-- DATA INSER FUNCTION -->
<?php
          if(isset($_POST['btnsubmit'])){
              // assing post values to variables
              $stud_id = $_POST["std_id"];
              $stud_name = $_POST["std_name"];
              $cus_name = $_POST["cus_name"];
              $cus_id = $_POST["cou_id"];
              $month = $_POST["month"]; 
              // assing image to variable to store in the database
//declare variables
               $image = $_FILES['image']['tmp_name'];
               $name = $_FILES['image']['name'];
               $image = base64_encode(file_get_contents(addslashes($image)));

                //insert data to data dable
           $sql = "INSERT INTO payment_request ( std_id ,  name ,  course ,  course_id ,  month ,  slip ) 
                    VALUES ('$stud_id','$stud_name','$cus_name','$cus_id','$month ','$image')"; 
                     $resultset = mysqli_query($con,$sql);
                     if ($resultset){
                        ?> 
                        <script>
                             swal({
                              title: "Data Insert",
                              text: " successfull Data Insert",
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
          }
?>
<!--**************************************************************************************************************************************************************************-->
    </div>
</body>
</html>