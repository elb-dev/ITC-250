<?php
//index.php
require 'functions.php';

echo //load the html stuff
	'
	<head>
	<link rel="stylesheet" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	</head>
	<body>
	<div class="form">
	<p><i class="fas fa-cloud-sun-rain fa-5x"></i></p> <!--FA-Icon-->'
	;

if(isset($_POST["InitTemp"]) && $_POST["StartTempScale"] != $_POST["EndTempScale"]){
    //Conversions
    $inputTemp = $_POST["InitTemp"];
    $StartTempScale = $_POST["StartTempScale"];
    $EndTempScale = $_POST["EndTempScale"];
    
    
	echo 
	'<h2>Result </h2>
	<div class="input">
	<span class="container">
	';
    if($StartTempScale == 0){
        if($EndTempScale == 1){
            //F to C
            $outputTemp = myFToC($inputTemp);
            $formatInputTemp = number_format($inputTemp,2);
            $formatOutputTemp = number_format($outputTemp,2);
            echo "$formatInputTemp &#8457; to $formatOutputTemp &#8451;";
            echo "<br />";
        }else{
            //F to K
            $outputTemp = myFToK($inputTemp);
            $formatInputTemp = number_format($inputTemp,2);
            $formatOutputTemp = number_format($outputTemp,2);
            echo "$formatInputTemp &#8457; to $formatOutputTemp &#8490;";
            echo "<br />";
        }
    }elseif($StartTempScale == 1){
        if($EndTempScale == 0){
            //C to F
            $outputTemp = myCToF($inputTemp);
            $formatInputTemp = number_format($inputTemp,2);
            $formatOutputTemp = number_format($outputTemp,2);
            echo "$formatInputTemp &#8451; to $formatOutputTemp &#8457;";
            echo "<br />";
        }else{
            //C to K
            $outputTemp = myCToK($inputTemp);
            $formatInputTemp = number_format($inputTemp,2);
            $formatOutputTemp = number_format($outputTemp,2);
            echo "$formatInputTemp &#8451; to $formatOutputTemp &#8490;";
            echo "<br />";
        }
    }elseif($StartTempScale == 2){
        if($EndTempScale == 1){
            //K to C
            $outputTemp = myKToC($inputTemp);
            $formatInputTemp = number_format($inputTemp,2);
            $formatOutputTemp = number_format($outputTemp,2);
            echo "$formatInputTemp &#8490; to $formatOutputTemp &#8451;";
            echo "<br />";
        }else{
            //K to F
            $outputTemp = myKToF($inputTemp);
            $formatInputTemp = number_format($inputTemp,2);
            $formatOutputTemp = number_format($outputTemp,2);
            echo "$formatInputTemp &#8490; to $formatOutputTemp &#8457;";
            echo "<br />";
        }
    }
    
    echo '
	</span>
	<h2><div class="button" ><a href="http://derekheducation.dreamhosters.com/itc250/p1/">Go Back</a></div</h2>
	</div>
	';
}else{
    echo'
    
    <form action="" method="post">

	
	<!--label for first degree input-->	
    <label for="startTempScale"><h2>Start Temperature Scale: </h2></label>
	
    
	<label class="container">&#8457;<input class="form-radio" type="radio" name="StartTempScale" value=0 id="startTempScale" checked="checked" required />  
	<span class="checkmark"></span>
	</label>

    <label class="container">&#8451;<input class="form-radio" type="radio" name="StartTempScale" value=1 id="startTempScale" required />
	<span class="checkmark"></span>
	</label> 
	
    <label class="container">&#8490;<input class="form-radio" type="radio" name="StartTempScale" value=2 id="startTempScale" required />
	<span class="checkmark"></span>
	</label>    
	<!---->
	
    <!--number input-->
	<div class="input">
	<label for="required-input" placeholder"><h2>Enter Temperature: </h2></label>
	<input type="number" name="InitTemp" id="required-input" placeholder="Enter degrees" required/>
	<!---->
	</div>
	
	<!--label for second degree input-->
    <label for="endTempScale"><h2>End Temperature Scale: </h2></label>
	
    <label class="container">&#8457;<input type="radio" name="EndTempScale" value=0 id="endTempScale" required />
	<span class="checkmark"></span>
	</label>
	
    <label class="container">&#8451;<input type="radio" name="EndTempScale" value=1 id="endTempScale" checked="checked" required />
	<span class="checkmark"></span>
	</label>
	
    <label class="container">&#8490;<input type="radio" name="EndTempScale" value=2 id="endTempScale" required />
	<span class="checkmark"></span>
	</label>
	
    <br/ >
	<!---->
	
    <input type="submit" />
    </form>
    ';
}

echo '

	</div>
	</body>
';
 