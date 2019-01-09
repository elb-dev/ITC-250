<?php
//classes1.php

$myPerson = new Person();

echo $myPerson->Age;

class Person
{
    //init
    //fields
    public $FirstName = ''; //default value of empty string
    public $LastName = '';
    public $Age = 0; //default value of empty number is 0
    //methods
}