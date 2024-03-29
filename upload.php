<?php
$connect = mysqli_connect("localhost", "root", "", "tgst");
$output = '';

$male_status = 'unchecked';
$female_status = 'unchecked';



if(isset($_POST["import"]))
{
  $selected_radio = $_POST['type'];	

	
	
 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'>Data Inserted</label><br /><table class='table table-bordered'>";
  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++)
   {
    $output .= "<tr>";
    
	$invoiceNumber = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $invoiceDate = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
	$invoiceValue = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
	$placeSupply = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
	$reverseCharge = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
	$invoiceType = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
	$rate = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $taxableValue = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
	
	if ($selected_radio == 'sales') {
	
	 
    $query = "INSERT INTO sales(i_number, i_date, i_value, supplyplace,reversecharge,i_type,rate,tax_value) VALUES ('".$invoiceNumber."', '".$invoiceDate."', '".$invoiceValue."', '".$placeSupply."', '".$reverseCharge."', '".$invoiceType."', '".$rate."', '".$taxableValue."')";
    mysqli_query($connect, $query);
    
	$output .= '<td>'.$invoiceNumber.'</td>';
    $output .= '<td>'.$invoiceDate.'</td>';
	$output .= '<td>'.$invoiceValue.'</td>';
	$output .= '<td>'.$placeSupply.'</td>';
	$output .= '<td>'.$reverseCharge.'</td>';
	$output .= '<td>'.$invoiceType.'</td>';
    $output .= '<td>'.$rate.'</td>';
    $output .= '<td>'.$taxableValue.'</td>';
    $output .= '</tr>';
	}
	elseif($selected_radio == 'purchase'){
		
		 $query2 = "INSERT INTO purchase1(i_number, i_date, i_value, supplyplace,reversecharge,i_type,rate,tax_value) VALUES ('".$invoiceNumber."', '".$invoiceDate."', '".$invoiceValue."', '".$placeSupply."', '".$reverseCharge."', '".$invoiceType."', '".$rate."', '".$taxableValue."')";
    mysqli_query($connect, $query2);
    
	$output .= '<td>'.$invoiceNumber.'</td>';
    $output .= '<td>'.$invoiceDate.'</td>';
	$output .= '<td>'.$invoiceValue.'</td>';
	$output .= '<td>'.$placeSupply.'</td>';
	$output .= '<td>'.$reverseCharge.'</td>';
	$output .= '<td>'.$invoiceType.'</td>';
    $output .= '<td>'.$rate.'</td>';
    $output .= '<td>'.$taxableValue.'</td>';
    $output .= '</tr>';
	
	}

   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Invalid File</label>'; //if non excel file then
 }
}


?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welome To TGST </title>
   <link rel="stylesheet" href="css/main2.css">
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
   
   

   <style>

  .outer-container {
	background-color: #DBF9FC;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
	position: center;
	margin-left: 50px;
	margin-right: 50px;
	text-align: center;
}
  .outer-container .label{
	background-color:#E74C3C ;
	border:1px solid #ccc;
    border-radius:2px;
    margin-top:10px;
	font-size: 0.9em;
	width: 100%;
	text-align: center;
	left: 10;
  position: center;
  text-align: center;
  
  
	
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
	padding: 5px 20px;
	font-size: 0.9em;
}

.tutorial-table {
	margin-top: 40px;
	font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
	background: #f0f0f0;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
	background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
	padding: 10px;
	margin-top: 10px;
	border-radius: 2px;
	display: none;
}

.success {
	background: #c7efd9;
	border: #bbe2cd 1px solid;
}

.error {
	background: #fbcfcf;
	border: #f3c6c7 1px solid;
}

div#response.display-block {
	display: block;
}

 /* Formatting search box */
    .search-box{
        width: 100%;
        text-align:center;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 10%;
		
    }
    .search-box input[type="text"], .result{
        width: 40%;
        box-sizing: border-box;
		background: #FFF;
		margin-left: 10px;
		text-color:#000000
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
	
	
	/* Customize the label (the container) */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

      
</head>

<body>
    <header>
        <nav>
            <div class="comp-name">
                <h1><span>TGST</h1>
            </div>
            <div class="btns">
                <ul>
                    <li><a href="dash.php">Home</a></li>
                    <li><a href="dash.php">Profile</a></li>
					<li><a href="index.html">Log Out</a></li>
                   
                </ul>
            </div>
        </nav>
        <section class="inhead-sec">
            <h2>Please Upload Your Excel File( Only Excel file is acceptable)</h2><br>

   <div class="outer-container">
     <form method="post" enctype="multipart/form-data">
            <div class="label">
                <label>Choose Excel
                    File</label> <input type="file" name="excel"
                    id="file" accept=".xls,.xlsx"></div><br>
					
					<div class= "radio"   >
					<Input type = 'Radio' Name ='type' value= 'sales'>
					
                      >Sales
					
					 
					  
					<Input type = 'Radio' Name ='type' value= 'purchase'>
					
                     >Purchase
					
					</div>
					<br>
               
                <button type="submit" id="import" name="import"
                    class="btn-submit" value="import">Import</button>
        
            </div>
   
   </form>
   </div>
   <br>
   <br>
   
  
	
	
	<?php 

  

    $sqlSelect = "SELECT * FROM sales where tax_value > 2000 ";
	
$result = mysqli_query($connect, $sqlSelect);
if (! empty($result)) {
{
?>
<label><h2>Sample of the Data</h2></label>
     <table class='tutorial-table'>
        <thead>
            <tr>
                <th>Invoice Number</th>
                <th>Invoice Date</th>
				<th>Invoice Value</th>
				<th>Place Of Supply</th>
				<th>Reverse Charge</th>
				<th>Invoice Type</th>
				<th>Rate</th>
				<th>Taxable Value</th>

            </tr>
        </thead>
		
		<?php
            foreach ($result as $row) {
         ?> 
		<tbody>
        <tr>
            <td><?php  echo $row['i_number']; ?></td>
            <td><?php  echo $row['i_date']; ?></td>
			<td><?php  echo $row['i_value']; ?></td>
			<td><?php  echo $row['supplyplace']; ?></td>
			<td><?php  echo $row['reversecharge']; ?></td>
			 <td><?php  echo $row['i_type']; ?></td>
			  <td><?php  echo $row['rate']; ?></td>
			   <td><?php  echo $row['tax_value']; ?></td>
        </tr>
		<?php
    }
?>
    </tbody>
    </table>
<?php 
} 
}
?>
	
			
		</section>
  </div>
 </body>

<footer>

        
        <div class="copyrights">
            <p>&copy; 2020 <a href="index.html">TGST</a>, All rights reseverd</p>
			<p>Team Harman</p>
        </div>
   </footer>
