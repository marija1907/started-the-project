<?php
//connection database - pdo
try{
	$connector= new PDO('mysql: host=localhost; dbname=project','root','');
    $connector->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);	
	
}catch(PDOExeption $e){
	echo $e->getMessage();
	die();
}
//print_r(PDO::getAvailableDrivers());
