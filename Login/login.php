<?php
    session_start();
?>
<?php // connect database connection file
 require_once '../DBConnection/connection.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dolex English Academy</title>
</head>
<body>
    <section>
        <div class ="imgBx">
            <img src="../Img/logimg.JPG" alt="backimg">
        </div>
        <div class ="contentBx">
            <div class ="frombx">
                <h2>Login</h2>
                <form action="login.php" method="post">
                    <div class ="inputbx">
                        <span>Username :</span>
                        <input type="text" name ="txtusername" required>
                    </div>
                    <div class ="inputbx">
                        <span>Password :</span>
                        <input type="password" name="txtpassword" required>
                    </div>
                    <div class ="remember">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>
                    <div class ="inputbx">
                        <input type="submit" value ="Sign In" name ="btnsubmit">
                    </div>
                    <div class="inputbx">
                        <p>Don't have an account ? <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--***********************************************************************************************************************************************************************-->
    <?php
    // check userdetails

    if(isset($_POST['btnsubmit'])){
        $username = $_POST["txtusername"];
        $password = $_POST["txtpassword"];

        $sql = "SELECT * FROM admin WHERE  username = '{$username}' , password = '{$password}'";
        
        // chech login data is in the database or not

        $resultset = mysqli_query($con,$sql);

        if($resultset) {
            
            $_SESSION ['userid'] = $username;
            header("Location: ../Admin/Dashborad/mainpanel.php");
        }
        else {
            $sql = "SELECT * FROM teacher_permission  WHERE teacher_id = '{$username}' , password = '{$password}'";

            $rst = mysqli_query($con,$sql);
        
        }
    
    }
    ?>
</body>
</html>