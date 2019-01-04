<?php
//form1.php

/*

If data is submitted, show it.
If no data is submitted, show the form.

*/

if(isset($_POST["FirstName"])){   //If data is submitted, show it.
    //echo $_POST["FirstName"];
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
}else{  //If no data is submitted, show the form.
    echo '
    <form action="" method="post">
    First Name: <input type="text" name="FirstName" />
    <br/>
    Do you like movies?: 
    <br/>
    <input type="radio" value="yes" name="Movies" /> Yes!
    <br/>
    <input type="radio" value="no" name="Movies" /> No!
    <br/>
    Favorite Sundae Toppings:
    <br/>
    <input type ="checkbox" value="nuts" name="Toppings[]" /> Nuts <br/>
    <input type ="checkbox" value="fudge" name="Toppings[]" /> Hot Fudge <br/>
    <input type ="checkbox" value="cherry" name="Toppings[]" /> Cherry <br/>
    <input type ="checkbox" value="oreo" name="Toppings[]" /> Oreo Crumbles <br/>
    <input type="submit" />
    </form>
    ';
}