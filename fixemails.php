<?php

//4. Fix Emails
//You are given a sequence of strings, each on a new line, until you receive the “stop” command. The first string is the
//name of a person. On the second line, you will receive their email. Your task is to collect their names and emails,
//and remove emails whose domain ends with &quot;us&quot; or &quot;uk&quot; (case insensitive). Print:
//{name} – &gt; {email}
$i = 0;
//this array will hold the data
$contacts = array();
while (($row = readline()) != "stop") {
    if ($i % 2 == 0) {
//the even rows are the names
        $name = $row;
//create the key of the assoc array
        $contacts[$name] = '';
    } else {
 //odd number
        if (substr($row, -2) != "uk" && substr($row, -2) != "us") {
  //assign a value to the key taht we have already created
            $contacts[$name] = $row;
        }
        else
        {
 //we do not gather uk and us mails
            unset($contacts[$name]);
        }
    }
    $i++;
}
//print the results of the key=>value pair
foreach ($contacts as $name => $email) {
    echo $name . " -> " . $email . "\n";
}    