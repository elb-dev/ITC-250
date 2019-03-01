<?php
//session-test2.php

session_start();

$items[] = 0;
$items[] = 2;
$items[] = 6;
$items[] = 7;
$items[] = 3;

$_SESSION['Cart'] = $items;

echo'

<pre>'.var_dump($_SESSION['Cart']).'</pre>

';

session_destroy();