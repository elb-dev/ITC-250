<?php
//session-test.php

//required for handling sessions.
session_start();

<<<<<<< HEAD
if(isset($_SESSION['FavoriteColor'])){
	echo $_SESSION['FavoriteColor'];
}else{
	echo 'You did not pick a color!';
}
=======
$_SESSION['FavoriteColor'] = 'blue';

echo $_SESSION['FavoriteColor'];
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
