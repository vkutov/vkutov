<?php
$n = readline();
//this array will hold all the data
$users = array();
//read $n lines
for ($i =0; $i < $n; $i++)
{
    $log = readline();
//put the information that is sepearated by spaces in an array
    $log_details = explode(" ", $log);
    $ip = $log_details[0];
    $username = $log_details[1];
    $duration = $log_details[2];
//check if we have the username already
    if (array_key_exists($username, $users)) 
    {
//increase the duration in such case
      $users[$username]["duration"] += $duration;
      if(!in_array($ip,$users[$username]["ips"]))
      {
//we do have the ip already in the list with ips, So we add it add the end
        $len=count($users[$username]["ips"]);
        $users[$username]["ips"][$len]=$ip;
      }
    } 
    else
    {
 //we have the ip already in the list with ips 
       $users[$username]["duration"]= $duration;
       $users[$username]["ips"][0] = $ip;
    }
}
//sort ascending order, according to the key
ksort($users);
//print the results, we have users=array({user}=>array("duration"=>$duratioon,"ips"=>{$ip,$ip}))
foreach($users as $name=>$details)
{
    echo $name.": ".$details["duration"]." [";
 //sirt alphobetically
    sort($details["ips"]);
    $ips="";
    foreach($details["ips"] as $ip_address)
    {
        $ips.=$ip_address.",";
    }
//remove the last comma
    $ips=substr($ips,0,-1);
    echo $ips."]\n";
}

//You are given a sequence of access logs in format &lt;IP&gt; &lt;user&gt; &lt;duration&gt;.
// 192.168.0.11 peter 33
// 10.10.17.33 alex 12
// 10.10.17.35 peter 30
// 10.10.17.34 peter 120
// 10.10.17.34 peter 120
// 212.50.118.81 alex 46
// 212.50.118.81 alex 4
//Write a program to aggregate the logs data and print for each user the total duration of his sessions and a list of
//unique IP addresses in format &quot;&lt;user&gt;: &lt;duration&gt; [&lt;IP 1 &gt;, &lt;IP 2 &gt;, …]&quot;. Order the users alphabetically. Order the IPs
//alphabetically. In our example, the output should be the following:
// alex: 62 [10.10.17.33, 212.50.118.81]
// peter: 303 [10.10.17.34, 10.10.17.35, 192.168.0.11]
//Input
//The input comes from the console. At the first line a number n stays which says how many log lines will follow. Each
//of the next n lines holds a log information in format &lt;IP&gt; &lt;user&gt; &lt;duration&gt;. The input data will always be valid and
//in the format described. There is no need to check it explicitly.
//Output
//Print one line for each user (order users alphabetically). For each user print its sum of durations and all of his
//sessions&#39; IPs, ordered alphabetically in format &lt;user&gt;: &lt;duration&gt; [&lt;IP 1 &gt;, &lt;IP 2 &gt;, …]. Remove any duplicated values in
//the IP addresses and order them alphabetically (like we order strings).
//Constraints
// The count of the order lines n is in the range [1…1000].
// The &lt;IP&gt; is a standard IP address in format a.b.c.d where a, b, c and d are integers in the range [0…255].
// The &lt;user&gt; consists of only of Latin characters, with length of [1…20].
// The &lt;duration&gt; is an integer number in the range [1…1000].
// Time limit: 0.3 sec. Memory limit: 16 MB.