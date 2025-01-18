<?php
	function getConnexion(){
		// la connexion
	        $server = 'db.3wa.io';
            $port = 3306;
            $dbname = 'sandieemonts_concert';
            $username = 'sandieemonts';
            $password = '430960e1c4c153edc5b3f4bb023331fc';

		// Construction de la chaîne de connexion : Data Source Name
		$dsn = "mysql:host=$server;port=$port;dbname=$dbname;charset=utf8";
		$retVal = null;
		try{
			$retVal = new PDO($dsn, $username, $password);
		}catch(PDOException $ex){
			print('Impossible de se connecter');
			die();
		}
		return $retVal;
	}

