<?php  

	try{
		$dsn="mysql:dbname=test2;host:localhost";
		$connect=new PDO($dsn,'root','');
	}
	
	catch(PDOException $e){
		$message=$e->getMessage();
	}

?>