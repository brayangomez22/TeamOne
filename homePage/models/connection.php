<?php

class Connection{

	public function connect(){

		$link = new PDO("mysql:host=localhost;dbname=teamone",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;

	}

}