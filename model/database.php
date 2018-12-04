<?php 
	
$db_host = "localhost";
$db_name = "bibliotecapp"; 
$db_username = "root"; 
$db_password = "";

class Database{

	public static function StartUp(){

		$pdo= new PDO('mysql:host=localhost;dbname=bibliotecapp;charset=utf8', 'root', '');

		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}
}

?>