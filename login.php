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
</head>

<body background="img/registerbg.jpg">
    
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->