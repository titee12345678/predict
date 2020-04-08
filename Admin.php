<html>
<head>
</head>
<body>
    <?php
         $servername = "us-cdbr-iron-east-04.cleardb.net";
         $username = "bbe7a9b2c37b7d";
         $password = "e7c2625f";
         $dbname = "heroku_02daed7a46fa0e7";
  
 
         // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);
         $conn -> set_charset("utf8");

        $sql = "SELECT * FROM model";
        $result = mysqli_query($conn, $sql);
        $i = 0;
        while($row = mysqli_fetch_assoc($result)) {

            $id[$i] = $row["ID"];
            $model[$i] = $row["ModelName"];
            $subject[$i] = $row["SubjectName"];
            $school[$i] = $row["school"];
            $date[$i] = $row["CurrentDay"];

            $i++;
        
        }



        $sqluser = "SELECT * FROM user";
        $result1 = mysqli_query($conn, $sqluser);
        $i1 = 0;
        while($row1 = mysqli_fetch_assoc($result1)) {

            $id1[$i1] = $row1["UserID"];
            $username[$i1] = $row1["UserName"];
            $userpassword[$i1] = $row1["UserPassword"];
            $sname[$i1] = $row1["SchoolName"];
            $ustatus[$i1] = $row1["UserStatus"];
            $i1++;
        
        }
    ?>

    <table border = "1">
        <tr><th>ลำดับ</th><th>ชื่อโมเดล</th><th>วิชา</th><th>โรงเรียน</th><th>วันที่ใช้งานล่าสุด</th><th>ลบโมเดล</th></tr>
        <?php for($i=0;$i<sizeof($id);$i++){?>   
        <tr><td><?php echo $i+1;?></td><td><?php echo $model[$i];?></td><td><?php echo $subject[$i];?></td><td><?php echo $school[$i];?></td><td><?php echo $date[$i];?></td>
        <td><a href="Database.php?type=DeleteModel&id=<?php echo $id[$i];?>" onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?');">ลบ</a></td></tr>
        
        <?php }?>
    </table>



    <table border = "1">
        <tr><th>ลำดับ</th><th>ชื่อ</th><th>รหัสผ่าน</th><th>โรงเรียน</th><th>สถานะ</th><th>ลบผู้ใช้</th></tr>
        <?php for($i1=0;$i1<sizeof($id1);$i1++){?>   
        <tr><td><?php echo $i1+1;?></td><td><?php echo $username[$i1];?></td><td><?php echo $userpassword[$i1];?></td><td><?php echo $sname[$i1];?></td><td><?php echo $ustatus[$i1];?></td>
        <td><a href="Database.php?type=DeleteModel&id=<?php echo $id1[$i1];?>" onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?');">ลบ</a></td></tr>
        
        <?php }?>
    </table>
    
</body>
</html>