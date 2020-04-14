<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
    $servername = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b010d93aa48454";
        $password = "ceafc16b";
        $dbname = "heroku_089e8d9a7502d18";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset("utf8");
    $sql = "SELECT distinct(SchoolName) FROM user";
    $result = mysqli_query($conn, $sql);
?>
<head>
    <!-- Required meta tagss-->
    <meta charset="UTF-8">
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
    <link href="css1/main.css" rel="stylesheet" media="all">


    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
</head>

<body background="img/registerbg2.jpg">

<header>
        <div class="header-area1">
            <div id="sticky-header" class="main-header-area1">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="img/predict.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 "></div>
                        <div >
                            <div class="main-menu">
                                <nav>
                                    <ul id="navigation">
                                        
                                        <li><a href="index.php">หน้าแรก</a></li>
                                        

                                            <?php
                    
                    if(isset($_SESSION["FirstName"])){//แก้ทุกหน้า username
                ?>
                <li><a href="index.php"><?php echo $_SESSION["FirstName"] ?> <i class="ti-angle-down"></i> </a>
                    <ul class="submenu">
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
                        
                        <div class="col-8">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>



    
        <div class="wrapper wrapper--w790">
            <br> <br> <br>
             <div class="card card-5">
                <div class="card-heading">
                 <h2 class="title">ลงชื่อเข้าใช้</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action = "Database.php">
                        <div class="form-row">
                            <div class="name">ระบุชื่อผู้ใช้</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username">
                                    <label class="label--desc"><font color="#FF0000"><strong>*</strong></font></label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">รหัสผ่าน</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password">
                                    <label class="label--desc"><font color="#FF0000"><strong>*</strong></font></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">โรงเรียน</div>
                            <div class="value">
                                <div class="input-group">
                                    <select class="input--style-5" name = "school" style="width:100%; height:42px;">
                                    <?php while($row = mysqli_fetch_assoc($result)) {?>
                                        <option value="<?php echo $row['SchoolName']?>"><?php echo $row['SchoolName']?></option>
                                    <?php }?>
                                    </select>
                                    <label class="label--desc"><font color="#FF0000"><strong>*</strong></font></label>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="typeDB" value = "login">
                        
                        <div>
                          <center> <button class="btn btn--radius-2 btn--red" type="submit">เข้าสู่ระบบ</button>   <center> 
                        </div>
                        
                    </form>
                    <?php if(isset($_SESSION["error"])){ ?>
                        <p><?php echo $_SESSION["error"];?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js1/global.js"></script>





    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>
    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->