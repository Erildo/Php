<?php
require_once 'intialize.php';
$user=new User();
$user->logout();
Redirect::to('index.php');
?>