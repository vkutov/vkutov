<?php
function print_ip_number($arr)
{
//sum all the text here
    $text="";
    foreach($arr as $ip=>$number)
    {
        $text.=$ip." => ".$number.", ";
    }
 //remove the last digits
    $text=substr($text,0,strlen ($text)-2);
    echo $text.".";
}
//an array that will conatain all the data
$logs = array();
//cycle untill we have end 
while (($message = readline()) != "end") {
// the entries are seperated by space so we use it to parse them in array
    $message_details = explode(" ", $message);
 // the very ip is within the first element
    $ip = $message_details[0];
 //the ip is after the eual sign
    $ip_text = explode("=", $ip);
    $ip = $ip_text[1];
//uxtract the user={username} contruction
    $username = $message_details[2];
    $user = explode("=", $username);
 // the very username is after the eual sign
    $username = $user[1];
 //check if we already have the user
    if (array_key_exists($username, $logs)) {
        if (isset($logs[$username][$ip])) {
 // if the user and the ip are already in the list we increse the number of occurence
            $logs[$username][$ip] ++;
        } else {
 // we start cointing the times the given user has the given ip
            $logs[$username][$ip] = 1;
        }
    } else {
 // we start cointing the times the given user has the given ip
        $logs[$username] = $ip;
        $logs[$username] = array($ip => 1);
    }
}
//sort in ascending order, according to the key
ksort($logs);
foreach ($logs as $user => $ips) {
    echo $user.": \n";
    print_ip_number($ips);
    echo "\n";
}

//Marian is a famous system administrator. The person to overcome the security of his servers has not yet been born.
//However, there is a new type of threat where users flood the server with messages and are hard to be detected
//since they change their IP address all the time. Well, Marian is a system administrator and is not so into
//programming. Therefore, he needs a skillful programmer to track the user logs of his servers. You are the chosen
//one to help him!
//You are given an input in the format:
// IP=(IP.Address) message=(A&amp;sample&amp;message) user=(username)
//Your task is to parse the IP and the username from the input and for every user, you have to display every IP from
//which the corresponding user has sent a message and the count of the messages sent with the corresponding IP. In
//
//Page 3 of 10 Follow us:
//© Software University Foundation. This work is licensed under the CC-BY- NC-SA license.
//
//
//
//the output, the usernames must be sorted alphabetically while their IP addresses should be displayed in the order
//of their first appearance. The output should be in the following format:
//username:
//IP =&gt; count, IP =&gt; count.
//For example, given the following input:
// “IP=192.23.30.40 message=&#39;Hello&amp;derps.&#39; user=destroyer”,
//You will have to get the username destroyer and the IP 192.23.30.40 and display it in the following format:
//destroyer:
//192.23.30.40 =&gt; 1.
//The username destroyer has sent a message from IP 192.23.30.40 once.
//Check the examples below. They will further clarify the assignment.