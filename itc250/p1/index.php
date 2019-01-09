<?php
//index.php

require 'functions.php';


echo '<br/>';

//Basically, the number_format takes the number in the first argument, then the number of decimals as the second.
//Other arguments can be given, but they don't matter much and are optional.
//https://www.w3schools.com/php/func_string_number_format.asp
echo number_format(myFToC(79),2);
echo '<br/>';

echo number_format(myCToF(79),2);
echo '<br/>';

echo number_format(myFToK(79),2);
echo '<br/>';

echo number_format(myKToF(79),2);
echo '<br/>';

echo number_format(myCToK(79),2);
echo '<br/>';

echo number_format(myKToC(79),2);
echo '<br/>';

