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
      $thai11 = $_POST["thai11"];
      $thai12 = $_POST["thai12"];
      $thai21 = $_POST["thai21"];
      $thai22 = $_POST["thai22"];
      $thai31 = $_POST["thai31"];
      $thaitotal = ($thai11+$thai12+$thai21+$thai22+$thai31)/5;
      $total_grade = $_POST["total_grade"];
      $school = $_POST["school"];


      ///////////file////////////////////
      $fp = fopen('TestThai.csv', 'w');
      $data_test = array("gradethai,thai_term1,thai_term2,thai_term3,thai_term4,thai_term5,tatal,onetthai");
      foreach($data_test as $line){
        $val = explode(",",$line);
        fputcsv($fp, $val);
        }
      
      $data_test = array("$thaitotal-$thai11-$thai12-$thai21-$thai22-$thai31-$total_grade-");
      foreach($data_test as $line){
        $val = explode("-",$line);
        fputcsv($fp, $val);
        }
      fclose($fp);


      // $school = $_SESSION["School"];
      $sqlCheck = "SELECT * FROM model WHERE school = '$school' AND SubjectName = 'ภาษาไทย'";
            $value = mysqli_query($conn, $sqlCheck);

            while($row = mysqli_fetch_assoc($value)) {
                $model = $row["ModelName"];
                $idmodel = $row["ID"];
            }
            //ค่าเริ่มต้นถ้าไม่ได้สร้างโมเดลไว้
            // if($model == null){
            //   $model = "Final_thai";
            // }
            if($school == "แบบจำลองต้นแบบ"){
              $model = "Final_thai";
            }
            else{
              $date = date("d-m-yy");
              $sql = "UPDATE model SET CurrentDay = '$date' WHERE ID = '$idmodel'";
              mysqli_query($conn, $sql);
            }


            
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TrainThai.csv > TrainThai.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TestThai.csv > TestThai.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.filters.unsupervised.attribute.StringToNominal -R last -i TestThai.arff -o TestThaiNew.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.classifiers.misc.InputMappedClassifier -W weka.classifiers.trees.RandomForest -L "model/'.$model.'.model" -t "TrainThai.arff" -T "TestThaiNew.arff" -p 8';
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
        window.location='showfairthai.php';
    </script>
  <?php }
  else if($result_score == "good" || $result_score_new == "good"){ ?>
    <script>
        window.location='showgoodthai.php';
    </script>
<?php } 
  elseif ($result_score == "excellent" || $result_score_new == "excellent"){ ?>
    <script>
        window.location='showexcellentthai.php';
    </script>
<?php }
  
?>