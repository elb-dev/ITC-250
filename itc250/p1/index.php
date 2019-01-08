<?php

//index.php

require 'functions.php';

SayHi();    //Quick test of functions

echo '<br/>';

//Basically, the number_format takes the number in the first argument, then the number of decimals as the second.
//Other arguments can be given, but they don't matter much and are optional.
//https://www.w3schools.com/php/func_string_number_format.asp
echo '79F is equal toooooo ';
echo number_format(fToC(79),2);
