<?php

include 'server.php';


$pid = $_GET['p_id'];
$q = " DELETE FROM `purchase1` where p_id= $pid ";

mysqli_query($db, $q);

header('location:pView.php');






?>