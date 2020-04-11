<html>
<?php
   session_start();
   $Status1 = $_SESSION["Status"];
   if($Status1 != "บุคลากรภายในโรงเรียน"){
    ?>
    <script>
        window.location='index.php';
    </script>
<?php
   }
   
   
?>
<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>



  
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
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    
    <style>
    table, th, td 
    {
        border: 1px solid black;
    }
</style>
</head>
    <body background="img/feature/129.png">
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
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto" style="max-width: 800px; top :130px">
                <div class="card bg-light border-dark mb-3 text-center">
                <form action="Database.php" method="post" enctype="multipart/form-data">
                <div class="card-header text-center">
                        <h4>เพิ่มผู้ใช้ </h4>
                    </div>


                    <div class="card-body text-center"> <br><?php
                        $download=$_GET[download]; //รับค่ามาจากการคลิกที่ Link
                        $path="https://drive.google.com/u/0/uc?id=1mo8tOhrnhMdOORRlO32-2YG8xBABvF0j&export=download"; //ในตัวอย่างนี้เป็น path เดียวกันกับไฟล์เลยไม่ต้องระบุ path
                     //https://drive.google.com/open?id=1mo8tOhrnhMdOORRlO32-2YG8xBABvF0j
                        if (isset($download)) {
                        header("Content-Type: application/force-download");
                        header("Content-Disposition: attachment; filename=$download");
                        @readfile("$path/$download");
                        } else {
            
                        echo "<h5>กรุณาดาวน์โหลดแบบฟอร์มสำหรับกรอกข้อมูลผู้ใช้<a href=https://drive.google.com/u/0/uc?id=1mo8tOhrnhMdOORRlO32-2YG8xBABvF0j&export=download?download=https://drive.google.com/u/0/uc?id=1mo8tOhrnhMdOORRlO32-2YG8xBABvF0j&export=download>ดาวน์โหลด</a></h5> "; 
                        }
                        ?> 
                    </div>
                    <div class="card-body text-center">
                        <div class="form-group row text-center">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="filename" name="filename">
                                <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="typeDB" value = "addUser">
                    <div class="card-footer text-center">
						<button type="submit" name="submit" class="btn btn-success" value="submit"> ยืนยันข้อมูล </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
