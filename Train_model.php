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

<?php
    session_start(); //นำไปใส่ทุกหน้าที่เเก้ Username
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b010d93aa48454";
    $password = "ceafc16b"; 
    $dbname = "heroku_089e8d9a7502d18";

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
    <body background="img/registerbg.jpg">
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
                            <li><a href="chart.php">กราฟแบบจำลอง</a></li>
                            
                            

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
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto" style="max-width: 800px; top :130px">
                <div class="card bg-light border-dark mb-3 text-center">
                <form action="Train_model-1.php" method="post" enctype="multipart/form-data">
                
                <div class="card-header text-center">
                        <h4>สร้างแบบจำลอง </h4>
                    </div>

                    <div class="card-body text-center"> <br><?php
                        $download=$_GET[download]; //รับค่ามาจากการคลิกที่ Link
                        $path="https://drive.google.com/u/0/uc?id=1dxmTebLAoybtyrc6I6LyxHdoWgKdWhsh&export=download"; 
                        //ในตัวอย่างนี้เป็น path เดียวกันกับไฟล์เลยไม่ต้องระบุ path https://drive.google.com/open?id=1Z8p1lTh9cV_4iF-hkB2Unkde9YdN2W5a
                        
                        
        
                        if (isset($download)) {
                        header("Content-Type: application/force-download");
                        header("Content-Disposition: attachment; filename=$download");
                        @readfile("$path/$download");
                        } else {
            
                        echo "<h5> กรุณาดาวน์โหลดคู่มือการใช้งานและแบบฟอร์มสำหรับกรอกข้อมูลแต่ละวิชา <a href=https://drive.google.com/u/0/uc?id=1dxmTebLAoybtyrc6I6LyxHdoWgKdWhsh&export=download?download=https://drive.google.com/u/0/uc?id=1dxmTebLAoybtyrc6I6LyxHdoWgKdWhsh&export=download>ดาวน์โหลด</a></h5> ";
                        }
                        ?> 
                    </div>



                    
                    <div class="card-body text-center">
                        <div class="form-group row text-center">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="filename" name="filename">
                                <label class="custom-file-label" for="customFile">เลือกไฟล์</label>
                                
                                <script>
                                    // Add the following code if you want the name of the file appear on select
                                    $(".custom-file-input").on("change", function() {
                                    var fileName = $(this).val().split("\\").pop();
                                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                    });
                                </script>
                                
                            </div>
                        </div>
                        <br>
                        <div class="form-group row text-center">
                        <label for="firstname" class="col-form-label"><font size="4">ชื่อโมเดล :</font></label>
                            <div class="col-sm-1">
                                <input type="text" name = "modelName" required>
                            </div>
                            <label for="firstname" class="col-sm-9 col-form-label"><font size="4">กรุณาตั้งชื่อเป็นภาษาอังกฤษ</font></label> 
                        </div>
                        <br>
                        <div class="form-group row text-center">
                        ชื่อวิชา 
                            <select name="Subject" class="custom-select ">
                                <option disabled="disabled" selected="selected">เลือกวิชา</option>
                                <option>ภาษาไทย</option>
                                <option>ภาษาอังกฤษ</option>
                                <option>คณิตศาสตร์</option>
                                <option>วิทยาศาสตร์</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-center">
						<button type="submit" name="submit" class="btn btn-success" value="submit"> สร้างแบบจำลอง </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
