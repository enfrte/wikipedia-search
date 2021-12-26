<?php 

// Turn on/off debugging in the app

$debug = true; // On/Off switch

if ($debug) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}
