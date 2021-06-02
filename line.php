<?php
 include_once( "server.php" );
global $db;
$dataPoints = array();

try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=tgst;charset=utf8mb4', //'mysql:host=localhost;dbname=tgst;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );
	
    $handle = $link->prepare('select rate, supplyplace from sales'); 
    $handle->execute(); 
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);
		
    foreach($result as $row){
        array_push($dataPoints, array("y"=> $row->rate, "label"=> $row->supplyplace));
    }
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}
	
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welome To TGST </title>
   <link rel="stylesheet" href="css/main2.css">
   <link rel="stylesheet" href="css/home2.css">
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   
    <script src="./js/navigation.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   
      
</head>

<body>
    <header>
        <nav>
            <div class="comp-name">
                <h1><span>TGST</h1>
            </div>
            <div class="btns">
                <ul>
                    <li><a href="dash.php">Profile</a></li>
                    <li><a href="index.html">Logout</a></li>
					
                   
                </ul>
            </div>
        </nav>
	

<div class="sidebar">
  <a class="active" href="#home">Tester User</a>
  <a href="upload.php">Upload Data</a>
  <a href="dataView.php">Check Sales Data</a>
    <a href="pView.php">Check Purchase Data</a>
  
   



<div class="dropdown">
 <button class="dropbtn">Charts</button>
  <div class="dropdown-content">
    <a href="line.php">Line Chart </a>
    <a href="bar.php">Bar Chart</a>
    <a href="pie.php"> Funnel Charts</a>
	<a href="scatter.php"> Scatter Charts</a>
	<a href="pyramid.php"> Pyramid Sales Rate Charts</a>
  </div>
</div>
</div>
<div class="content">

<!-- Load Font Awesome Icon Library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


 <!--content-->
     <div class="container"> 
        <ul>
  
           <li> <div class="title"></div>Total Sales per year
              <div class="value">
			  Rs:<?php echo countSales(); ?>
			  </div>
          </li>
		 
           
           <li><div class="title"></div>Total Purchase per year
              <div class="value">Rs: <?php echo countPurchase(); ?></div>
          </li>
		  
		   <li><div class="title"></div>Maximum  Sales Rate 
              <div class="value">  <?php echo getMaximumRate(); ?></div>
          </li>
		  
		   <li><div class="title"></div>Maximum Purchase Rate 
              <div class="value">  <?php echo getMaximumpRate(); ?></div>
          </li>
		    <li> <div class="title"></div>Highest Taxable Value
              <div class="value">
			    <?php echo getMaximumTaxValue(); ?>
			  </div>
          </li>
		  
		    <li> <div class="title"></div>Total Profit
              <div class="value">
			   <?php 
                $p= (countPurchase()- countSales());
				$pr= (($p*100)/countSales());
				echo $pr;
			    ?> %
			  </div>
          </li>
		   
           
          
         
        </ul>
  
         
  
     </div>
<!-- Buttons to choose list or grid view -->
<button onclick="listView()"><i class="fa fa-bars"></i> List</button>
<button onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
<br>
<br>
<div class="row">

  
  <div class="column" style="background-color:#aaa;">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Supply Place and Rate"
	},
	axisY: {
		title: "Rate"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>


</div>
<br>
<br>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

           
        </section>
    </main>
</body>

<footer>

        
        <div class="copyrights">
            <p>&copy; 2020 <a href="index.html">TGST</a>, All rights reseverd</p>
			<p>Team Harman</p>
        </div>
   </footer>

</html>  