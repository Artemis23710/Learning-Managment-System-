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
         $("#cusname").val(displaycourse);
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
<div class ="container">
  <!--******************************************************************************************************************************************************************************-->
<h1 style="text-align: center;">List Of Payment Request </h1>
    <!-- Display all data base data into table-->
        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary me-md-4" data-bs-toggle="modal" data-bs-target="#newpaymentemodal">+  New Payment</button>
        </div>
        <br>
    <div class ="jumbotron">
      <table class="table  table-striped table-hover table-bordered border-dark align-middle">
        <thead class="table-primary">
          <tr>
          <th><h6><b>Request ID</h6></th>
          <th><h6><b>Student ID</h6></th>
          <th><h6><b>Student Name</h6></th>
          <th><h6><b>Course</h6></th>
          <th><h6><b>Batch</h6></th>
          <th><h6><b>Month</h6></th>
          <th><h6><b>Action</h6></th>
          </tr>
        </thead>
        <?php
         $sql ="SELECT * FROM payment_request";
         $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){
           $reqid = $row['reqid'];
        ?>
        <tr>
        <td><?php echo $reqid?></td>
             <td><?php echo $row['std_id'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['batch'];?></td>
             <td><?php echo $row['month'];?></td>
             <td>
               <a href="newpanal.php?$rqid=<?php echo $reqid;?>" class ="btn btn-primary ">Check</a>
            </td>
        </tr>
        <?php
        }?>
      </table>
    </div>
</div>
<div class="modal fade" id="newpaymentemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Add New Payment</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                      <form action="mainpanel.php" method="post">
                      <div class="form-group">
                          <label for="cusid">Student ID </label>
                          <input type="text" class="form-control" name="std_id" required>
                        </div>
                        <div class="form-group">
                          <label for="cusid">Student Name </label>
                          <input type="text" class="form-control" name="std_name" required>
                        </div>
                        <br>
                        <div class="input-group mb-3">
                           <label class="input-group-text" for="inputGroupSelect01">Select course :</label>
                           <select class="form-select" name="std_courseid" id="courseid" required>
                            <?php echo $namelist?>
                             </select>
                           </div>
                        <div class="form-group">
                          <label for="cusid">Course </label>
                          <input type="text" class="form-control" name="cus_name" id ="cusname" required>
                        </div>
                        <br>
                        <div class="form-group">
                           <label>Batch : </label>
                           <input type="number" name="batch" class="form-control" required>
                         </div> 
                        <div class="input-group mb-3">
                           <select class="form-select" name="month"  required>
                             <option selected> Select Payment Month </option>
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
                          <label for="cusid">Payment </label>
                          <input type="number" class="form-control" name="payment" required>
                        </div>
                        <div class="form-group">
                          <label for="cusid">Payment  Date</label>
                          <input type="date" class="form-control" name="payment_date" required>
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
  
<h1 style="text-align: center;">Search Payment Record </h1>
<br>
<br>
<form action="mainpanel.php" method="post">
<div class="form-group">
 <label for="cusid"> Enter Student ID </label>
  <input type="text" class="form-control" name="serch_id" required>
  <br>
  <input type="submit" name="btnsearch" class="btn btn-success" value="Search">
  </div>
</form>
<br>
<br>
<!--******************************************************************************************************************************************************************************-->
 <!--Search payment records-->
 <?php
     if(isset($_POST['btnsearch'])){
      $serch = $_POST["serch_id"];

      $sql = "SELECT * FROM payment  WHERE std_id = '$serch'";

      $resultset = mysqli_query($con,$sql);
      if ($resultset){
        ?>
        <table class="table  table-striped table-hover table-bordered border-dark align-middle">
          <thead class="table-primary">
         <tr>
          <th><h6><b>Payment ID</h6></th>
          <th><h6><b>Student ID</h6></th>
          <th><h6><b>Student Name</h6></th>
          <th><h6><b>Course</h6></th>
          <th><h6><b>Month</h6></th>
          <th><h6><b>Payment</h6></th>
          <th><h6><b> Date</h6></th>
          </tr>
        </thead>
        <?php
        while ($row = mysqli_fetch_array($resultset)){
        ?> 
        <tr>
             <td><?php echo $row['payid'];?></td>
             <td><?php echo $row['std_id'];?></td>
             <td><?php echo $row['name'];?></td>
             <td><?php echo $row['course'];?></td>
             <td><?php echo $row['month'];?></td>
             <td><?php echo $row['payment'];?></td>
             <td><?php echo $row['pay_date'];?></td>
             </tr>
       
<?php }
    ?> </table> <?php }else{
        ?> 
        <script>
             swal({
              title: "Search Data ",
              text: " Data Record Not Available",
              icon: "error",
              button: "Ok",
             });
           </script>
       <?php
      }
     }?>
<!--******************************************************************************************************************************************************************************-->
</div>
</div>
  </body>
</html>
