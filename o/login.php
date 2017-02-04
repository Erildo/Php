<?php 
require_once 'intialize.php';
if(Input::exists()){
	if(Token::check(Input::get('token'))){
	$validate=new Validate();
	$validate=$validate->check($_POST,array(
	'username'=>array('required'=>true),
	'password'=>array('required'=>true)
	));
if($validation->passed()){
	$user=new User();
	$remember=(Input::get('remember')==='on')?true :false;
	$login=$user->login(Input::get('username'),Input::get('password'));
 if($login){
Redirect::to('index.php');	 
	 
 }	
 else {
	 echo "soory login failed";
 }
	
	
}else{
	foreach($validation->errors() as $error){
		echo $error;
	}
	
}
	
	}
}


?>

<form action="" method="post">
<div class="field">
<label for='username'>Username</label>
<input type="text" name="username"id="username" autocomplete='off'>
</div>
<div class="field">
<label for='password'>Password</label>
<input type="password" name="pasword" id="password" autocomplete='off'>
</div>
<div class='field'>
<label for='remember'>
<input type='checkbox' name='remember' id='remember'>Remeber Me</label>
</div>
<input type='hidden' name='token' value='<?php echo Token::generate();?>' >
<input type='submit'value='Login'>
</form>