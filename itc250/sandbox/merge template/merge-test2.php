<?php
/*
  merge-test2.php
  
  This second example adds a convenience function that allows us to pass
  a template and an object in to apply to the template.
  
  We've changed from associative arrays to stdClass objects for this example
*/  

$template = "
<h4>{{FirstName}}'s {{Adjective}} {{Occasion}}</h4>
<div style='padding:5px; border:2px solid {{Color}};border-radius:10px;max-width:700px;min-height:160px;'>
<p>
<img src='images/{{Picture}}' align='right' style='max-width:200px;' />
{{FirstName}} {{LastName}} was feeling {{Emotion}}.</p>
<p>'How can this {{Occasion}} be so {{Adjective}}?', {{FirstName}} wondered.</p>
<p>'I put on my {{Clothing}} for this!'</p>
<p>'{{Remark}}', said {{FirstName}}.</p>
</div>
";

echo '<h1>merge-test2.php</h1>';

echo '<p>This second example adds a convenience function that allows us to pass a template and an object in to apply to the template.  We\'ve changed from associative arrays to stdClass objects for this example so that as we go further can pass in arrays of objects.</p>';

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

function mergeTemplate($obj,$template)
{
    foreach ($obj as $key => $value) {
        $template = str_replace('{{' . $key . '}}', $value, $template);
    }

    return $template;
    
}






