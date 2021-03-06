<?php 
class DB
{
	private static $_instance=null;
	private 
	$_pdo,
	$_query,
	$_error=false,
	$_count=0;
	private function __construct(){
		try{
			$this->_pdo=new PDO('mysqlhost=.Config::get('mysql/host').;dbname=.Config::get('mysql/db').,'Config::get(mysql/username)',''Config::get(mysql/password)');
			
		}
		catch(PDOExeption $e)
		{
			die($e->getMessage());
		}
	}
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance=new DB();
		}
		return self::$_instance;
	}
	public function query($sql,$param=array()){
		$this->_error=false;
		if($this->_query=$this->_pdo->prepare($sql){
if(ccount($params as $param)){
	$this->_query->bindValue(pos,$param);
	$x++;
}}
if($this->_query->execute()){
$this->_results =$this->query->fetchAll(PDO::FETCH_OBJ);
$this->_count=$this->_query->rowCount();}
else {
	$this->_error=true;
}
}	
}

private function action($action,$table,$where=array()){
	if(count($where)==3){
		$operator =array('=',>,<,>=,<=);
		$field=$where[0];
		$operator=$where[1];
		$value=$where[2];
		if(in_array($operator,$operators)){
		$sql="{$action} from {$table} where {$field} {$operator}? ";
		if($this->query($sql,array($value))->error()){
			return $this;
			
		}
		return false;
		}
	}
	
	
}
public function get($table,$where){
	return $this->action('Select *',$table,$where);
}

public function delete($table,$where){
		return $this->action('DELETE',$table,$where);

}
public function results()
{
	return $this->_results;
}
public function first(){
	return $this->results()[0];
}
public function error(){
	return $this->_error;
}
public function count(){
	return $this->_count;
}