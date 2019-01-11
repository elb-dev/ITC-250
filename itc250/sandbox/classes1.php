<?php
//classes1.php

$myPeople[] = new Person("Parker","Peter",17);
$myPeople[] = new Person("Stark","Tony",41);
$myPeople[] = new Person("Odinson","Thor",274);
$myPeople[] = new Person("Rominov","Natasha",31);

foreach($myPeople as $myPerson){
    echo "<p>My name is $myPerson->FirstName $myPerson->LastName and I'm $myPerson->Age years old.</p>";
}

/*
echo '<pre>';
var_dump($myPerson);
echo '</pre>';
*/

class Person
{
    //fields
    public $LastName = '';
    public $FirstName = ''; //default value of empty string
    public $Age = 0; //default value of empty number is 0
    //init
    public function __construct($LastName,$FirstName,$Age)
    {
        $this->LastName = $LastName;
        $this->FirstName = $FirstName;
        $this->Age = $Age;
    }
    //methods
}