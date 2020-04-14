<?php
   session_start();
   $Status1 = $_SESSION["Status"];
   if($Status1 != "บุคลากรภายในโรงเรียน"){
    ?>
    <script>
        window.location='index.php';
    </script>
<?php
   }
   
   
?>
<html>
<head>
<script src="Chart/Chart.min.js"></script>   
<link rel="stylesheet" href="css/bootstrap.min.css">
    
</head>
<body background = "img/da-background.jpg">
<nav class="navbar navbar-expand-lg navbar-dark static-top" style='background-color: #6699FF;' >
  <div class="container">
    <a class="navbar-brand" href="index.php">
          <img src="img/predict.png" alt="" height="70" width="200" align = "left">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">หน้าแรก
                
              </a>
        </li>
        
        <li class="nav-item active">
          <a class="nav-link" href="Train_model.php">สร้างแบบจำลอง</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<?php
     $servername = "us-cdbr-iron-east-01.cleardb.net";
     $username = "b010d93aa48454";
     $password = "ceafc16b"; 
     $dbname = "heroku_089e8d9a7502d18";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn -> set_charset("utf8");
    
    // Check connection
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // }
    // echo "Connected successfully";
    $school = $_SESSION["School"];
    $sql = "SELECT * FROM model where school = '$school'";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)) {
        // echo $row["X"]."<br>".$row["Y"]."<br>";

       if($row["SubjectName"] == "ภาษาไทย") $perThai = $row["Percentage"];
       else if($row["SubjectName"] == "ภาษาอังกฤษ") $perEng = $row["Percentage"];
       else if($row["SubjectName"] == "คณิตศาสตร์") $perMath = $row["Percentage"];
       else if($row["SubjectName"] == "วิทยาศาสตร์") $perSci = $row["Percentage"];

    }
    
?>
<div align="center">
<div class="col-9 col-md-6">

<canvas id="myChart"  style="width:100px;height:80px"></canvas>                     
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
    
        labels: ["ภาษาไทย","อังกฤษ","คณิตศาสตร์","วิทยาศาสตร์"],
        datasets: [{

            label: '<?php echo $_SESSION["School"];?>',
           
            data: [<?php 
                echo "'".$perThai."','".$perEng."','".$perMath."','".$perSci."'";
                ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 100,
                    stepSize: 5
                }
            }]
        }
    }
});
</script>
</div>
</div>
</div>
</body>
</html>