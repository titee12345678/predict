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
      $sci11 = $_POST["sci11"];
      $sci12 = $_POST["sci12"];
      $sci21 = $_POST["sci21"];
      $sci22 = $_POST["sci22"];
      $sci31 = $_POST["sci31"];
      $scitotal = ($sci11+$sci12+$sci21+$sci22+$sci31)/5;
      $total_grade = $_POST["total_grade"];
      $school = $_POST["school"];
    
  

      ///////////file////////////////////
      $fp = fopen('TestSci.csv', 'w');
      $data_test = array("gradesci,sci_term1,sci_term2,sci_term3,sci_term4,sci_term5,total,onetsci");//ชื่อหัวข้อใน csv
      foreach($data_test as $line){
        $val = explode(",",$line);
        fputcsv($fp, $val);
        }
      
      $data_test = array("$scitotal-$sci11-$sci12-$sci21-$sci22-$sci31-$total_grade-");
      foreach($data_test as $line){
        $val = explode("-",$line);
        fputcsv($fp, $val);
        }
      fclose($fp);

      // $school = $_SESSION["School"];
      $sqlCheck = "SELECT * FROM model WHERE school = '$school' AND SubjectName = 'วิทยาศาสตร์'";
            $value = mysqli_query($conn, $sqlCheck);

            while($row = mysqli_fetch_assoc($value)) {
                $model = $row["ModelName"];
                $idmodel = $row["ID"];
            }
            //ค่าเริ่มต้นถ้าไม่ได้สร้างโมเดลไว้
            // if($model == null){
            //   $model = "Final_sci";
            // }
            if($school == "แบบจำลองต้นแบบ"){
              $model = "Final_sci";
            }
            else{
              $date = date("d-m-yy");
              $sql = "UPDATE model SET CurrentDay = '$date' WHERE ID = '$idmodel'";
              mysqli_query($conn, $sql);
            }


      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TrainSci.csv > Trainsci.arff'; //เปลี่ยนเป็น Triansci เพื่อสร้างไฟล์ Triansci.arff อัตโนมัติ
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TestSci.csv > TestSci.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.filters.unsupervised.attribute.StringToNominal -R last -i TestSci.arff -o TestSciNew.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.classifiers.misc.InputMappedClassifier -W weka.classifiers.trees.RandomForest -L "model/'.$model.'.model" -t "Trainsci.arff" -T "TestSciNew.arff" -p 8';
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
        window.location='showfairsci.php';
    </script>
  <?php }
  else if($result_score == "good" || $result_score_new == "good"){ ?>
    <script>
        window.location='showgoodsci.php';
    </script>
<?php } 
  elseif ($result_score == "excellent" || $result_score_new == "excellent"){ ?>
    <script>
        window.location='showexcellentsci.php';
    </script>
<?php }
?>