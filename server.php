<?php


// initializing variables
$userid = "";
$username= "";
$user    = "";

$errors = array(); 
//Database configuration

define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE_NAME', 'tgst');

//Connect with the database
$db = new mysqli(HOST, USERNAME, PASSWORD, DATABASE_NAME);
if($db->connect_errno):
    die('Connect error:'.$db->connect_error);
endif;

// connect to the database
//$db = mysqli_connect('localhost', 'root', '', 'tgst');

function countSales() {
	$query = "SELECT sum(i_value) as c FROM sales";
	global $db;
	$results = mysqli_query( $db, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function countPurchase() {
	$query = "SELECT sum(i_value) as c FROM purchase1";
	global $db;
	$results = mysqli_query( $db, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}
function getMaximumRate() {
	$query = "SELECT MAX(rate) as c FROM sales";
	global $db;
	$results = mysqli_query( $db, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}

function getMaximumpRate() {
	$query = "SELECT MAX(rate) as c FROM purchase1";
	global $db;
	$results = mysqli_query( $db, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}


function getMaximumTaxValue() {
	$query = "SELECT MAX(tax_value) as c FROM sales";
	global $db;
	$results = mysqli_query( $db, $query );
	$row = mysqli_fetch_assoc( $results );
	if ( !$results || $row ) {
		return $row[ "c" ];
	} else {
		return 0;
	}

}



