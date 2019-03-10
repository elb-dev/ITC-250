<?php
/*
  merge-test5.php
  
  These examples move toward merging data, for example in use of 
  mail merge or templating
  
  In this 5th version, we allow either a file or a variable to be passed 
  into the function as the template
  
  We check for the presence of a dot and 3 chars to indicate a file at the end 
  of the string passed in as the template
  
  if the .xxx is not present, we assume a var is being passed.
*/  

$template = 'templates/pooh.tpl'; //relative path of file to include

echo '<h1>merge-test5.php</h1>';

echo '<p>In this 5th version, we allow either a file or a variable to be passed into the function as the template.  We check for the presence of a dot and 3 chars to indicate a file at the end of the string passed in as the template.  if the .xxx is not present, we assume a var is being passed.</p>';

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

$obj = new stdClass;
$obj->FirstName = "Pooh";
$obj->LastName = "Bear";
$obj->Adjective = "blustery";
$obj->Occasion = "day";
$obj->Emotion = "cross";
$obj->Color = "red";
$obj->Picture = "pooh.jpg";
$obj->Clothing = "best red shirt";
$obj->Remark = "Oh, bother! I refuse to wear any pants now!";
$ar[] = $obj;//load to array

//array of objects sent to function to be merged
echo mergeTemplate($ar,$template);



function mergeTemplate($ar,$template)
{
    $myReturn = '';
    $temp = ''; //will hold template during each iteration

    if(!is_array($ar))
    {//if not an array, make it one so we always loop
        $tmp = $ar;//temporarily store the obj data
        $ar = array();//arr declaration must be explicit
        $ar[] = $tmp;//obj data is now first element of the array
    }
    
    //check to see if last 4 chars of $template are an extension, ie: .xxx
    if(substr($template,-4,1)== '.')
    {//likely file - try to load it
        if(file_exists($template)){
            ob_start();//start buffer
            include $template;
            $template = ob_get_clean();//copy buffer contents to var
        }
    }

    foreach($ar as $obj)
    {
        $temp = $template;//temporarily holds template
        foreach ($obj as $key => $value) {
            $temp = str_replace('{{' . $key . '}}', $value, $temp);
        }
        $myReturn .= $temp;//add to return
    }

    return $myReturn;
    
}
