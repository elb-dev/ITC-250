<?php
<<<<<<< HEAD

=======
/**
 * survey_view.php is a page to demonstrate the proof of concept of the 
 * initial SurveySez objects.
 *
 * Objects in this version are the Survey, Question & Answer objects
 * 
 * @package SurveySez
 * @author William Newman
 * @version 2.12 2015/06/04
 * @link http://newmanix.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Question.php
 * @see Answer.php
 * @see Response.php
 * @see Choice.php
 */
 
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
spl_autoload_register('MyAutoLoader::NamespaceLoader');//required to load SurveySez namespace objects
$config->metaRobots = 'no index, no follow';#never index survey pages

# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
	myRedirect(VIRTUAL_PATH . "surveys/index.php");
}

<<<<<<< HEAD
$mySurvey = new SurveySez\Survey($myID); //MY_Survey extends survey class so methods can be added
=======
$mySurvey = new SurveySez\MY_Survey($myID); //MY_Survey extends survey class so methods can be added
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
if($mySurvey->isValid)
{
	$config->titleTag = "'" . $mySurvey->Title . "' Survey!";
}else{
	$config->titleTag = smartTitle(); //use constant 
<<<<<<< HEAD
}
#END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php
?>
<h3><?=$mySurvey->Title;?></h3>
<?php

if($mySurvey->isValid)
{ #check to see if we have a valid SurveyID
	echo '<p>' . $mySurvey->Description . '</p>';
	echo $mySurvey->showQuestions();
}else{
	echo "Sorry, no such survey!";	
}
=======
}

//adds font awesome icons for arrows on pager
$config->loadhead .= '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';

#END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php
?>
<h3><?=$mySurvey->Title;?></h3>

<?php

if($mySurvey->isValid)
{ #check to see if we have a valid SurveyID
	echo '<p class="text-muted">' . $mySurvey->Description . '</p>';
	echo $mySurvey->showQuestions();
    
	//Accesses a static function tacked on the namespaced class
	//in the initial version, passes back the ID only (must be updated)
    echo SurveySez\MY_Survey::responseList($myID);
}else{
	echo "Sorry, no such survey!";	
}

get_footer(); #defaults to theme footer or footer_inc.php

/*
function responseList($myID)
{
   return $myID; 
}
*/


>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705



<<<<<<< HEAD
=======




>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
