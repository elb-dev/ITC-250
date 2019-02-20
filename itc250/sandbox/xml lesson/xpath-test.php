<?php
//xpath-test.php

$file = 'xml/catalog.xml';

$xml = simplexml_load_file($file);

$zep = $xml->xPath('/catalog/cd[artist="Led Zeppelin"]');
/*
echo '<pre>';
var_dump($zep);
echo '</pre>';
*/

foreach($zep as $album){
    echo "<p>$album->title</p>";
}