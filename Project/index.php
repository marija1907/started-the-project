<?php
//povezivaje sa bazom
$connect = "connect.php";
if(file_exists($connect)){
	include_once($connect);
}else{
	die("Konekcija greska!<br>");
}


include("navigacija.html");


if(isset($_GET['opcija'])){
	$opcija 	= $_GET['opcija'];
	$fajl 		= $opcija . ".php";
	if(file_exists($fajl)){
	include_once($fajl);
	}else{
		echo "Greska!Strana ne postoji!" ;
	}
}
else{
	include_once ("postovi.php");
}




