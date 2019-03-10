merge-template example - updated 2/29/2016

These examples move toward merging data, for example in use of 
mail merge or templating

The first couple of versions start the idea off, by replacing data from an 
stdClass object inside any data with the "keys" inside {{ }} demarkers, for example:

{{FirstName}}

The first example does a raw merge using an associative array.

The second example adds a convenience function that allows us to pass a template and an object in to apply to the template.  We've changed from associative arrays to stdClass objects for this example so that as we go further can pass in arrays of objects.

The third example uses a file named template.tpl which stores our 
template data.

The fourth example copies all objects to an array, then loops the array and applies the template to each.  The template file contents are stored in a variable so there is only one trip to get the data

In the 5th version, we allow either a file or a variable to be passed into the function as the template.  We check for the presence of a dot and 3 chars to indicate a file at the end of the string passed in as the template.  if the .xxx is not present, we assume a var is being passed.
