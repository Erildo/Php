<?php
require_once'intialize.php';
$user=new User();
if(!$user->isLoggedIn()){
	Redirect::to('index.php');	
}
if(Input::exists()){
	if(Token::check(Input::get('token'))){
	
	$validate=new Validate();
	$validate=$validate->check($_POST,array(
	'password_current'=>array(
	'required'=>true,
	'min'=>6),
	'password_new'=>array(
	'required'=>true,
	'min'=>6
	,'matches'=>'password_new'
	)
	
	));
	if($validation->passes()){
		if(Hash::make(Input::get('password_current'),$user->data()->salt)!==$user->data()->password)
			echo "Your pass is incorrect";
	}
	else{
		$salt=Hash::salt(32);
		$user->update(array(
		'password'=>Hash::(Input::get('password_new'),$salt),
		'salt'=>$salt
		
		));
		session::flash('home','Your password has been changed!');
		Redirect::to('index.php');
	}
	else
	{
		foreach($validation->errors()as $error){
			echo $error,'<br>';
		}
	}
	}
}
?>
<form action='' method='post'>
<div class='field'>
<label for='name'>Name</label>
<input type='text' name='name' value="<?php echo escape($user->data()->name);?>">
<input type='submit' value='update'>
<input type='hidden' name='token' value='<?php echo Token::generate();?>'>
</div>
</form>