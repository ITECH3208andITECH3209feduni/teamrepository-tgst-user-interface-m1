<?php
$connect = mysqli_connect("localhost", "root", "", "tgst");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welome To TGST </title>
   <link rel="stylesheet" href="css/main2.css">
  
   <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="./owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="./owl-carousel/owl.theme.default.min.css">
    <script src="./js/navigation.js"></script>
	 <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
   
      
</head>

    <header>
        <nav>
            <div class="comp-name">
                <h1><span>TGST</h1>
            </div>
            <div class="btns">
                <ul>
                    <li><a href="dash.php">Home</a></li>
                    <li><a href="index.html">Logout</a></li>
					
                   
                </ul>
            </div>
        </nav>
		</header>
<body>
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
  </div>
</div>
</div>
  
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
  <?php 

  

    $sqlSelect = "SELECT * FROM sales";
	
    $result = mysqli_query($connect, $sqlSelect);
            if (! empty($result)) {
      {
?>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sales Data of the Company</h3>
              </div>
			   <button class="btn-danger btn"> 
         <a href="sale_delete.php" class="text-white"> Delete All Records</a>  </button>
			           <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
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
				   <th>Delete</th>
                 </tr>
                  </thead>
				 
                  <tbody>
				   	<?php
            foreach ($result as $row) {
         ?> 
				  
          <tr>
            <td><?php  echo $row['i_number']; ?></td>
            <td><?php  echo $row['i_date']; ?></td>
			<td><?php  echo $row['i_value']; ?></td>
			<td><?php  echo $row['supplyplace']; ?></td>
			<td><?php  echo $row['reversecharge']; ?></td>
			 <td><?php  echo $row['i_type']; ?></td>
			  <td><?php  echo $row['rate']; ?></td>
			   <td><?php  echo $row['tax_value']; ?></td>
			    <td> <button class="btn-danger btn"> 
         <a href="sadelete.php?s_id=<?php echo $row['s_id']; ?>" class="text-white"> Delete </a>  </button></td>
  
        </tr>
		
                 
                  <?php
    }
?>
               
                  </tbody>
				 
                  <tfoot>
                 <tr>
                    <th>Invoice Number</th>
                    <th>Invoice Date</th>
				   <th>Invoice Value</th>
				   <th>Place Of Supply</th>
				   <th>Reverse Charge</th>
				   <th>Invoice Type</th>
				   <th>Rate</th>
				   <th>Taxable Value</th>
				   <th>Delete</th>
                 </tr>
				   <?php 
} 
}
?>
                  </tfoot>
				
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
		  				
  </div>
  <!-- /.content-wrapper -->
 
 
 

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="css/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="css/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>


<footer>

        
        <div class="copyrights">
            <p>&copy; 2020 <a href="index.html">TGST</a>, All rights reseverd</p>
			<p>Team Harman</p>
        </div>
   </footer>
</html>
