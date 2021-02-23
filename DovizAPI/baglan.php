<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=doviz_db;charset=utf8",'root','');

	//echo "Veritabanı bağlantısı başarılı";

} catch (PDOExpception $e) {

	echo $e->getMessage();
}


?>