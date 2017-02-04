<?php session_start();
$GLOBALS['config']=array(
'mysql'=>array(
'host'=>'127.0.0.1',
'username'=>'root',
'db'=>'lr'
),
'session'=>array(
'session_name'=>'user',
'token_name'=>'token'
),
'remember'=>array(
'cookie_name'=>'hash',
'cookie_expiry'=>604800
)
);
spl_outoload_register(function($class){
	require_once'//' . $class. .'php';
	
	
	
});
require_once 'sanitaze.php';
if(Cookie::exists(Config::get('remember/cookie_name'))&&Session::exists(Config::get('session/session_name'))){
$hash=Cookie::get(Config::get('remember/cookie_name'));
$hashcheck=DB::getInstance()->get('users_session',array('hash','=',$hash));
if($hashcheck->count()){
$user=new User($hashcheck->first()->user_id);
	$user->login();
	}
	
}