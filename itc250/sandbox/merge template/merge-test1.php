<?php
/*
  merge-test1.php
  
  These examples move toward merging data, for example in use of 
  mail merge or templating
  
  This first example does a raw merge using an associative array
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

$ar['FirstName'] = "Spider-man";
$ar['LastName'] = "";
$ar['Adjective'] = "illusive";
$ar['Occasion'] = "prom";
$ar['Emotion'] = "awkward";
$ar['Color'] = "Red";
$ar['Picture'] = "christopher-robin.jpg";
$ar['Clothing'] = "mask";
$ar['Remark'] = "Time to web sling!";

echo '<h1>merge-test1.php</h1>';

echo '<p> These examples move toward merging data, for example in use of mail merge or templating.  This first example does a raw merge using an associative array to store the data and a variable to store the template.</p>';

foreach ($ar as $key => $value) {
    $template = str_replace('{{' . $key . '}}', $value, $template);
}

echo $template;