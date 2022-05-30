<?php
    session_start();
?>
<?php // connect database connection file
 require_once 'DBConnection/connection.php'; ?>
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
    <link rel="stylesheet" href="Login/style.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header class="header_inner become_a_teacher">
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
</header> <!-- End header -->

<section>
    <div class ="imgBx">
        <img src="Img/logimg.JPG" alt="backimg">
    </div>
    <div class ="contentBx">
        <div class ="frombx">
            <h2>Login</h2>
            <form action="Login.php" method="post" enctype="multipart/form-data">

                <div class ="inputbx">
                    <span>Username :</span>
                    <input type="text" name ="txtusername" required>
                </div>
                <div class ="inputbx">
                    <span>Password :</span>
                    <input type="password" name="txtpassword" required>
                </div>
                <div class ="inputbx">
                  <span>User Type :</span>
                  <select class="classic" name ="txtusertype" required>
                     <option selected>Select User Type</option>
                     <option value="admin">Admin</option>
                     <option value="instructor">Instructor</option>
                     <option value="student">Student</option>
              </div>
              <br><br>
                <div class ="inputbx">
                    <input type="submit" value ="Sign In" name ="btnsubmit">
                </div>

            </form>
        </div>
    </div>
</section>

<br><br>
<!-- Footer -->
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
                        <a target="_blank">© 2021 Copyright:dolex.lk</a>
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
    <!-- JavaScript -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
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
    <!--***********************************************************************************************************************************************************************-->
    <?php
    
    // check userdetails

    if(isset($_POST['btnsubmit'])){
        $username = $_POST["txtusername"];
        $password = $_POST["txtpassword"];
        $role = $_POST["txtusertype"];

        $adminrole = "admin";
        $ins_role= "instructor";
        $studrole = "student";
 
        if ($role == $adminrole){
            $sql = "SELECT * FROM user WHERE  username = ? AND role = ? AND password = ?";

			$stmt = $con ->prepare($sql);
            $stmt->bind_param("sss",$username,$role,$password);
            $stmt->execute();
            $resultset = $stmt->get_result();
            $row = $resultset->fetch_assoc();
            if ($resultset->num_row == 1){
               
                ?>
                <Script>
                    alert("Incorrect Username Or Password");
                </Script>
               <?php  
            }
            else{
                 echo("<script>location.href ='Admin/Dashborad/mainpanel.php';</script>"); 
            }
            
        }elseif($role ==$ins_role){
            $sql = "SELECT * FROM user WHERE  username = '{$username}' ,role = '{$role}', password = '{$password}'";
            $resultset2 = mysqli_query($con,$sql);

            if ($resultset2){
                ?>
                <Script>
                    alert("Incorrect Username Or Password");
                </Script>
               <?php  
               
            }else{
                $_SESSION ['userid'] = $username;
                echo("<script>location.href ='Teacher/Dashboard/mainpanel.php';</script>");
            }

        }else{
            $sql = "SELECT * FROM student WHERE std_id= '{$username}' , password = '{$password}'";

            $result = mysqli_query($con,$sql);
            if($result){
                ?>
                <Script>
                    alert("Incorrect Username Or Password");
                </Script>
               <?php 
              }else{
                $_SESSION ['userid'] = $username;
                echo("<script>location.href ='User/Dashboard/mainpanel.php';</script>");
            } 

        }
        
        
        }?>

<?php

    ?>
</body>


</html>
