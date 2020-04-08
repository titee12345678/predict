<!DOCTYPE html>
<html lang="zxx">
<?php
    session_start(); //นำไปใส่ทุกหน้าที่เเก้ Username
    $servername = "us-cdbr-iron-east-04.cleardb.net";
    $username = "bbe7a9b2c37b7d";
    $password = "e7c2625f"; 
    $dbname = "heroku_02daed7a46fa0e7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset("utf8");
    $userStudent = $_SESSION["UserID"];
    $SchoolUser = $_SESSION["School"];
    // $sqlCheck = "SELECT * FROM model WHERE SubjectName = 'ภาษาไทย' AND School = '$SchoolUser'";
    // $value = mysqli_query($conn, $sqlCheck);
    // $i = 0;
    //         while($row = mysqli_fetch_assoc($value)) {
           
    //                 $modelName = $row["ModelName"];
    //             $i++;
    //         }
    $sqlCheck = "SELECT distinct(School) FROM model WHERE SubjectName = 'ภาษาไทย'";
    $value = mysqli_query($conn, $sqlCheck);
    $i = 0;
            while($row = mysqli_fetch_assoc($value)) {
                if($row["School"] == $SchoolUser){
                    $schoolU = $row["School"];
                } 
                $i++;
            }
?>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Activitar Template">
    <meta name="keywords" content="Activitar, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Predict O-net | Create model</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra Petch:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css1/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css1/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css1/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css1/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css1/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css1/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css1/style.css" type="text/css">
    
    <style>
    table, th, td 
    {
        border: 1px solid black;
    }
</style>
    
</head>

<body  background="img/hero-slider/logo2.jpg">
    
    
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
                            
                            <li><a href="#">เปลี่ยนวิชาพยากรณ์</a>
                                <ul class="dropdown">
                                    <li><a href="predict_sci.php">วิชาวิทยาศาสตร์</a></li>
                                    <li><a href="predict_eng.php">วิชาภาษาอังกฤษ</a></li>
                                    <li><a href="predict_math.php">วิชาคณิตศาสตร์</a></li>
                                </ul>

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
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Hero Section Begin -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto" style="max-width: 1000px; top :130px">
                <div class="card bg-light border-dark mb-3">
                <form action="resultthai.php" method="post">
                <div class="card-header text-center">
                        <h4>พยากรณ์คะแนนวิชาภาษาไทย</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาไทย ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="thai11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาไทย ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="thai12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาไทย ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="thai21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาไทย ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="thai22" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาไทย ชั้นมัธยมศึกษาปีที่ 3 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                            <input type="number" min = 0.0 max = 4.0 step=0.1 name="thai31" required>
                            </div> 
                        </div>
                        <!-- <div class="form-group row">
                            <label for="age" class="col-sm-7 col-form-label"><font size="4">เกรดเฉลี่ยวิชาภาษาไทย 5 เทอม :</font></label>
                            <div class="col-sm-5 text-right">
                            <input type="number" min = 0.00 max = 4.00 step=0.01 name="thaitotal" required>
                            </div> 
                        </div> -->
                        <div class="form-group row">
                            <label for="gender" class="col-sm-7 col-form-label"><font size="4">เกรดเฉลี่ยรวมทุกวิชา 5 เทอม:</font></label>
                            <div class="col-sm-5 text-right">
                            <input type="number" min = 0.00 max = 4.00 step=0.01 name="total_grade" required>
                            </div> 
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-sm-9 col-form-label"><font size="4">เลือกแบบจำลอง:</font></label>
                            <div class="rs-select2 js-select-simple select--no-search text-right">
                                        <select name="school" style="height:2em;">
                                            <option disabled="disabled" selected="selected">โปรดเลือกแบบจำลอง</option>             
                                            <?php if(isset($userStudent)){ ?>
                                            <option>แบบจำลองต้นแบบ</option>
                                            <option><?php echo $schoolU; ?></option>
                                            <?php } else{?>
                                            <option>แบบจำลองต้นแบบ</option>
                                            <?php } ?>
                                            <label class="label--desc">*</label>
            
                                        </select>
                                        <div class="select-dropdown"></div>
                                        </div><!--copy -->
                        </div>


                    <div class="card-footer text-center">
						<button type="submit" name="submit" class="btn btn-success" value="submit"> พยากรณ์ </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Feature Section End -->

    <!-- About Section Begin -->
   
    <!-- About Section End -->

    <!-- Classes Section Begin -->
    
    <!-- Classes Section End -->

    <!-- Class Time Section Begin -->

    <!-- Class Time Section End -->

    <!-- Price Plan Section Begin -->
    
    <!-- Price Plan Section End -->

    <!-- Choseus Section Begin -->

    <!-- Choseus Section End -->

    <!-- Video Section Begin -->
  
    <!-- Video Section End -->

    <!-- Blog Section Begin -->

    <!-- Blog Section End -->

    <!-- Cta Section Begin -->
    
    <!-- Cta Section End -->

    <!-- Map Section Begin -->
    
    <!-- Map Section End -->
     
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js1/jquery-3.3.1.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/jquery.magnific-popup.min.js"></script>
    <script src="js1/mixitup.min.js"></script>
    <script src="js1/jquery.nice-select.min.js"></script>
    <script src="js1/jquery.slicknav.js"></script>
    <script src="js1/owl.carousel.min.js"></script>
    <script src="js1/masonry.pkgd.min.js"></script>
    <script src="js1/main.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Chakra+Petch&display=swap" rel="stylesheet">
</body>

</html>
