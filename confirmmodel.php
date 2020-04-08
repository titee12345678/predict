<!DOCTYPE html>
<html lang="zxx"     >

<?php
    session_start(); //นำไปใส่ทุกหน้าที่เเก้ Userna
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Predict">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Predict O-net | Create model</title>
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra Petch:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
    
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
    
</head>

<body   background="img/about1.jpg" > 
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="logo">
                <a href="./index.php">
                    <img src="img/predict.png" alt="">
                </a>
            </div>
            
            <div class="container">
                <div class="nav-menu">
                    <nav class="mainmenu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.php">หน้าแรก</a></li>
                            <?php
                                if(!(isset($_SESSION["FirstName"]))){
                            ?>
                            <li><a href="register.php">สมัครสมาชิก</a></li>
                            <li><a href="login.php">เข้าสู่ระบบ</a></li>
                            <!-- <li><a href="์notlogin.php">ผู้ใช้ทั่วไป</a></li> -->
                            <li><a href="about.php">เกี่ยวกับ</a></li>


                            <?php
                                }
                            ?>
                            <?php
                                if(isset($_SESSION["FirstName"])){
                            ?>
                             <li><a href="studentUser.php">เพิ่มผู้ใช้</a></li>
                            
                             <?php
                                }
                            ?>


                            <?php
                    
                                if(isset($_SESSION["FirstName"])){//แก้ทุกหน้า username
                            ?>
                            <li><a href=""><?php echo $_SESSION["FirstName"] ?></a>
                                <ul class="dropdown">
                                    <li><a href="logout.php">ลงชื่อออก</a></li>
                                    
                                </ul>
                            </li>
                            <?php
                                }
                            ?>






                        </ul>
                    </nav>
                </div>
            </div>  
                   
            <div id="mobile-menu-wrap">
        </div>   
    </header>



    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="max-width: 1000px; top :130px">
                <div class="card bg-light border-dark mb-3">
                <form action="resultthai.php" method="post">
                <div class="card-header text-center">
                        <h4>ยืนยันการบันทึกแบบจำลอง</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                         <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">วิชา : <?php echo $_SESSION["subject"]; ?></font></label>
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">ชื่อแบบจำลอง : <?php echo $_SESSION["modelname"]; ?></font></label>
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">ค่าความเเม่นยำ :  <?php echo $_SESSION["Percentage"]; ?> %</font></label>
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">ค่า MCC :  <?php echo $_SESSION["MCC"]; ?>% </font></label>
                            <div>
                          
                        </div>
                      
                            
                    <div class="card-body text-left"> 
                     <center><button class="btn btn--radius-2 btn--red" type="submit">ยืนยัน</button>    
                     <button class="btn btn--radius-2 btn--red" type="cancel">ยกเลิก</button>  </center>   
                    

                    
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    


           
    



  
    <!-- Hero Section Begin -->
    
    <!-- Blog Section End -->

    <!-- Cta Section Begin -->
    
    <!-- Cta Section End -->

    <!-- Map Section Begin -->
    
    <!-- Map Section End -->
     
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
</body>

</html>