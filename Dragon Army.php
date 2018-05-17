<?php
$n = readline();
//this is the array that will hold all the data. The format is $dragons=array("$type"=>array($name=>"name", $damage=>"damage", $health=>"health", $armor=>"armor"))
$averages=array();
//this array will  hold the average stats
$dragons = array();
//expect $n lines of dragon data
for ($i =0; $i < $n; $i++)
{
// the format is {type} {name} {damage} {health} {armor}.
    $dragon = readline();
//devide the data by the spaces
    $dragon_details = explode(" ", $dragon);
    $type = $dragon_details[0];
    $name = $dragon_details[1];
    $damage = $dragon_details[2];
    if($damage=="null")
    {
        $damage=45;
    }
    $health = $dragon_details[3];
//check for null inputs
    if($health=="null")
    {
        $health=250;
    }
    $armor = $dragon_details[4];
    if($armor=="null")
    {
        $armor=10;
    }
//create  the array that will have the tyoe as key and another array as value. The latter will hold the stats
    $dragons[$type][$name]=array("damage"=>$damage, "health"=>$health, "armor"=>$armor);
    if(isset($averages[$type]))
    {
 //get the current stats       
        $overall_damage=$averages[$type]["damage"];
        $overall_damage=$overall_damage*$averages[$type]["number"];
        $overall_health=$averages[$type]["health"];
        $overall_health=$overall_health*$averages[$type]["number"];
        $overall_armor=$averages[$type]["armor"];
        $overall_armor=$overall_armor*$averages[$type]["number"];
 //increse the number of elements
        $averages[$type]["number"]++;
//calculate the new average stats
        $average_damage=($overall_damage+$damage)/$averages[$type]["number"];
        $average_damage=number_format((float)$average_damage, 2, '.', '');
        $averages[$type]["damage"]=$average_damage;
        $average_health=($overall_health+$health)/$averages[$type]["number"];
        $average_health=number_format((float)$average_health, 2, '.', '');
        $averages[$type]["health"]=$average_health;
        $average_armor=($overall_armor+$armor)/$averages[$type]["number"];
        $average_armor=number_format((float)$average_armor, 2, '.', '');
        $averages[$type]["armor"]=$average_armor;
    }
    else 
    {
       //echo $type."\n";
 //define the average stats and assign the current one as the beginnning
       $averages[$type]["number"]=1;
       $average_damage=number_format((float)$damage, 2, '.', '');
       $averages[$type]["damage"]=$average_damage;
       $average_health=number_format((float)$health, 2, '.', '');
       $averages[$type]["health"]=$average_health;
       $average_armor=number_format((float)$armor, 2, '.', '');
       $averages[$type]["armor"]=$average_armor;
    }
}
foreach ($dragons as $kind => $stats) {
//get the key->value pair of the array of the dragons
//
   echo $kind ."::(".$averages[$kind]["damage"]."/".$averages[$kind]["health"]."/".$averages[$kind]["armor"].")\n";
//sort the dragons within the type by their alphabetically(values)
 // var_dump($stats); die();
   //echo "-".$stats["name"]." -> ";
   ksort($stats);
   foreach($stats as $title=>$dragon_info)
   {
      echo "-".$title." -> ";
  //    ksort($stats);
      
//get the key->value pair of the array of the given dragon 
      echo "damage: ".$dragon_info["damage"].", health: ".$dragon_info["health"].", armor: ".$dragon_info["armor"]; 
      echo "\n";
   }
}
//var_dump($dragons);



//Heroes III is the best game ever. Everyone loves it and everyone plays it all the time. Stamat is no exclusion to this
//rule. His favorite units in the game are all types of dragons – black, red, gold, azure etc… He likes them so much that
//he gives them names and keeps logs of their stats: damage, health and armor. The process of aggregating all the
//data is quite tedious, so he would like to have a program doing it. Since he is no programmer, it’s your task to help
//him
//You need to categorize dragons by their type. For each dragon, identified by name, keep information about his
//stats. Type is preserved as in the order of input, but dragons are sorted alphabetically by name. For each type, you
//should also print the average damage, health and armor of the dragons. For each dragon, print his own stats.
//There may be missing stats in the input, though. If a stat is missing you should assign it default values. Default values
//are as follows: health 250, damage 45, and armor 10. Missing stat will be marked by null.
//The input is in the following format {type} {name} {damage} {health} {armor}. Any of the integers may be assigned
//null value. See the examples below for better understanding of your task.
//If the same dragon is added a second time, the new stats should overwrite the previous ones. Two dragons are
//considered equal if they match by both name and type.
//Input
// On the first line, you are given number N -&gt; the number of dragons to follow
// On the next N lines, you are given input in the above described format. There will be single space separating
//each element.
//Output
// Print the aggregated data on the console
// For each type, print average stats of its dragons in format {Type}::({damage}/{health}/{armor})
// Damage, health and armor should be rounded to two digits after the decimal separator
// For each dragon, print its stats in format -{Name} -&gt; damage: {damage}, health: {health}, armor: {armor}
//Constraints
// N is in range [1…100]
// The dragon type and name are one word only, starting with capital letter.
// Damage health and armor are integers in range [0 … 100000] or null
//
