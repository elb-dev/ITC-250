<?php
//xml-test.php

$file = 'xml/contacts.xml';

$xml = simplexml_load_file($file);

/*
echo '<pre>';
var_dump($xml);
echo '</pre>';
die;
*/

foreach($xml as $contact){
    echo "<p>$contact->FirstLast<br>";
    echo "{$contact->attributes()->Date} <br>";
    echo "$contact->CityStateZip<br>";
    echo "$contact->Phone</p>";
}