<?php
/*
  merge-test4.php
  
  These examples move toward merging data, for example in use of 
  mail merge or templating
  
  This fourth copies all objects to an array, then loops the array 
  and applies the template to each
  
  The template file contents are stored in a variable so there is only 
  one trip to get the data
*/  

$template = 'templates/pooh.tpl'; //relative path of file to include

echo '<h1>merge-test4.php</h1>';

echo '<p>This fourth example copies all objects to an array, then loops the array and applies the template to each.  The template file contents are stored in a variable so there is only one trip to get the data</p>';

$obj = new stdClass;
$obj->FirstName = "Christopher Robin";
$obj->LastName = "";
$obj->Adjective = "happy";
$obj->Occasion = "birthday";
$obj->Emotion = "exited";
$obj->Color = "blue";
$obj->Picture = "christopher-robin.jpg";
$obj->Clothing = "party hat";
$obj->Remark = "Let the birthday march begin!";
$ar[] = $obj;//load to array

$obj = new stdClass;
$obj->FirstName = "Piglet";
$obj->LastName = "";
$obj->Adjective = "puffy";
$obj->Occasion = "dandelion";
$obj->Emotion = "pensive";
$obj->Color = "grey";
$obj->Picture = "piglet.jpg";
$obj->Clothing = "sweater";
$obj->Remark = "Dandy lions are dandy indeed!";
$ar[] = $obj;//load to array

$obj = new stdClass;
$obj->FirstName = "Eeyore";
$obj->LastName = "";
$obj->Adjective = "festive";
$obj->Occasion = "Christmas";
$obj->Emotion = "proud";
$obj->Color = "purple";
$obj->Picture = "eeyore.gif";
$obj->Clothing = "tail";
$obj->Remark = "A tail is the best Christmas present of all!";
$ar[] = $obj;//load to array

$obj = new stdClass;
$obj->FirstName = "Owl";
$obj->LastName = "";
$obj->Adjective = "quiet";
$obj->Occasion = "study";
$obj->Emotion = "learned";
$obj->Color = "brown";
$obj->Picture = "owl.gif";
$obj->Clothing = "spectacles";
$obj->Remark = "Owl is spelled, W - O - L!";
$ar[] = $obj;//load to array

echo mergeTemplate($ar,$template);

function mergeTemplate($ar,$template)
{
    $myReturn = '';
    $temp = ''; //will hold template during each iteration

    if(!is_array($ar))
    {//if not an array, make it one so we always loop
        $tmp = $ar;
        $ar = array();//must be explicit
        $ar[] = $tmp;
    }
    
    if(file_exists($template)){
		ob_start();
		include $template;
		$template = ob_get_clean();//copy buffer contents to var
	} else {
		return false;
	}

    foreach($ar as $obj)
    {
        $temp = $template;//temporarily holds template
        foreach ($obj as $key => $value) {
            $temp = str_replace('{{' . $key . '}}', $value, $temp);
        }
        $myReturn .= $temp;
    }

    return $myReturn;
    
}
