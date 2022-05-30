<?php // connect database connection file
require_Once ('DBConnection/connection.php');
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
<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="Ecology Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolex English Academy</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Goole Font -->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">
    <!-- Font awsome CSS -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">    
    <link rel="stylesheet" href="css/assets/flaticon.css">
    <link rel="stylesheet" href="css/assets/magnific-popup.css">    
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/assets/owl.carousel.css">
    <link rel="stylesheet" href="css/assets/owl.theme.css">     
    <link rel="stylesheet" href="css/assets/animate.css"> 
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="css/assets/slick.css">  
    <!-- Mean Menu-->
    <link rel="stylesheet" href="css/assets/meanmenu.css">
    <!-- main style-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/demo.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <!-- Font Icon -->

    <link rel="stylesheet" href="Register/css/newstyle.css">
        <script src="Admin/Js/sweetalert.min.js"></script>
   <script src ="Admin/Js/jquery.min.js"></script>
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
<header class="header_inner blog_page">
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>    
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="info_wrapper">
                        <div class="contact_info">                   
                            <ul class="list-unstyled">
                            <li><i class="flaticon-phone-receiver"></i>071 250 2008</li>
                                <li><i class="flaticon-mail-black-envelope-symbol"></i>dolewatteacademy@gmail.com</li>
                            </ul>                    
                        </div>
                        <div class="login_info">
                             <ul class="d-flex">
                                <li class="nav-item"><a href="Login.php" class="nav-link join_now js-modal-show"><i class="flaticon-padlock"></i>Log In</a></li>
                            </ul>
                            <a href="Registration.php" title="" class="apply_btn">Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="edu_nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light bg-faded">
                <a class="navbar-brand" href="index-2.html"><img src="images/logo.png" alt="logo"></a>
                <div class="collapse navbar-collapse main-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav nav lavalamp ml-auto menu">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="course.php" class="nav-link">Courses</a>
                        </li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </div> 
            </nav><!-- END NAVBAR -->
        </div> 
    </div>

</header> <!-- End Header -->
<div class ="con-body">
    <br>
<div class="conta">
   <form action="Registration.php" method="POST" class="appointment-form" id="appointment-form">
                <h2>Registration For a Course </h2>
                <br>
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
<br>
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
  }?>
<footer class="footer_2">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col footer_intro">
                        <img src="images/logo2.png" alt="" class="f_logo">
                        <p>Many people have broken their life journey because of misunderstanding exactly what they need to succeed their career, that they think just speaking English will provide improvement of their jobs but the reality is that we exactly need our writing skills to touch the professional and academic world.</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col">

                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-2">
                    <div class="footer_single_col information">

                    </div>
                </div>
              
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col contact">
                        <h3>Contact Us</h3>
                        <p>We are ready to make you perfect... Contact Us</p>
                        <div class="contact_info">
                            <span>070 240 0010</span>
                            <span class="email">dolewatteacademy@gmail.com</span>
                        </div>
                        <ul class="social_items d-flex list-unstyled">
                            <li><a href="#"><i class="fab fa-facebook-f fb-icon"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter twitt-icon"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in link-icon"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram ins-icon"></i></a></li>
                        </ul>
                    </div>
                </div>
                 <div class="col-12 col-md-12 col-lg-12">
                    <div class="copyright">
                        <p> © 2021 Copyright:dolex.lk</p>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <div class="shapes_bg">
        <img src="images/shapes/testimonial_2_shpe_1.png" alt="" class="shape_3">        
        <img src="images/shapes/footer_2.png" alt="" class="shape_1">
    </div>    
</footer><!-- End Footer -->

    <!--  JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>     
    <script src="js/owl.carousel.min.js"></script>  
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAhrdEzlfpnsnfq4MgU1e1CCsrvVx2d59s"></script>
    <script src="js/map-helper.js"></script>     
    <script src="js/slick.min.js"></script>   
    <script src="js/jquery.meanmenu.min.js"></script>  
    <script src="js/wow.min.js"></script> 
    <!-- Counter Script -->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/custom.js"></script> 
    
    <!-- =========================================================
         STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
    ============================================================== -->
    <script type="text/javascript" src="js/demo.js"></script>
     
</body>

</html>
