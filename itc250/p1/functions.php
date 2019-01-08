<?php

//functions.php

function sayHi()
{
    echo "Hello world.";
}

function fToC($temp)
{
    return ($temp-32)*(5/9);
}

function cToF($temp)
{
    return ($temp*(9/5))+32;
}

function cToK($temp)
{
    return $temp+273.15;
}

function kToC($temp)
{
    return $temp-273.15;
}

function fToK($temp)
{
    return ($temp-32)*(5/9)+273.15;
}

function kToF($temp)
{
    return ($temp-273.15)*(9/5)+32;
}