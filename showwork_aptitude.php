<!DOCTYPE html>
<html lang="zxx">
<?php
    session_start(); //นำไปใส่ทุกหน้าที่เเก้ Username
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

<body  background="img/about1.jpg">
    
    
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
                <form action="resultthai.php" method="post">  <!-- แก้ลิ้ง -->
                <div class="card-header text-center">
                <br>
                <br><h2>คุณมีความถนัดด้าน </h2><br> 
                <h3> "วิชาศิลปะ" และ "วิชาการงานอาชีพและเทคโนโลยี"</h3><br> 
                <h3>ความเเม่นยำของการพยากรณ์ "<?php echo $_SESSION["error_pre"];?>%"</h3><br> 
                <img src="img/feature/art_work.png"  width="700">
                <br>

                <br>
                
                
                        

                   
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
