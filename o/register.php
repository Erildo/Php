<?php 
require_once 'intialize.php';
var_dump(Token::check(Input::get('token')));

	if(Input::exists()){
		if(Token::check(Input::get('token'))){
			echo'I have been run!';
$validate=new Validate();
$validation=$validate->check($_POST,array(
'username'=>array(
'required'=>true,
'min'=>2,
'max'=>20,
'unique'=>'users'
),
'password'=>array(
'required'=>true,
'min'=>6),
'password_again'=>array(
'required'=>true,
'min'=>6,
'matches'=>'password'),
'name'=>array('required'=>true,
'min'=>2,
'max'=>50
)

));
if($validation->passed(){
$user=new User();
$salt=Hash::salt(32);

try{
	$user->create(array(
	'username'=>Input::get('username'),
	'psasword'=>Hash::make(Input::get('password'),$salt),
	'salt'=>$salt,
	'naem'=>Input::get('name'),
	'joined'=>date('Y-m-d H:i:s'),
	'group'=>1
	));
	Session::flash('home','You have been reg');
	header('home.php');
	Redirect::to(404);
}
catch (Exeption $e){
	die($e->getMessage());
	
	
}
}
else 
{
foreach($validation->errors() as $error){
	echo $error;
}	
}
}
?>


<form action="" method="post">
<div class='field'>
<label for='usermame'>Username</label>
<input type="text"name="username" id='username' value='<?echo escape(Input::get('username');)?>' autocomplete='off'>
</div>
<div class='field'>
<label for='password'>Choose a password</label>
<input type='password' name='password' id='password'>
</div>
<div class='field'>
<label for='password_again'>Repeat the password</label>
<input type='password' name='password_again' value='' id='password_again'>
</div>
<div class='field'>
<label for='name'>Repeat the password</label>
<input type='text' name='name' id='name'value='<?echo Input::get('username');?>'>
</div>
<input type="hidden"name='token' value='<?php echo token::generate();?>'>
<input type='submit' value='Register'>


</form>