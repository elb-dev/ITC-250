<?php
//static-test.php

echo "I hit 5 homers! Total Homers is now: " . totalHomers(5) . "<br />";

echo "I hit 2 homers! Total Homers is now: " . totalHomers(2) . "<br />";

echo "I hit 3 homers! Total Homers is now: " . totalHomers(3) . "<br />";

echo "I hit 1 homer! Total Homers is now: " . totalHomers(1) . "<br />";

 

function totalHomers($myHomers)

{

//static $total = 0;
$total = 0;

return $total += $myHomers;

 

}