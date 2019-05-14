<?php
	function make_database_connection(){
		//school database
		$db_host = 'mysql:host=mysql.dur.ac.uk';
		$db_name = 'dbname=Xdqrs89_SE2_DUS';
		$db_user = 'dqrs89';
		$db_pass = 'dqrs89ru34nner';
		
		//local database
		/*$db_host = 'mysql:host=localhost';
		$db_name = 'dbname=DUS';
		$db_user = 'root';//change to your own username
		$db_pass = '19960614';//change to your own password*/
		
		$pdo = new PDO($db_host.';'.$db_name, $db_user, $db_pass);
		return $pdo;
	}
	
	function get_all_data($sql){
		$pdo = make_database_connection();
		$statement = $pdo->query($sql);
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}
	
	function get_one_data($sql){
		$pdo = make_database_connection();
		$statement = $pdo->query($sql);
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
?>