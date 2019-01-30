<?php
//items.php

$myItem = new Item(1, 'Taco', 'A delicious taco.', 4.95);
$myItem->addExtra('salsa');
$myItem->addExtra('lime');

//Our items go back of food items
$items[] = $myItem;

$myItem = new Item(2, 'Hotdog', 'Good hotdogs.', 5.95);
$myItem->addExtra('ketchup');
$myItem->addExtra('mustard');

$items[] = $myItem;

$myItem = new Item(3, 'Sundae', 'Good sundae.', 2.95);
$myItem->addExtra('hot fudge');
$myItem->addExtra('nuts');

$items[] = $myItem;

$cost = 0;
$count = 0;
/*
echo '<pre>';
var_dump($items);
echo '</pre>';
*/

foreach($items as $item)
{
	$cost += $item->Price;
	$count ++;
	echo "<p>I ordered a $item->Name which costs $item->Price.</p>";
	echo "<p>The extras I ordered are as follows:</p>
	<ul>";
	foreach($item->Extras as $extra){
		echo "<li>$extra</li>";
	}
	echo "</ul>
	";
}

echo "<p>I ordered $count and it cost $cost.</p>";

class Item{

	//Fields
	public $ID = 0;
	public $Name = '';
	public $Description = '';
	public $Price = 0;
	public $Extras = array();

	//Constructor
	public function __construct($ID, $Name, $Description, $Price){
		$this->ID = $ID;
		$this->Name = $Name;
		$this->Description = $Description;
		$this->Price = $Price;
	}

	public function addExtra($extra){
		$this->Extras[] = $extra;
	}
}