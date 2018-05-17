<?php
//array to hold the materails an quantity
$farming=array();
//initilize the key materails
$farming["shards"]=0;
$farming["fragments"]=0;
$farming["motes"]=0;
//fill up the array above until we have created n item
while(($farming["shards"]<250)&&($farming["fragments"]<250)&&($farming["motes"]<250))
{
    $legends=readline();
//get the data in the row in an array
    $legend_details= explode(" ", $legends);
//get two elements at a time, the evens hold the quantity, while odds the materrial
    for($i=0;$i<count($legend_details);$i+=2)
    {
//the key of the array will be the materail, while the quantity is the value
       $quantity=$legend_details[$i];
       $material=strtolower($legend_details[$i+1]);
//check if the key is existing. if yes- add the quantity to the current quantity. 
       if(array_key_exists($material, $farming))
       {
           $farming[$material]+=$quantity;
       }
 //if no- no create the key(material) and add the value(quantity)      
       else 
       {
           $farming[$material]=$quantity;
       }
    }
    
}
//check which materail reached 250, build the item and substruct the needed elements
if($farming["shards"]>250)
{
    echo "Shadowmourne obtained!\n";
    $farming["shards"]-=250;
}
elseif($farming["fragments"]>250)
{
    echo "Valanyr obtained!\n";
    $farming["fragments"]-=250;
}
elseif($farming["motes"]>250)
{
    echo "Dragonwrath obtained!\n";
    $farming["motes"]-=250;
}
//put the key elements in their own array and sort them according to value
$key_materials=array("shards"=>$farming["shards"],"fragments"=>$farming["fragments"],"motes"=>$farming["motes"]);
arsort($key_materials);
foreach($key_materials as $material=>$quantuty)
{
    echo $material.": ".$quantuty."\n";
}
//take the key elements out of the farming array so that only jjunk remains. 
unset($farming["shards"]);
unset($farming["fragments"]);
unset($farming["motes"]);
//sort the array with jun elements alpameticallu
ksort($farming);
foreach($farming as $junk=>$qty)
{
    echo $junk.": ".$qty."\n";
}

//You’ve beaten all the content and the last thing left to accomplish is own a legendary item. However, it’s a tedious
//process and requires quite a bit of farming. Anyway, you are not too pretentious – any legendary will do. The
//possible items are:
//Shadowmourne – requires 250 Shards;
// Valanyr – requires 250 Fragments;
// Dragonwrath – requires 250 Motes;;
//Shards, Fragments and Motes are the key materials, all else is junk. You will be given lines of input, such as
//2 motes 3 ores 15 stones. Keep track of the key materials - the first that reaches the 250 mark wins the race. At
//that point, print the corresponding legendary obtained. Then, print the remaining shards, fragments, motes,
//ordered by quantity in descending order, then by name in ascending order, each on a new line. Finally, print the
//collected junk items, in alphabetical order.
//Input
// Each line of input is in format {quantity} {material} {quantity} {material} … {quantity} {material}
//Output
// On the first line, print the obtained item in format {Legendary item} obtained!
// On the next three lines, print the remaining key materials in descending order by quantity
//o If two key materials have the same quantity, print them in alphabetical order
// On the final several lines, print the junk items in alphabetical order
//o All materials are printed in format {material}: {quantity}
//o All output should be lowercase, except the first letter of the legendary    
