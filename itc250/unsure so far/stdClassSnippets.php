<?php
//stdClassSnippets.php
//these are SNIPPETS, not a file to be placed into a running server!

//START SNIPPET #1-------------------------------

/**
 * requires POST or GET params or 
 * redirect, etc. back to calling form or 
 * safe page
 *
* <code>
* $params = array('last_name','first_name','email');#required fields to register	
* 
* if(!required_params($params))
* {//abort - required fields not sent
*		feedback("Data not entered/updated. (error code #" . createErrorCode(THIS_PAGE,__LINE__) . ")","error");
*		myRedirect(VIRTUAL_PATH . 'index.php');
* 	die();
* }
* </code>
 *
 * @param array names of all POST/GET required fields
 * @return void
 * @see gmaa-input.php
 * @todo none 
 */

function required_params($params) {
	foreach($params as $param) {
		if(!isset($_REQUEST[$param])) {
			return false;
		}
	}
	return true;
}#end required_params()


//END SNIPPET #1-----------------------------------

//START SNIPPET #2-------------------------------

function buildCountries()
{//copy country data into an object
	$sql = "select Value,Country from test_Countries order by Country asc";
	$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));
	while($row = mysqli_fetch_assoc($result))
	{# pull data from db array
		$values[] = dbOut($row['Value']);
		$countries[] = dbOut($row['Country']);
	}
	$returnObj = new stdClass;
	$returnObj->values = $values;
	$returnObj->countries = $countries;
	return $returnObj;
}


//END SNIPPET #2-----------------------------------

//START SNIPPET #3-------------------------------

//place this code prior to a DB hit to load form data
//will create an stdClass object with 2 properties, both arrays, which store
//the values and labels associated with complex form elements
$cObj = buildCountries(); //create object to load countries for drop down options

//END SNIPPET #3-----------------------------------

//START SNIPPET #4-------------------------------

	 
$attribs = 'onchange="alert(\"random JS in attribute!\")"';
$values = ',' . implode(',',$cObj->values);
$countries = 'Country,' . implode(',',$cObj->countries);
createSelect3("select","CountryID",$values,$CountryID,$countries,",",$attribs);


//END SNIPPET #4-----------------------------------

//START SNIPPET #5-------------------------------

/**
 * Creates and pre-loads radio, checkbox & options from passed delineated strings
 * v3 adds capability to associate id's & other attribute data to element
 *
 * data is now returned as a string intead of echoed 
 *
 * Pass arrays, or strings of data for value, label and database match to the function 
 * and identify if you wish to create a select option, or a set of 
 * radio buttons or checkboxes.
 *
 * Form elements will be 'pre-loaded' with database values ($dbStr) so a 
 * user can change their selection, or see their original choice. 
 * 
 * <code>
 * $valuStr = "1,2,3,4,5";
 * $dbStr = "1,2,5";  
 * $lblStr = "chocolate,bananas,nuts,caramel,butterscotch";
 * $attribs = 'id="blah"'; //attribs added to element
 * echo createSelect3("checkbox","Toppings",$valuStr,$dbStr,$lblStr,",");
 * </code>
 *
 * @param string $elType type of input element created, 'select', 'radio' or 'checkbox'
 * @param string $elName name of element
 * @param string/array $valuArray delimiter separated string of values to choose
 * @param string/array $dbArray delimiter separated string of DB items to match
 * @param string/array $lblArray delimiter separated string of labels to view
 * @param string $char delimiter, default is comma
 * @param string $attribs allows placement of attribute to element, ID, class, JS hook
 * @return void string is printed within function
 * @todo none
 */

function createSelect3($elType,$elName,$valuArray,$dbArray,$lblArray,$char=',',$attribs='', $alignment ='vertical')
{
if(!is_array($valuArray)){$valuArray = explode($char,$valuArray);}//if not array, blow it up!	
if(!is_array($dbArray)){$dbArray = explode($char,$dbArray);}  //db values
if(!is_array($lblArray)){$lblArray = explode($char,$lblArray);}  //labels identify
if($attribs!=''){$attribs = ' ' . $attribs;} //add space before attribs
	
$x = 0; $y = 0; $sel = "";//init stuff
   switch($elType)
   {
   case "radio":
   case "checkbox":
        for($x=0;$x<count($valuArray);$x++)
        {
             for($y=0;$y<count($dbArray);$y++)
             {
                   if($valuArray[$x]==$dbArray[$y])
                   {
                        $sel = " checked=\"checked\"";
                   }
             }//y for
              if($alignment == "horizontal")
			  {
				  print "<input type=\"" . $elType . "\" name=\"" . $elName . "\" value=\"" . $valuArray[$x] . "\"" . $sel . $attribs .">" . $lblArray[$x] . " &nbsp; &nbsp;&nbsp;\n"; 
			  }else{
				print "<input type=\"" . $elType . "\" name=\"" . $elName . "\" value=\"" . $valuArray[$x] . "\"" . $sel . $attribs .">" . $lblArray[$x] . "<br>\n";
			  }
		 $sel = "";
        }//x for
        break;
   case "select":
	print '<select name="' . $elName . '"' . $attribs .'>';
        for($x=0;$x<count($valuArray);$x++)
        {
             for($y=0;$y<count($dbArray);$y++)
             {
                   if($valuArray[$x]==$dbArray[$y])
                   {
                       $sel = " selected=\"selected\"";
                   }
             }//y for
              print "<option value=\"" . $valuArray[$x] . "\"" . $sel . ">" . $lblArray[$x] . "</option>\n";
	      $sel = "";
        }//x for
        print "</select>";
        break;
   }
}#end createSelect3()

//END SNIPPET #5-------------------------------


//START SNIPPET #6-------------------------------

/*
Alternate version of createSelect3, which returns a string.  
This version was required to embed into a function that created 
a string to return and would not work with echo built into createSelect
*/
function returnSelect($elType,$elName,$valuArray,$dbArray,$lblArray,$char=',',$attribs='', $alignment ='vertical')
{
if(!is_array($valuArray)){$valuArray = explode($char,$valuArray);}//if not array, blow it up!	
if(!is_array($dbArray)){$dbArray = explode($char,$dbArray);}  //db values
if(!is_array($lblArray)){$lblArray = explode($char,$lblArray);}  //labels identify
if($attribs!=''){$attribs = ' ' . $attribs;} //add space before attribs
$myReturn = ''; //init	
$x = 0; $y = 0; $sel = "";//init stuff
   switch($elType)
   {
   case "radio":
   case "checkbox":
        for($x=0;$x<count($valuArray);$x++)
        {
             for($y=0;$y<count($dbArray);$y++)
             {
                   if($valuArray[$x]==$dbArray[$y])
                   {
                        $sel = " checked=\"checked\"";
                   }
             }//y for
              if($alignment == "horizontal")
			  {
				  $myReturn .= "<input type=\"" . $elType . "\" name=\"" . $elName . "\" value=\"" . $valuArray[$x] . "\"" . $sel . $attribs .">" . $lblArray[$x] . " &nbsp; &nbsp;&nbsp;\n"; 
			  }else{
				$myReturn .= "<input type=\"" . $elType . "\" name=\"" . $elName . "\" value=\"" . $valuArray[$x] . "\"" . $sel . $attribs .">" . $lblArray[$x] . "<br>\n";
			  }
		 $sel = "";
        }//x for
        break;
   case "select":
	$myReturn .= '<select name="' . $elName . '"' . $attribs .'>';
        for($x=0;$x<count($valuArray);$x++)
        {
             for($y=0;$y<count($dbArray);$y++)
             {
                   if($valuArray[$x]==$dbArray[$y])
                   {
                       $sel = " selected=\"selected\"";
                   }
             }//y for
              $myReturn .= "<option value=\"" . $valuArray[$x] . "\"" . $sel . ">" . $lblArray[$x] . "</option>\n";
	      $sel = "";
        }//x for
        $myReturn .= "</select>";
        break;
   }
   return $myReturn;
}#end returnSelect()



//END SNIPPET #6-----------------------------------




