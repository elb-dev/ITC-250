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
	myRedirect(VIRTUAL_PATH . "demo/demo_list.php");
}

/*
select q.QuestionID, q.Question from srv_questions q inner join srv_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = 1

$sql = "select MuffinName,Description,MetaDescription,MetaKeywords,Price from test_Muffins where MuffinID = " . $myID;
*/

//sql statement to select individual item
$sql = "select q.QuestionID, q.Question from wn19_questions q inner join wn19_surveys s on s.SurveyID = q.SurveyID where s.SurveyID = " . $myID;
//---end config area --------------------------------------------------

$foundRecord = FALSE; # Will change to true, if record found!
   
# connection comes first in mysqli (improved) function
$result = mysqli_query(IDB::conn(),$sql) or die(trigger_error(mysqli_error(IDB::conn()), E_USER_ERROR));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;	
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$Question = dbOut($row['Question']);
			$QuestionID = (int)$row['QuestionID'];
	   }
}

@mysqli_free_result($result); # We're done with the data!

/*
$config->metaDescription = 'Web Database ITC281 class website.'; #Fills <meta> tags.
$config->metaKeywords = 'SCCC,Seattle Central,ITC281,database,mysql,php';
$config->metaRobots = 'no index, no follow';
$config->loadhead = ''; #load page specific JS
$config->banner = ''; #goes inside header
$config->copyright = ''; #goes inside footer
$config->sidebar1 = ''; #goes inside left side of page
$config->sidebar2 = ''; #goes inside right side of page
$config->nav1["page.php"] = "New Page!"; #add a new page to end of nav1 (viewable this page only)!!
$config->nav1 = array("page.php"=>"New Page!") + $config->nav1; #add a new page to beginning of nav1 (viewable this page only)!!
*/
# END CONFIG AREA ---------------------------------------------------------- 

get_header(); #defaults to theme header or header_inc.php
?>
<h3 align="center"><?=smartTitle();?></h3>

<?php
if($foundRecord)
{#records exist - show muffin!
echo "
<h1>Question</h1>
<p>$Question</p>
";
}else{//no such muffin!
    echo '<div align="center">What! No such muffin? There must be a mistake!!</div>';
    echo '<div align="center"><a href="' . VIRTUAL_PATH . 'demo/demo_list.php">Another Muffin?</a></div>';
}

get_footer(); #defaults to theme footer or footer_inc.php
?>
