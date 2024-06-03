<?php

$host="localhost";
$username="root";
$password="";
$database="jamin_penal";

// session_start();

$connction=mysqli_connect($host,$username,$password,$database);
if($connction==false){
	die("connection error");
}




?>