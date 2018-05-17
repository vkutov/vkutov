<?php
//Write a program that receives some info from the console about people and their phone numbers. Each entry
//should have just one name and one number (both of them strings).
//On each line, you will receive some of the following commands:
// A {name} {phone} – adds entry to the phonebook. In case of trying to add a name that is already in the
//phonebook you should change the existing phone number with the new one provided.
// S {name} – searches for a contact by given name and prints it in format &quot;{name} -&gt; {number}&quot;. In case
//the contact isn&#39;t found, print &quot;Contact {name} does not exist.&quot;.
// END – stop receiving more commands.

//Make an array that will hold all the data. It will be of type $phonebook=array({$name}=>{$number}); e.g. array("Ivan"=>"0888888888")
$phonebook = array();
//read from the console until we have an "END"
while(($entry = readline())!="END")
{
 //parse the data seperated by spaces in an array
    $contacts = explode(" ", $entry);
    if ($contacts[0] == "A") {
 //we need to add this line to the collection
        $name = $contacts[1];
        $number = $contacts[2];
        $phonebook[$name] = $number;    
    } elseif ($contacts[0] == "S") {
//we are searching
        $name = $contacts[1];
//check if the nam eexists as a key
        if (array_key_exists($name, $phonebook)) {
//print it in such case
            echo $name . " -> " . $phonebook[$name]."\n";
        } else {
//the name  does not exist
            echo "Contact $name does not exist.\n";
        }
    }
}
