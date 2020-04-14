<!DOCTYPE html>  
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>

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

<body background="img/registerbg2.jpg">
    
        <div class="wrapper wrapper--w790">
            <br> <br> <br>
             <div class="card card-5">
                <div class="card-heading">
                 <h2 class="title">โปรดใส่ข้อมูลให้ครบถ้วนเพื่อสมัครใช้งาน</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action = "Database.php">
                        <div class="form-row">
                            <div class="name">ระบุชื่อผู้ใช้</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username">
                                    <label class="label--desc">*ชื่อผู้ใช้ต้องเป็นภาษาอังกฤษเท่านั้น</label>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-row">
                            <div class="name">รหัสผ่าน</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="password" name="password">
                                    <label class="label--desc">*</label>
                                </div>
                            </div>
                        </div>

                        

                        <div class="form-row m-b-55">
                            <div class="name">ชื่อ</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="first_name">
                                            <label class="label--desc">ชื่อจริง</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="last_name">
                                            <label class="label--desc">นามสกุล</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">รหัสบุคลากร</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="student_id">
                                    <label class="label--desc">*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">ระบุชื่อโรงเรียน</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="school">
                                    <label class="label--desc">*</label>
                                </div>
                            </div>
                        </div>
                       
                        
                        <!-- <div class="form-row">
                            <div class="name">สถานะ</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="status">
                                            <option disabled="disabled" selected="selected">เลือกสถานะ</option>
                                            <option>บุคลากรภายในโรงเรียน</option>
                                            <option>นักเรียน</option>
                                            <label class="label--desc">*</label>
            
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <input type="hidden" name="typeDB" value = "Register">
                        
                        <div>
                           <center><button class="btn btn--radius-2 btn--red" type="submit">สมัคร</button></center>
                        </div>
                    </form>
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