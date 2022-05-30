<!doctype html>
<html lang="en">
<?php // connect database connection file
 require_once 'DBConnection/connection.php'; ?>

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
</head>
<body>
<header class="header_inner courses_page">
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
                                <li class="nav-item"><a href="Login.php" class="nav-link join_now"><i class="flaticon-padlock"></i>Log In</a></li>
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
                      <li class="nav-item"><a href="index.php" class="nav-link active">Home</a>
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

    <div class="intro_wrapper">
        <div class="container">
            <div class="row">
                 <div class="col-sm-12 col-md-8 col-lg-8">
                    <div class="intro_text">
                        <h1>Courese Page</h1>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header> <!-- End Header -->






<!--Start Courses Area Section-->
<section class="popular_courses" id="popular_courses_page">
    <div class="container">
        <div class="row">

          <?php
          $sql = "SELECT * FROM  course ";
          $result_set = mysqli_query($con,$sql);

         while ($row = mysqli_fetch_array($result_set)){

            ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-courses">
                    <div class="courses_banner_wrapper">
                        <div class="courses_banner"><a href="#"><img src="Image/<?php echo $row['img'];?>" class="img-fluid" ></a></div>
                        
                        <div class="purchase_price">
                            <a href="#" class="read_more-btn"><?php echo $row['cost'];?></a>
                        </div>
                    </div>
                    <div class="courses_info_wrapper">
                        <div class="courses_title">
                            <h3><a href="#"><?php echo $row['cuname'];?></a></h3>
                            <div class="teachers_name">Teacher - <a href="#" title=""><?php echo $row['instructor'];?></a></div>
                        </div>
                        <div class="courses_info">
                            <ul class="list-unstyled">
                                <li><i class="fas fa-user"></i>Enroll Date - <?php echo $row['enroll_date'];?></li>
                                <li><?php echo $row['descrp'];?></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- Ends: .single courses -->
         <?php 
           
         }
           ?>



            </div><!-- Ends: . -->
    </div>
</section><!-- ./ End Courses Area section -->


<!-- Footer -->
<footer class="footer_2">
    <div class="container">
        <div class="footer_top">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="footer_single_col footer_intro">
                        <img src="images/logo2.png" alt="" class="f_logo">
                        <p>Many people have broken their life journey because of misunderstanding exactly what they need to succeed their career, that they think just speaking English will provide improvement of their jobs but the reality is that we exactly need our writing skills to touch the professional and academic world. </p>
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

</body>


</html>
