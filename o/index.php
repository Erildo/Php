<?php require_once' initialize.php'
echo Confing::get('mysql/host');
$users=DB::getInstance()->query('Select username from users');
if($users->count()){
	foreach($users as $user){
		echo $user->username;
	}
}
$user=DB::getInstance()->query("Select* from users")

if($user->count(){
	echo 'No user';

}
else {
	echo $user->first()->username;
	}
}
if(Session::exists('home')){
	echo '<p>'.Session::flash('home').</p>; 
}
 
 user=new User();
if($user->isloggedin()){
	echo "logged";
}