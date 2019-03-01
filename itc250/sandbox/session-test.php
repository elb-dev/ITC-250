<?php
//session-test.php

//required for handling sessions.
session_start();

if(isset($_SESSION['FavoriteColor'])){
	echo $_SESSION['FavoriteColor'];
}else{
	echo 'You did not pick a color!';
}