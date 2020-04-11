<?php
session_start();
$servername = "us-cdbr-iron-east-01.cleardb.net";
    $username = "b010d93aa48454";
    $password = "ceafc16b"; 
    $dbname = "heroku_089e8d9a7502d18";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn -> set_charset("utf8");

  
  if($_POST){
      $eng11 = $_POST["eng11"];
      $eng12 = $_POST["eng12"];
      $eng21 = $_POST["eng21"];
      $eng22 = $_POST["eng22"];
      $eng31 = $_POST["eng31"];
      $engtotal = ($eng11+$eng12+$eng21+$eng22+$eng31)/5;
      $total_grade = $_POST["total_grade"];
      $school = $_POST["school"];
   

      ///////////file////////////////////
      $fp = fopen('Testeng.csv', 'w');
      $data_test = array("gradeeng,eng_term1,eng_term2,eng_term3,eng_term4,eng_term5,total,oneteng");//ชื่อหัวข้อใน csv
      foreach($data_test as $line){
        $val = explode(",",$line);
        fputcsv($fp, $val);
        }
      
      $data_test = array("$engtotal-$eng11-$eng12-$eng21-$eng22-$eng31-$total_grade-");
      foreach($data_test as $line){
        $val = explode("-",$line);
        fputcsv($fp, $val);
        }
      fclose($fp);

      // $school = $_SESSION["School"];
      $sqlCheck = "SELECT * FROM model WHERE school = '$school' AND SubjectName = 'ภาษาอังกฤษ'";
            $value = mysqli_query($conn, $sqlCheck);

            while($row = mysqli_fetch_assoc($value)) {
                $model = $row["ModelName"];
                $idmodel = $row["ID"];
            }
            //ค่าเริ่มต้นถ้าไม่ได้สร้างโมเดลไว้
            // if($model == null){
            //   $model = "Final_eng";
            // }
            if($school == "แบบจำลองต้นแบบ"){
              $model = "Final_eng";
            }
            else{
              $date = date("d-m-yy");
              $sql = "UPDATE model SET CurrentDay = '$date' WHERE ID = '$idmodel'";
              mysqli_query($conn, $sql);
            }


      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TrainEng.csv > Traineng.arff'; //เปลี่ยนเป็น Trianeng เพื่อสร้างไฟล์ Trianeng.arff อัตโนมัติ
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader Testeng.csv > Testeng.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.filters.unsupervised.attribute.StringToNominal -R last -i Testeng.arff -o TestengNew.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.classifiers.misc.InputMappedClassifier -W weka.classifiers.trees.RandomForest -L "model/'.$model.'.model" -t "Traineng.arff" -T "TestengNew.arff" -p 8';
      exec($cmd,$output);

      
      for ($i=0;$i<sizeof($output);$i++)
    { 
        trim($output[$i]);

        // echo $output[$i]."<br>";
        // $result[$i] = substr($output[$i],25,5);
        // $result_score = round($result[5],0);
        
        // echo $output[$i]."<br>";
        $result[$i] = substr($output[$i],23,9);
        // echo "Rang   ".$result[$i];
        $result_score = $result[19];
     
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
        window.location='showfaireng.php';
    </script>
  <?php }
  else if($result_score == "good" || $result_score_new == "good"){ ?>
    <script>
        window.location='showgoodeng.php';
    </script>
<?php } 
  elseif ($result_score == "excellent" || $result_score_new == "excellent"){ ?>
    <script>
        window.location='showexcellenteng.php';
    </script>
<?php }
?>