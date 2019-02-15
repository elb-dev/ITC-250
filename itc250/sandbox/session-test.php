<?php
//session-test.php

//required for handling sessions.
session_start();

$_SESSION['FavoriteColor'] = 'blue';

echo $_SESSION['FavoriteColor'];