<html>
<body>
<center><form method = "post" action="Aptitude1.php">
    <input type="file" name="filename"><br>
    <input type="submit" value="submit">
</form></center>
</body>
</html>

<?php

if($_POST){
    $filename = $_POST['filename'];
    echo $filename;
    $filename = "D:/dataset/".$filename;
    $i=0;
    $objCSV = fopen($filename, "r");

    while (($objArr = fgetcsv($objCSV, 1000, ",")) !== FALSE) {

        
        if($i != 0){
            
        // if($objArr[7] >= 0.00 && $objArr[7] <= 10.00) $objArr[7] = "0.00-10.00";
        // if($objArr[7] >= 10.01 && $objArr[7] <= 20.00) $objArr[7] = "10.01-20.00";
        // if($objArr[7] >= 20.01 && $objArr[7] <= 30.00) $objArr[7] = "20.01-30.00";
        // if($objArr[7] >= 30.01 && $objArr[7] <= 40.00) $objArr[7] = "30.01-40.00";
        // if($objArr[7] >= 40.01 && $objArr[7] <= 50.00) $objArr[7] = "40.01-50.00";
        // if($objArr[7] >= 50.01 && $objArr[7] <= 60.00) $objArr[7] = "50.01-60.00";
        // if($objArr[7] >= 60.01 && $objArr[7] <= 70.00) $objArr[7] = "60.01-70.00";
        // if($objArr[7] >= 70.01 && $objArr[7] <= 80.00) $objArr[7] = "70.01-80.00";
        // if($objArr[7] >= 80.01 && $objArr[7] <= 90.00) $objArr[7] = "80.01-90.00";
        // if($objArr[7] >= 90.01 && $objArr[7] <= 99.99) $objArr[7] = "90.01-99.99";
        // if($objArr[7] == 100) $objArr[7] = "100";

            // if($objArr[7] >= 0 && $objArr[7] <= 33) $objArr[7] = "fair";
            // else if($objArr[7] >= 34 && $objArr[7] <= 67) $objArr[7] = "good";
            // else if($objArr[7] >= 68 && $objArr[7] <= 100) $objArr[7] = "excellent";

            // if($objArr[7] >= 0 && $objArr[7] <= 60) $objArr[7] = "fair";
            // else if($objArr[7] >= 61 && $objArr[7] <= 100) $objArr[7] = "good";

            // if($objArr[7] >= 0 && $objArr[7] <= 20) $objArr[7] = "poor";
            // if($objArr[7] >= 0 && $objArr[7] <= 40) $objArr[7] = "improve";
            // else if($objArr[7] >= 41 && $objArr[7] <= 60) $objArr[7] = "fair";
            // else if($objArr[7] >= 61 && $objArr[7] <= 80) $objArr[7] = "good";
            // else if($objArr[7] >= 81 && $objArr[7] <= 100) $objArr[7] = "excellent";

            // $tmp = $objArr[0];
            // $sbj = "general";//work
            
            // if($tmp <= $objArr[1]){
            //     $tmp = $objArr[1];
            //     $sbj = "language";//thai
            // } 
            // if($tmp <= $objArr[2]){
            //     $tmp = $objArr[2];
            //     $sbj = "calculate";//math
            // }  
            // if($tmp <= $objArr[3]){
            //     $tmp = $objArr[3];
            //     $sbj = "calculate";//sci
            // }  
            // if($tmp <= $objArr[4]){
            //     $tmp = $objArr[4];
            //     $sbj = "language";//thai
            // }  
            // if($tmp <= $objArr[5]){
            //     $tmp = $objArr[5];
            //     $sbj = "general";//art
            // }  
            // if($tmp <= $objArr[6]){
            //     $tmp = $objArr[6];
            //     $sbj = "Social";//social
            // }  
            // if($tmp <= $objArr[7]){
            //     $tmp = $objArr[7];
            //     $sbj = "Social";//Activity
            // }  

            if(MAX($objArr) == $objArr[6] || MAX($objArr) == $objArr[5]){
                $sbj = "Social";
            }
            if(MAX($objArr) == $objArr[4] || MAX($objArr) == $objArr[7]){
                $sbj = "general";
            }
            if(MAX($objArr) == $objArr[0] || MAX($objArr) == $objArr[3]){
                $sbj = "language";
            }
            if(MAX($objArr) == $objArr[2] || MAX($objArr) == $objArr[1]){
                $sbj = "calculate";
            }
         
           
            
       
            echo "function ".MAX($objArr)."<br>";

            $objArr[8] = $sbj;
        }
        

        $data[$i] = array("$objArr[0],$objArr[1],$objArr[2],$objArr[3],$objArr[4],$objArr[5],$objArr[6],$objArr[7],$objArr[8]");
        $i++;
    }
    fclose($objCSV);
    $fp = fopen('Aptitude.csv', 'w');
    // $dataH = array ('gradeeng,eng_term1,eng_term2,eng_term3,eng_term4,eng_term5,total,oneteng');
    // foreach($dataH as $line){
    //     $val = explode(",",$line);
    //     fputcsv($fp, $val);
    //     }

    for($l = 0 ;$l < $i ; $l++){
        foreach($data[$l] as $line){
            $val = explode(",",$line);
            fputcsv($fp, $val);
            }
    }
    fclose($fp);
}
?>