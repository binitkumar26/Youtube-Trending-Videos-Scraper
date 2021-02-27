<?php

$manager     =   new MongoDB\Driver\Manager("mongodb://localhost:27017");

/* success, error messages to be displayed */

 $messages = array(
  1=>'Record deleted successfully',
  2=>'Error occurred. Please try again', 
  3=>'Record saved successfully',
  4=>'Record updated successfully', 
  5=>'All fields are required' );

 
ini_set('max_execution_time', 0); // for infinite time of execution

error_reporting(E_ALL);
ini_set('display_errors', 0);
$url='http://localhost:5000/';
$youtube_url='https://www.youtube.com/';
?>
