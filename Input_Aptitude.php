<!DOCTYPE html>
<html lang="zxx">
<?php
    session_start(); //นำไปใส่ทุกหน้าที่เเก้ Userna
?>
<!--copy -->
<?php
    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "predict_onet";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $userStudent = $_SESSION["UserID"];
    $sqlCheck = "SELECT distinct(School) FROM model WHERE SubjectName = 'ภาษาไทย'";
    $value = mysqli_query($conn, $sqlCheck);
    $i = 0;
            while($row = mysqli_fetch_assoc($value)) {
                $school[$i] = $row["School"];
                $i++;
            }
?>
<!--copy -->
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
                <form action="Aptitude_test.php" method="post">
                <div class="card-header text-center">
                        <h4>เกรดวิชาภาษาไทย</h4>
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
                    </div>
                    <div class="card-header text-center">
                        <h4>เกรดวิชาศิลปะ</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาศิลปะ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="art11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาศิลปะ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="art12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาศิลปะ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="art21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาศิลปะ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="art22" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        <h4>เกรดวิชาคณิตศาสตร์</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="math11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์เพิ่มเติม ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="mathexthai11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="math12" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์เพิ่มเติม ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="mathex12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="math21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์เพิ่มเติม ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="mathex21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="math22" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาคณิตศาสตร์เพิ่มเติม ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="mathex22" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        <h4>เกรดวิชาวิทยาศาสตร์</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาวิทยาศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sci11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาวิทยาศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sci12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาวิทยาศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sci21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาวิทยาศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sci22" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        <h4>เกรดวิชาสังคม</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาสังคม ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="social11" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาประวัติศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="history11" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาหน้าที่พลเมือง ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="people11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาสังคม ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="thai12" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาประวัติศาสตร์ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="history12" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาหน้าที่พลเมือง ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="people12" required>
                            </div>
                            </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาสังคม ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="social21" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาประวัติศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="history21" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาหน้าที่พลเมือง ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="people21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาสังคม ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="social22" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาประวัติศาสตร์ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="history22" required>
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาหน้าที่พลเมือง ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="people22" required>
                            </div>
                            </div>
                    </div>
                    <div class="card-header text-center">
                            <h4>เกรดวิชาพละศึกษา</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาพละศึกษา ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sport11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาสุขศึกษา ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sportex11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาพละศึกษา ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sport12" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาสุขศึกษา ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sportex12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาพละศึกษา ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sport21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาสุขศึกษา ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sportex21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาพละศึกษา ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sport22" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-8 col-form-label"><font size="4">เกรดวิชาสุขศึกษา ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-4 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="sportex22" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        <h4>เกรดวิชาการงานอาชีพและเทคโนโลยี</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาการงานอาชีพ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="work11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาการงานอาชีพ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="work12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาการงานอาชีพ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="work21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาการงานอาชีพ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="work22" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center">
                        <h4>คะแนนภาษาอังกฤษ</h4>
                    </div>
                    <div class="card-body text-left">
                        <div class="form-group row">
                            <label for="stu_id" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาอังกฤษ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="eng11" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาอังกฤษ ชั้นมัธยมศึกษาปีที่ 1 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="eng12" required>
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาอังกฤษ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 1:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="eng21" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname" class="col-sm-7 col-form-label"><font size="4">เกรดวิชาภาษาอังกฤษ ชั้นมัธยมศึกษาปีที่ 2 เทอมที่ 2:</font></label>
                            <div class="col-sm-5 text-right">
                                <input type="number" min = 0.0 max = 4.0 step=0.1 name="eng22" required>
                            </div>
                        </div>

                        </div>

                    <div class="card-footer text-center">
						<button type="submit" name="submit" class="btn btn-success" value="submit"> ยืนยันข้อมูล </button>
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
