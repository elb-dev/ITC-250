<?php
//login-test.php

//required for handling sessions.
session_start();

$_SESSION['AdminID'] = 4;

if(isset($_SESSION['AdminID'])){
	echo 'Welcome AdminID:' . $_SESSION['AdminID'];
}else{
	header('Location: http://google.com');
}