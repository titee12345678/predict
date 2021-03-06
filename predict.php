<!doctype html>
<html class="no-js" lang="zxx">

<?php
    session_start(); //นำไปใส่ทุกหน้าที่เเก้ Userna
    $Status1 = $_SESSION["Status"];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Predict O-NET</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
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
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
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
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        
            <div class="single_slider  d-flex align-items-center slider_bg_1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                <h3>การพยากรณ์คะแนน O-NET </h3> 
                                <p>พยากรณ์คะแนนสำหรับชั้นมัธยมศึกษาปีที่ 3 จากผลการเรียน 5 เทอม<br> โดยมีทั้งหมด 4 วิชาได้แก่
                                    วิชาภาษาไทย วิชาวิทยาศาสตร์ วิชาคณิตศาสตร์ วิชาภาษาอังกฤษ <br> "แบบจำลองต้นแบบ" ได้มาจากโรงเรียนแห่งหนึ่งในจังหวัดปราจีนบุรี<br> หากต้องการความแม่นยำที่เหมาะสมกับโรงเรียนของท่าน กรุณาเลือกเมนู "สร้างแบบจำลอง" </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
    <!-- slider_area_end -->

    <!-- service_area_start -->
    
    <!-- service_area_end -->

    <!-- welcome_docmed_area_start -->
    
    <!-- welcome_docmed_area_end -->

    <!-- offers_area_start -->
    <div class="our_department_area">
        <div class="container">
            
            <div class="row">
                <div class="col-xl-3 col-md-7 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <a href="predict_thai2.php">   <img src="img/4.1.jpg" alt=""></a> 
                        </div>
                        <div class="department_content">
                            <h3><a href="predict_thai2.php">วิชาภาษาไทย</a></h3>
                            <p>พยากรณ์คะแนน O-NET <br>ภาษาไทย จากผลการเรียน  <br> 5 เทอม</p>
                            
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                           <a href="predict_sci.php"><img src="img/4.2.jpg" alt=""></a> 
                        </div>
                        <div class="department_content">
                        <h3><a href="predict_sci.php">วิชาวิทยาศาสตร์</a></h3>
                            <p>พยากรณ์คะแนน O-NET วิทยาศาสตร์ จากผลการเรียน <br> 5 เทอม</p>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                        <a href="predict_math.php">
                            <img src="img/4.3.jpg" alt=""></a> 
                        </div>
                        <div class="department_content">
                            <h3><a href="predict_math.php">วิชาคณิตศาสตร์</a></h3>
                            <p>พยากรณ์คะแนน O-NET คณิตศาสตร์ จากผลการเรียน <br> 5 เทอม</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                        <a href="predict_eng.php">
                            <img src="img/4.4.jpg" alt=""></a>
                        </div>
                        <div class="department_content">
                        <h3><a href="predict_eng.php">วิชาภาษาอังกฤษ</a></h3>
                            <p>พยากรณ์คะแนน O-NET <br> ภาษาอังกฤษ จากผลการเรียน <br> 5 เทอม</p>
                        </div>
                        </div>
                    </div>
                </div>
               
               
            </div>
        </div>
    </div>
    <!-- offers_area_end -->

    <!-- testmonial_area_start -->
    
    <!-- testmonial_area_end -->

    <!-- business_expert_area_start  -->
    
    <!-- business_expert_area_end  -->


    <!-- expert_doctors_area_start -->
    
    <!-- expert_doctors_area_end -->

    <!-- Emergency_contact start -->
    
    <!-- Emergency_contact end -->

<!-- footer start -->
    
<!-- footer end  -->
    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>Make an Appointment</h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-6">
                            <input id="datepicker" placeholder="Pick date">
                        </div>
                        <div class="col-xl-6">
                            <input id="datepicker2" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Select Department">Department</option>
                                <option value="1">Eye Care</option>
                                <option value="2">Physical Therapy</option>
                                <option value="3">Dental Care</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Doctors">Doctors</option>
                                <option value="1">Mirazul Alom</option>
                                <option value="2">Monzul Alom</option>
                                <option value="3">Azizul Isalm</option>
                            </select>
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Name">
                        </div>
                        <div class="col-xl-6">
                            <input type="text"  placeholder="Phone no.">
                        </div>
                        <div class="col-xl-12">
                            <input type="email"  placeholder="Email">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Confirm</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- JS here -->
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
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
                rightIcon: '<span class="fa fa-caret-down"></span>'
            }

        });
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>
</body>

</html>