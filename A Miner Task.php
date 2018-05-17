<?php

//You are given a sequence of strings, each on a new line. Every odd line on the console is representing a resource
//(e.g. Gold, Silver, Copper, and so on), and every even – quantity. Your task is to collect the resources and print them
//each on a new line.
//Print the resources and their quantities in format:
//{resource} –&gt; {quantity}
//The quantities inputs will be in the range [1 … 2 000 000 000]
$i=0;
$mine=array();
while(($row = readline())!="stop")
{ 
 //
    if($i%2==0)
    {
//even row is the resource that will be the key
        $item=$row;
        $mine[$item]='';
    }   
    else
    {
//odd line will be the quantity that will be the value 
        $mine[$item]=$row;
    }
    $i++;
}
//print the resource => quantity pair 
foreach($mine as $resource => $quantity )
{
    echo $resource." -> ".$quantity."\n";
}