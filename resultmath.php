<?php
session_start();
$servername = "us-cdbr-iron-east-04.cleardb.net";
    $username = "bbe7a9b2c37b7d";
    $password = "e7c2625f"; 
    $dbname = "heroku_02daed7a46fa0e7";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset("utf8");


  if($_POST){
      $math11 = $_POST["math11"];
      $math12 = $_POST["math12"];
      $math21 = $_POST["math21"];
      $math22 = $_POST["math22"];
      $math31 = $_POST["math31"];
      $mathtotal = ($math11+$math12+$math21+$math22+$math31)/5;
      $total_grade = $_POST["total_grade"];
      $school = $_POST["school"];


      ///////////file////////////////////
      $fp = fopen('Testmath.csv', 'w');
      $data_test = array("grademath,math_term1,math_term2,math_term3,math_term4,math_term5,total,onetmath");//ชื่อหัวข้อใน csv
      foreach($data_test as $line){
        $val = explode(",",$line);
        fputcsv($fp, $val);
        }
      
      $data_test = array("$mathtotal-$math11-$math12-$math21-$math22-$math31-$total_grade-");
      foreach($data_test as $line){
        $val = explode("-",$line);
        fputcsv($fp, $val);
        }
      fclose($fp);

      // $school = $_SESSION["School"];
      $sqlCheck = "SELECT * FROM model WHERE school = '$school' AND SubjectName = 'คณิตศาสตร์'";
            $value = mysqli_query($conn, $sqlCheck);

            while($row = mysqli_fetch_assoc($value)) {
                $model = $row["ModelName"];
                $idmodel = $row["ID"];
            }
            //ค่าเริ่มต้นถ้าไม่ได้สร้างโมเดลไว้
            // if($model == null){
            //   $model = "Final_math";
            // }
            if($school == "แบบจำลองต้นแบบ"){
              $model = "Final_math";
            }
            else{
              $date = date("d-m-yy");
              $sql = "UPDATE model SET CurrentDay = '$date' WHERE ID = '$idmodel'";
              mysqli_query($conn, $sql);
            }


      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TrainMath.csv > Trainmath.arff'; //เปลี่ยนเป็น Trianmath เพื่อสร้างไฟล์ Trianmath.arff อัตโนมัติ
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader Testmath.csv > Testmath.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.filters.unsupervised.attribute.StringToNominal -R last -i Testmath.arff -o TestmathNew.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.classifiers.misc.InputMappedClassifier -W weka.classifiers.trees.RandomForest -L "model/'.$model.'.model" -t "Trainmath.arff" -T "TestmathNew.arff" -p 8';
      exec($cmd,$output);

      
      for ($i=0;$i<sizeof($output);$i++)
    { 
        trim($output[$i]);

        //echo $output[$i]."<br>";
        // $result[$i] = substr($output[$i],25,5);
        // $result_score = round($result[5],0);
        
        // echo $output[$i]."<br>";
        $result[$i] = substr($output[$i],23,9);
        // echo "Rang   ".$result[$i];
     
    }
    $result_score = $result[19];
    if($result_score != "excellent") $result_score_new = $result[31];
    
    if($result_score != "excellent" && $result_score_new != "excellent"){
        
      $result_score = substr($result_score,4,4);
      $result_score_new = substr($result_score_new,4,4);
    }
    
  }
  if($result_score == "fair" || $result_score_new == "fair") $_SESSION['show'] = "คะแนนของคุณอยู่ระดับ 'พอใช้' คือ 0-33 คะแนน";
  else if($result_score == "good" || $result_score_new == "good") $_SESSION['show'] = "คะแนนของคุณอยู่ระดับ 'ดี' คือ 34-66 คะแนน";
  elseif ($result_score == "excellent" || $result_score_new == "excellent") $_SESSION['show'] = "คะแนนของคุณอยู่ระดับ 'ดีมาก' คือ 67-100 คะแนน";

  if($result_score == "fair" || $result_score_new == "fair" ){ ?>
    <script>
        window.location='showfairmath.php';
    </script>
  <?php }
  else if($result_score == "good" || $result_score_new == "good"){ ?>
    <script>
        window.location='showgoodmath.php';
    </script>
<?php } 
  elseif ($result_score == "excellent" || $result_score_new == "excellent"){ ?>
    <script>
        window.location='showexcellentmath.php';
    </script>
<?php }

?>