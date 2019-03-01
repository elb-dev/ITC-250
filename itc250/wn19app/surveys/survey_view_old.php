<?php
/**

 * demo_view.php along with demo_list.php provides a sample web application
 * 
 * @package SurveySez
 * @author Derek Hendrick <mooserkay@gmail.com>
 * @version 1.00 2019/01/22
 * @link http://www.derekheducation.dreamhosters.com
 * @license https://www.apache.org/licenses/LICENSE-2.0
 * @see index.php
 * @see Pager.php 
 * @todo none
 */

# '../' works for a sub-folder.  use './' for the root  
require '../inc_0700/config_inc.php'; #provides configuration, pathing, error handling, db credentials
 
# check variable of item passed in - if invalid data, forcibly redirect back to demo_list.php page
if(isset($_GET['id']) && (int)$_GET['id'] > 0){#proper data must be on querystring
	 $myID = (int)$_GET['id']; #Convert to integer, will equate to zero if fails
}else{
	myRedirect(VIRTUAL_PATH . "surveys/index.php");
}

$mySurvey = new Survey($myID);

dumpDie($mySurvey);
# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php
if($mySurvey->IsValid)
{#records exist - show muffin!
echo '
<h3>' . $mySurvey->Title . '</h3>
<p>' . $mySurvey->Description . '</p>
';
}else{//no such muffin!
    echo '<div align="center">What! No such muffin? There must be a mistake!!</div>';
    echo '<div align="center"><a href="' . VIRTUAL_PATH . 'surveys/index.php">BACK</a></div>';
}

get_footer(); #defaults to theme footer or footer_inc.php

class Survey
{
	public $SurveyID = 0;
	public $Title = '';
	public $Description = '';
	public $IsValid = false;
	public $Questions = array();

	public function __construct($SurveyID)
	{
		//Filter out bad data with a cast
		$this->SurveyID = (int)$SurveyID;

		//SQL statement to select individual item
		//$sql = "select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = " . $myID;

		$sql = "SELECT Title, Description FROM wn19_surveys WHERE SurveyID={$this->SurveyID}";

		$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

		if(mysqli_num_rows($result) > 0)
		{#records exist - process
			   $this->IsValid = true;
			   $foundRecord = TRUE;	
			   while ($row = mysqli_fetch_assoc($result))
			   {
					$this->Title = dbOut($row['Title']);
					$this->Description = dbOut($row['Description']);
			   }
		}

		@mysqli_free_result($result); # We're done with the data!

		//START QUESTIONS HERE
		$sql = "select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = " . $this->SurveyID;

		$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

		if(mysqli_num_rows($result) > 0)
		{#records exist - process
			   $foundRecord = TRUE;	
			   while ($row = mysqli_fetch_assoc($result))
			   {
			   		$this->Questions[] = new Question((int)$row['QuestionID'], dbOut($row['Question']));
					//$this->Title = dbOut($row['Title']);
					//$this->Description = dbOut($row['Description']);
			   }
		}

		@mysqli_free_result($result); # We're done with the data!
		//END QUESTIONS HERE
	}	//End of survey constructor
}//End survey class.

class Question
{
	public $QuestionID = 0;
	public $QuestionText = '';

	public function __construct($QuestionID, $QuestionText)
	{
		$this->QuestionID = (int)$QuestionID;
		$this->QuestionText = $QuestionText;
	}

}//End question class