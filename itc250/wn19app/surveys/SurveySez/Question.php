<?php
<<<<<<< HEAD
//Question.php
namespace SurveySez;

=======
/**
 * Question.php provides a way to store questions related to Surveys for the SurveySez 
 * project
 *
 * The Question class is not normally called directly, rather it's loaded via the constructor 
 * of the Survey class, which stores an array of Questions as one of it's properties.
 * 
 * Data access for several of the SurveySez pages are handled via Survey classes 
 * named Survey,Question & Answer, respectively.  These classes model the one to many 
 * relationships between their namesake database tables. 
 *
 * @package SurveySez
 * @author William Newman
 * @version 2.1 2015/05/28
 * @link http://newmanix.com/ 
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see Survey.php
 * @see Answer.php
 * @see Response.php
 * @see Choice.php
 */
 
 namespace SurveySez;
 
/**
 * The Question class is not normally called directly, rather it's loaded via the constructor 
 * of the Survey class, which stores an array of Questions as one of it's properties.
 *
 * @see Question
 * @see Answer 
 * @todo none
 */
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
class Question
{
	 public $QuestionID = 0;
	 public $Text = "";
	 public $Description = "";
	 public $aAnswer = Array();#stores an array of answer objects
	 public $TotalAnswers = 0;
<<<<<<< HEAD
=======
	 public $Number = 0; # number of current question in sequence - added in v2
	
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
	/**
	 * Constructor for Question class. 
	 *
	 * @param integer $id ID number of question 
	 * @param string $question The text of the question
	 * @param string $description Additional description info
<<<<<<< HEAD
	 * @return void 
     * @todo none
	 */ 
    function __construct($id,$question,$description)
=======
	 * @param integer $number The spot in the sequence where the question falls
	 * @return void 
     * @todo none
	 */ 
	function __construct($id,$question,$description,$number)
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
	{#constructor sets stage by adding data to an instance of the object
		$this->QuestionID = (int)$id;
		$this->Text = $question;
		$this->Description = $description;
<<<<<<< HEAD
=======
		$this->Number = $number; # number of current question in sequence - added in v2
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
	}# end Question() constructor
	
	/**
	 * Reveals answers in internal Array of Answer Objects 
	 * for each question 
	 *
	 * @param none
	 * @return string prints data from Answer Array 
	 * @todo none
	 */ 
	function showAnswers()
	{
		$myReturn = '';
<<<<<<< HEAD
        $counter = 0;
        foreach($this->aAnswer as $answer)
		{#print data for each
			$myReturn .= "<b>" . $answer->Text . "</b> ";
=======
		if($this->TotalAnswers != 1){$s = 's';}else{$s = '';} #add 's' only if NOT one!!
		$myReturn .= "<em>[" . $this->TotalAnswers . " answer" . $s . "]</em> "; 
		foreach($this->aAnswer as $answer)
		{#print data for each
			$myReturn .= "<em>(" . $answer->AnswerID . ")</em> ";
			$myReturn .= $answer->Text . " ";
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
			if($answer->Description != "")
			{#only print description if not empty
				$myReturn .= "<em>(" . $answer->Description . ")</em>";
			}
<<<<<<< HEAD
            $counter++;
            if(count($this->aAnswer)>$counter)
            {
               $myReturn .= '<br />'; 
            }
		}
		//$myReturn .= "<br />";
        return $myReturn;
        
=======
		}
		$myReturn .= "<br />";
		return $myReturn;
>>>>>>> 0aea4fa598d4bbc27b76b05d0d4b3cbb78a17705
	}#end showAnswers() method
}# end Question class