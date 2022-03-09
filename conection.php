<?php

class Db
{
	private static $instance=NULL;
	
	function __construct(){}

	public static function  getConnect(){
		if (!isset(self::$instance)) {
			
			self::$instance= new PDO('mysql:host=localhost;dbname=prueba_millenium','root','',array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		} 
		return self::$instance;
	}
}