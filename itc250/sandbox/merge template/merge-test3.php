<?php
/*
  merge-test3.php
  
  These examples move toward merging data, for example in use of 
  mail merge or templating
  
  This third example uses a file named pooh.tpl which stores our 
  template data.
  
*/  

//$template = __DIR__ . '/pooh.tpl'; //location of file to include

$template = 'templates/pooh.tpl'; //relative path of template file

echo '<h1>merge-test3.php</h1>';

echo '<p>This third example uses a file named <b>pooh.tpl</b> which stores our template data.</p>';

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
echo mergeTemplate($obj,$template);

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
echo mergeTemplate($obj,$template);

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
echo mergeTemplate($obj,$template);

function mergeTemplate($obj,$template)
{
    
    if(file_exists($template)){
		ob_start();
		include $template;
		$template = ob_get_clean();//copy buffer contents to var
	} else {
		return false;
	}
    foreach ($obj as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
    }

    return $template;
    
}
