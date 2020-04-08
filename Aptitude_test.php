<?php
session_start();

  if($_POST){
      $thai11 = $_POST["thai11"];   
      $thai12 = $_POST["thai12"];   
      $thai21 = $_POST["thai21"];   
      $thai22 = $_POST["thai22"];
      $total_thai =  (( $thai11*1.5)+( $thai12*1.5)+( $thai21*1.5)+( $thai22*1.5))/6;
      
      $math11 = $_POST["math11"];
      $mathex11 = $_POST["mathex11"];
      $math12 = $_POST["math12"];
      $mathex12 = $_POST["mathex12"];
      $math21 = $_POST["math21"];
      $mathex21 = $_POST["mathex21"];
      $math22 = $_POST["math22"];
      $mathex22 = $_POST["mathex22"];
      $total_math =(( $math11*1.5 )+( $math12*1.5 )+( $math21*1.5 )+( $math22*1.5 )+( $mathex11*1)+( $mathex12* 1)+( $mathex21* 1)+( $mathex22* 1))/10;

      $art11 = $_POST["art11"];   
      $art12 = $_POST["art12"];   
      $art21 = $_POST["art21"];   
      $art22 = $_POST["art22"];
      $total_art =  (($art11*1)+($art12*1)+($art21*1)+($art22*1))/4;

      $sci11 = $_POST["sci11"];   
      $sci12 = $_POST["sci12"];   
      $sci21 = $_POST["sci21"];   
      $sci22 = $_POST["sci22"];
      $total_sci =  (($sci11*1.5)+($sci12*1.5)+($sci21*1.5)+($sci22*1.5))/6;

      $social11 = $_POST["social11"];
      $history11 = $_POST["history11"];
      $people11 = $_POST["people11"];
      $social12 = $_POST["social12"];
      $history12 = $_POST["history12"];
      $people12 = $_POST["people12"];
      $social21 = $_POST["social21"];
      $history21 = $_POST["history21"];
      $people21 = $_POST["people21"];
      $social22 = $_POST["social22"];
      $history22 = $_POST["history22"];
      $people22 = $_POST["people22"];
      $total_social = (($social11*1.5)+($social12*1.5)+($social21*1.5)+($social22*1.5)+($history11*0.5)+($history12*0.5)
      +($history21*0.5)+($history22*0.5)+($people11*0.5)+($people12*0.5)+($people21*0.5)+($people22*0.5))/10;
      
      $sport11 = $_POST["sport11"];
      $sportex11 = $_POST["sportex11"];
      $sport12 = $_POST["sport12"];
      $sportex12 = $_POST["sportex12"];
      $sport21 = $_POST["sport21"];
      $sportex21 = $_POST["sportex21"];
      $sport22 = $_POST["sport22"];
      $sportex22 = $_POST["sportex22"];
      $total_activity =  (($sport11*0.5)+($sport12*0.5)+($sport21*0.5)+($sport22*0.5)+($sportex11*0.5)+($sportex12*0.5)+($sportex21*0.5)+($sportex22*0.5))/4;

      $work11 = $_POST["work11"];   
      $work12 = $_POST["work12"];   
      $work21 = $_POST["work21"];   
      $work22 = $_POST["work22"];
      $total_work = (($work11*1)+($work12*1)+($work21*1)+($work22*1))/4;

      $eng11 = $_POST["eng11"];   
      $eng12 = $_POST["eng12"];   
      $eng21 = $_POST["eng21"];   
      $eng22 = $_POST["eng22"];
      $total_eng = (($eng11*1.5)+($eng12*1.5)+($eng21*1.5)+($eng22*1.5))/6;
     
      
 

      ///////////file////////////////////
      $fp = fopen('TestAptitude.csv', 'w');
      $data_test = array("Thai,Math,Sci,Eng,Art,Social,Activity,Work,class");
      foreach($data_test as $line){
        $val = explode(",",$line);
        fputcsv($fp, $val);
        }
      
      $data_test = array("$total_thai-$total_math-$total_sci-$total_eng-$total_art-$total_social-$total_activity-$total_work-");
      foreach($data_test as $line){
        $val = explode("-",$line);
        fputcsv($fp, $val);
        }
      fclose($fp);


      //test
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader Aptitude.csv > Aptitude.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader TestAptitude.csv > TestAptitude.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.filters.unsupervised.attribute.StringToNominal -R last -i TestAptitude.arff -o TestAptitudeNew.arff';
      exec($cmd);
      $cmd = 'java -classpath "weka.jar" weka.classifiers.misc.InputMappedClassifier -W weka.classifiers.trees.RandomForest -L "model/aptitude_model92_randomforest.model" -t "Aptitude.arff" -T "TestAptitudeNew.arff" -p 9';
      exec($cmd,$output);
 

      
      for ($i=0;$i<sizeof($output);$i++)
    { 
        trim($output[$i]);
  

        //  echo $output[20]."<br>";
       
        $result_aptitude = substr($output[20],25,6);
        $error_pre = substr($output[20],32,15);
        // $result_score = round($result[5],0);
        
        // echo $output[$i]."<br>";
        // $result[$i] = substr($output[$i],23,9);
        
        // $result_score = $result[19];
     
    }
  
    $_SESSION["error_pre"] = $error_pre*100; //*******Percen*******

    if($result_aptitude != "Social")  $result_aptitude = substr($output[20],23,9);
    if($result_aptitude != "calculate" && $result_aptitude != "Social")  $result_aptitude = substr($output[20],23,8);
    if($result_aptitude != "language" && $result_aptitude != "calculate" && $result_aptitude != "Social")  $result_aptitude = substr($output[20],24,7);
    //if($result_aptitude != "language" && $result_aptitude != "calculate" && $result_aptitude != "Social")  $result_aptitude = substr($output[20],23,7);
    

    // echo "result_aptitude   ".$result_aptitude."<br>";


    if($result_aptitude == "language" ){ ?>
      <script>
          window.location='showthai_aptitude.php';
      </script>
    <?php }
    else if($result_aptitude == "calculate"){ ?>
      <script>
          window.location='showsci_aptitude.php';
      </script>
  <?php } 
    elseif ($result_aptitude == "general"){ ?>
      <script>
          window.location='showwork_aptitude.php';
      </script>
  <?php }
  else if($result_aptitude == "Social"){ ?>
    <script>
        window.location='showsocial_aptitude.php';
    </script>
<?php } 
  

 
 
}
    
?>