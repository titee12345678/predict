<?php
    session_start();
    $servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b010d93aa48454";
    $password = "ceafc16b"; 
    $dbname = "heroku_089e8d9a7502d18";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $conn -> set_charset("utf8");
        // Check connectio
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
        // // echo "Connected successfully";
        
        $typeDB = $_POST['typeDB'];
        $type = $_GET['type'];


        if($typeDB == "Register"){
            $user = $_POST['username'];
            $pass = $_POST['password'];
            // echo "Register ".$user."  ".$pass;
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $student_id = $_POST['student_id'];
            $school = $_POST['school'];
            // $status = $_POST['status'];
            $status = "บุคลากรภายในโรงเรียน";
            
            $sql = "INSERT INTO user (UserID, UserName, UserPassword, FirstName, LastName, SchoolName, UserStatus)
            VALUES ('$student_id', '$user', '$pass', '$first_name', '$last_name', '$school', '$status')";
            mysqli_query($conn, $sql);

            // if (mysqli_query($conn, $sql)) {
            //     echo "New record created successfully";
            // } else {
            //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            // }
            ?>
                <script>
                    window.location='showregister.php';
                </script>
            <?php

          
    }
        if($typeDB == "login"){
            session_unset($_SESSION["error"]);
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $school = $_POST['school'];

            $sql = "SELECT * FROM user WHERE (UserName = '$user' AND UserPassword = '$pass') AND SchoolName = '$school'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                // echo " Login  " . $row["UserName"]. "   " . $row["UserPassword"]. "<br>";
                $_SESSION["FirstName"] = $row["FirstName"];
                $_SESSION["Status"] = $row["UserStatus"];
                $_SESSION["UserID"] = $row["UserID"];
                $_SESSION["School"] = $row["SchoolName"];

        
            }
            if(isset($_SESSION["FirstName"])){
                ?>
                    <script>
                        window.location='index.php';
                    </script>
                <?php
                }
                else{
                    $_SESSION["error"] = "ไม่สามารถเข้าสู่ระบบได้ ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
                ?>
                    <script>
                        window.location='login.php';
                    </script>
                <?php
                }
        
        }
        if($typeDB == "savemodel"){
            $modelname = $_POST['modelname'];
            $userid = $_SESSION["UserID"];
            $subject = $_POST['Subject'];
            $Percentage = $_POST['Percentage'];
            $MCC = $_POST['MCC'];
            $date = date("d-m-yy");

            $_SESSION["MCC"] = $MCC;
            $_SESSION["Percentage"] = $Percentage;
            $_SESSION["modelname"] = $modelname;
            $_SESSION["subject"] = $subject;
            
            $sqlCheck = "SELECT UserID FROM model WHERE UserID = '$userid' AND SubjectName = '$subject'";
            $value = mysqli_query($conn, $sqlCheck);

            while($row = mysqli_fetch_assoc($value)) {
                $user = $row["UserID"];
            }

            if($user == $userid){
                $sql = "UPDATE model SET ModelName = '$modelname', Percentage = '$Percentage', CurrentDay = '$date' WHERE UserID = '$userid' AND SubjectName = '$subject'";
                mysqli_query($conn, $sql);
            }
            else{
                $school = $_SESSION["School"];
                $sql = "INSERT INTO model (UserID, ModelName, SubjectName, School, Percentage, CurrentDay) VALUES ('$userid', '$modelname', '$subject','$school','$Percentage','$date')";
                mysqli_query($conn, $sql);
            }
            ?>
            <script>
                window.location='ShowSuccess.php';
            </script>
        <?php
        }
        if($typeDB == "addUser"){
            $file_tmp =$_FILES['filename']['tmp_name'];
            $filename = $file_tmp;
            // echo "FileName ".$filename;
            $i = 0;
            $objCSV = fopen($filename, "r");
        
            while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {
    
                if($i != 0){
                $student_id = $objArr[0];
                $user = $objArr[0];
                $pass = $objArr[0];
                $first_name = $objArr[1];
                $last_name = $objArr[2];
                $school = $objArr[3];
                $status = "นักเรียน";
    
                $sql = "INSERT INTO user (UserID, UserName, UserPassword, FirstName, LastName, SchoolName, UserStatus)
                VALUES ('$student_id', '$user', '$pass', '$first_name', '$last_name', '$school', '$status')";
                mysqli_query($conn, $sql);
                
                }
    
                $i++;
    
            }
            fclose($objCSV);
            ?>
            <script>
                window.location='showadduser.php';
            </script>
        <?php         
    }
    if($type == "DeleteModel"){
        
        $id = $_GET['id'];
        $sql = "DELETE FROM model WHERE ID = '$id'";
        mysqli_query($conn, $sql);

        ?>
        <script>
            window.location='Admin.php';
        </script>
    <?php
    
    }
        mysqli_close($conn);


  
?>