<?php

include 'server.php';


$sid = $_GET['s_id'];
$q = " DELETE FROM `sales` where s_id= $sid ";

mysqli_query($db, $q);

header('location:dataView.php');






?>