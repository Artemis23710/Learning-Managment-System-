<?php
session_start(); 
?>

<?php // connect database connection file
 require_once '../../DBConnection/connection.php'; ?>




<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="../Res/fonts/icomoon/style.css">
    <link rel="stylesheet" href="../Res/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../Res/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="../Res/css/style.css">
    <title></title>
  </head>
  <body style ="background:#e6ffff;">


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo">
            <img src="../img/newlogo.png" alt="logo">
            </div>

            <div class="col-12">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="../Dashboard/mainpanel.php" class="nav-link">Dashboard</a></li>
                  <li><a href="../LMS/mainpanel.php" class="nav-link">Learning Materials</a></li>


                  <li>
                    <a href="../Payment/mainpanel.php" class="nav-link">Class Payment</a>
                     </li>

                  <li><a href="../Profile/mainpanel.php" class="nav-link">My Profile</a></li>

                  <li><a href="../../Logout.php" class="nav-link">Logout</a></li>
                </ul>
              </nav>

            </div>
            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          </div>
        </div>
      </header>
<br>
<br>
<br>
<!--**************************************************************************************************************************************************************************-->
                  <!-- DATA get from data base  -->
                  <?php
                  
    $stid = $_SESSION['userid'];

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

    <h1 style="text-align: center;">Send  Class  Payment </h1>
        <form action="mainpanel.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="cusid"> Student ID </label>
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
            <div class="form-group">
                           <label>Batch : </label>
                           <input type="number" name="batch" class="form-control" required>
                         </div>
                  <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Payment Month</label>
                  </div>
                       <select class="custom-select" id="inputGroupSelect01" name="month"  required>
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
<br>
                        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Attach fee slip </span>
            </div>
             <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image" required>
                  <label class="custom-file-label" for="inputGroupFile01"></label>
               </div>
             </div>
        <br>
        <div class=" justify-content-md-center">
        <input type="submit" name="btnsubmit" class="btn btn-success btn-lg btn-block" value="Send">
        <br>
        <input type="reset" name="btnreset" class="btn btn-primary btn-lg btn-block" value="Reset"> 
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
              $batch = $_POST ["batch"];
              $month = $_POST["month"]; 
              // assing image to variable to store in the database
//declare variables
               $name = $_FILES['image']['name'];
               
               $source = $_FILES['image']['tmp_name'];

               $destination = "../../Image/".$name;

               if(move_uploaded_file($source, $destination)){
              
                //insert data to data dable
           $sql = "INSERT INTO payment_request ( std_id ,  name ,  course ,  course_id ,batch, month ,  slip ) 
                    VALUES ('$stud_id','$stud_name','$cus_name','$cus_id','$batch','$month ','$name')"; 
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
   }
?>
<!--**************************************************************************************************************************************************************************-->
    </div>
    <script src="../Js/jquery-3.3.1.min.js"></script>
    <script src="../Js/popper.min.js"></script>
    <script src="../Js/bootstrap.min.js"></script>
    <script src="../Js/jquery.sticky.js"></script>
    <script src="../Js/main.js"></script>
    <script src="../Js/sweetalert.min.js"></script>
  </body>
  

</html>