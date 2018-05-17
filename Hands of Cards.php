<?php

//You are given a sequence of people and for every person what cards he draws from the deck. The input will be
//separate lines in the format:
// {personName}: {PT, PT, PT,… PT}
//Where P (2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A) is the power of the card and T (S, H, D, C) is the type. The input ends
//when a &quot;JOKER&quot; is drawn. The name can contain any ASCII symbol except &#39;:&#39;. The input will always be valid and in
//the format described, there is no need to check it.
//A single person cannot have more than one card with the same power and type, if they draw such a card they
//discard it. The people are playing with multiple decks. Each card has a value that is calculated by the power
//multiplied by the type. Powers 2 to 10 have the same value and J to A are 11 to 14. Types are mapped to multipliers
//the following way (S -&gt; 4, H-&gt; 3, D -&gt; 2, C -&gt; 1).
//Finally print out the total value each player has in his hand in the format:
// {personName}: {value}

//calculate the pints of the draw
function calculatePoints($arr) {
//get the lenght of the array and aggrigate the sum in the $sum
    $len = count($arr);
    $sum = 0;
    for ($i = 0; $i < $len; $i++) {
// the first element is the power, it can be (1-10) or (J-A)
        if (strlen($arr[$i]) < 3) {
            $power = substr($arr[$i], 0, 1);
        } else {
            $power = substr($arr[$i], 0, 2);
        }
//in cas it is a digit
        if ($power == "J") {
            $power = 11;
        } elseif ($power == "Q") {
            $power = 12;
        } elseif ($power == "K") {
            $power = 13;
        } elseif ($power == "A") {
            $power = 14;
        }
//get the type that is the last part of the element $i
        $type = substr($arr[$i], -1);
        if ($type == "C") {
            $type = 1;
        } elseif ($type == "D") {
            $type = 2;
        } elseif ($type == "H") {
            $type = 3;
        } elseif ($type == "S") {
            $type = 4;
        }
//calculate and return the sum
        $sum += $power * $type;
    }
    return $sum;
}
$overall_draws = array();
//read a line until we have a joker
while (($draw = readline()) != "JOKER") {
//the name and card are seperated by ":"
    $current_draw = explode(":", $draw);
    $name = $current_draw[0];
//extract the card from the second element as they are devided by ","
    $cards = explode(",", $current_draw[1]);
 //use only unique cards
    $cards = array_unique($cards);
    $cards = str_replace(' ', '', $cards);
 //check if we already have the customer 
    if (array_key_exists($name, $overall_draws)) {
 //get lenght of the cards in the current line
        $current_num = count($cards);
 //get the number of all the cards that the customer has 
        $overall_num = count($overall_draws[$name]);
        $i = 0;
        $j = 0;
        while ($i < $current_num) {
//check if every card  in the current draw is already in the customers list
            if (!in_array($cards[$i], $overall_draws[$name])) {
//add it after the end if it is not
                $overall_draws[$name][$j + $overall_num] = $cards[$i];
                $j++;
            }
            $i++;
        }
    } else {
  //as we if we dont have him
        $overall_draws[$name] = $cards;

    }
}
//print the results
foreach ($overall_draws as $client => $draws) {
    $score =calculatePoints($draws);
    echo $client.": ". $score . "\n";
}