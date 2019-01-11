<?php

//functions.php

function myFToC($temp)
{
    return ($temp-32)*(5/9);
}

function myCToF($temp)
{
    return ($temp*(9/5))+32;
}

function myCToK($temp)
{
    return $temp+273.15;
}

function myKToC($temp)
{
    return $temp-273.15;
}

function myFToK($temp)
{
    return ($temp-32)*(5/9)+273.15;
}

function myKToF($temp)
{
    return ($temp-273.15)*(9/5)+32;
}
