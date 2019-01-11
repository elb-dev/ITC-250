<?php
//index.php

require 'functions.php';


if(isset($_POST["InitTemp"]) && $_POST["StartTempScale"] != $_POST["EndTempScale"]){
    //Conversions
    $inputTemp = $_POST["InitTemp"];
    $StartTempScale = $_POST["StartTempScale"];
    $EndTempScale = $_POST["EndTempScale"];
    
    echo '<div>';
    if($StartTempScale == 0){
        if($EndTempScale == 1){
            //F to C
            $outputTemp = myFToC($inputTemp);
            echo "$inputTemp &#8457; to $outputTemp &#8451;";
            echo "<br />";
        }else{
            //F to K
            $outputTemp = myFToK($inputTemp);
            echo "$inputTemp &#8457; to $outputTemp &#8490;";
            echo "<br />";
        }
    }elseif($StartTempScale == 1){
        if($EndTempScale == 0){
            //C to F
            $outputTemp = myCToF($inputTemp);
            echo "$inputTemp &#8451; to $outputTemp &#8457;";
            echo "<br />";
        }else{
            //C to K
            $outputTemp = myCToK($inputTemp);
            echo "$inputTemp &#8451; to $outputTemp &#8490;";
            echo "<br />";
        }
    }elseif($StartTempScale == 2){
        if($EndTempScale == 1){
            //K to C
            $outputTemp = myKToC($inputTemp);
            echo "$inputTemp &#8490; to $outputTemp &#8451;";
            echo "<br />";
        }else{
            //K to F
            $outputTemp = myKToF($inputTemp);
            echo "$inputTemp &#8490; to $outputTemp &#8457;";
            echo "<br />";
        }
    }
    
    echo '</div>';
}else{
    echo'
    <div>
    <form action="" method="post">
    Start Temperature Scale: 
    &#8457;<input type="radio" name="StartTempScale" value=0 required />
    &#8451;<input type="radio" name="StartTempScale" value=1 required />
    &#8490;<input type="radio" name="StartTempScale" value=2 required />
    <br />
    Temperature: <input type="number" name="InitTemp" required/>
    <br />
    End Temperature Scale: 
    &#8457;<input type="radio" name="EndTempScale" value=0 required />
    &#8451;<input type="radio" name="EndTempScale" value=1 required />
    &#8490;<input type="radio" name="EndTempScale" value=2 required />
    <br/ >
    <input type="submit" />
    </form>
    </div>
    ';
}
