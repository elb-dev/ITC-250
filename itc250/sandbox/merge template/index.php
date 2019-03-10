<html>
<head>
    <title>Merging Templates</title>
</head>
    <body>
        <h1>Templating & PHP</h1>
        
        <p>One very common strategies in building web pages with partials (fragments of web pages) is to create templates to be merged with data for example from a database table.</p>
        
        <p>Using templates supports a separation of concerns between the data and the design.  The technique shown here leads to the sort of templating that has existed in PHP in the form of Smarty Templates for many years and continues to this day as the views of frameworks built on the popular MVC architecture.</p>
        
        <h3>Template Merging Examples</h3>
        <p>Below are 5 examples of how templates can be built.  The first example starts by showing the raw merging capability with an associative array and the final version demonstrates a function that can be used to loop an array of objects and load template data either from a file or a variable.  View each, and the code associated to see how this works:</p>
        <p><a href="merge-test1.php" target="_blank">merge-test1.php</a> - These examples move toward merging data, for example in use of mail merge or templating.  This first example does a raw merge using an associative array to store the data and a variable to store the template.</p>
        <p><a href="merge-test2.php" target="_blank">merge-test2.php</a> - The second example adds a convenience function that allows us to pass a template and an object in to apply to the template.  We've changed from associative arrays to stdClass objects for this example so that as we go further can pass in arrays of objects.</p>
        <p><a href="merge-test3.php" target="_blank">merge-test3.php</a> - This third example uses a file named <b>pooh.tpl</b> which stores our template data.</p>
        <p><a href="merge-test4.php" target="_blank">merge-test4.php</a> - The fourth example copies all objects to an array, then loops the array and applies the template to each.  The template file contents are stored in a variable so there is only one trip to get the data</p>
        <p><a href="merge-test5.php" target="_blank">merge-test5.php</a> - In the 5th version, we allow either a file or a variable to be passed into the function as the template.  We check for the presence of a dot and 3 chars to indicate a file at the end 
  of the string passed in as the template.  if the .xxx is not present, we assume a var is being passed.</p>
        <h3>More Info</h3> 
            <p>below are some links to learn more about templating:</p>
            <p><a href="https://www.smashingmagazine.com/2011/10/getting-started-with-php-templating/" target="_blank">Smashing Magazine on Getting Started with PHP Templating (Be sure to read the great comments!)</a></p>
        
<p><a href="http://www.sitepoint.com/rasmus-lerdorf-php-frameworks-think-again/" target="_blank">Rasmus Lerdorf on Frameworks (old article, but the create of PHP looks cross eyed at frameworks</a></p>        

    </body>
</html>


