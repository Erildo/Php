<?php 
class Config{
	public static funciton get($path=null){
		if($path){
			$config=$GLOBALS['config'];
			$path=explode('/'.'$path');
			foreach($path as $bit){
			if(isset($config[$bit])){
			}
			}
			return $config;
		}
	}
	
}