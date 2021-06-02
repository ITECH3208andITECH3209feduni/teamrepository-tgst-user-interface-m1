<?php

include 'server.php';



$q = " DELETE FROM `purchase1` ";

mysqli_query($db, $q);

header('location:pView.php');






?>