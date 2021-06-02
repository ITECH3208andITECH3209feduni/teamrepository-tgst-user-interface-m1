<?php

include 'server.php';



$q = " DELETE FROM `sales` ";

mysqli_query($db, $q);

header('location:dataView.php');






?>