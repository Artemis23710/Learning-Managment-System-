<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>

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
<div class ="container">
<h1 style="text-align: center;"> Check Payment Request </h1>
<?php
     // get request id from table 
  if(isset($_GET['$rqid'])){
    $reid =$_GET['$rqid'];
  
    $sql ="SELECT * FROM payment_request  WHERE reqid ='$reid'"; 
    $result_set = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result_set)){
      ?>
      <form action="newpanal.php" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="cusid">Request ID </label>
                          <input type="text" class="form-control" name="req_id" value ="<?php echo $row['reqid'];?>" readonly>
                        </div>
                      <div class="form-group">
                          <label for="cusid">Student ID </label>
                          <input type="text" class="form-control" name="std_id" value ="<?php echo $row['std_id'];?>" required>
                        </div>
                        <div class="form-group">
                          <label for="cusid">Student Name </label>
                          <input type="text" class="form-control" name="std_name" value ="<?php echo $row['name'];?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                          <label for="cusid">Course ID </label>
                          <input type="text" class="form-control" name="std_courseid" value ="<?php echo $row['course_id'];?>" required>
                        </div>
                        <div class="form-group">
                          <label for="cusid">Course </label>
                          <input type="text" class="form-control" name="cus_name"  value ="<?php echo $row['course'];?>"  required>
                        </div>
                        <br>
                        <div class="form-group">
                           <label>Batch : </label>
                           <input type="number" name="batch" class="form-control" value ="<?php echo $row['batch'];?>" required>
                         </div> 
                        <div class="form-group">
                          <label for="cusid">Payment Month</label>
                          <input type="text" class="form-control" name="month"  value ="<?php echo $row['month'];?>"  required>
                        </div>
                        <div class="form-group">
                          <label for="cusid">Payment </label>
                          <input type="number" class="form-control" name="payment"   required>
                        </div>
                        <div class="form-group">
                          <label for="cusid">Payment  Date</label>
                          <input type="date" class="form-control" name="payment_date" required>
                        </div>
                        <br><br>
                        <img src="../../Image/<?php echo $row['slip'];?>" width = "500px" height = "800px">
                        <br><br>
                        <div class="modal-footer">
                        <input type="submit" name="btnsubmit" class="btn btn-success" value="Save">
                       <input type="reset" name="btnreset" class="btn btn-secondary" value="Reset"> 
                        </div>
                      </form>
    <?php
  }

  }
  ?>
<!--**************************************************************************************************************************************************************************-->
                  <!-- DATA INSER FUNCTION -->
                  <?php
       if(isset($_POST['btnsubmit'])){
               // assing post values to variables
    $reqid = $_POST["req_id"];
    $stdid = $_POST["std_id"];
    $stdname = $_POST["std_name"];
    $cusname = $_POST["cus_name"];
    $cusid = $_POST["std_courseid"];
    $batch = $_POST ["batch"];
    $pay_month = $_POST["month"];
    $payment = $_POST["payment"];
    $pay_date = $_POST["payment_date"];

    //insert data to data dable
    $sql = "INSERT INTO  payment ( std_id ,  name ,  course , course_id ,batch , month ,  payment , pay_date ) 
            VALUES ('{$stdid}','{$stdname}','{$cusname}','{$cusid}','{$batch}','{$pay_month}','{$payment}','{$pay_date}')";
    $rs = mysqli_query($con,$sql);

    if($rs){
      $sql = "DELETE FROM payment_request WHERE reqid ='$reqid'";

      // chech data is successfully deleted or not
       $rst = mysqli_query($con,$sql);

              if($rst){
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
    } else {
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

}?>
<!--**************************************************************************************************************************************************************************-->
<div class ="container">

</div>
</div>
  </body>
</html>
