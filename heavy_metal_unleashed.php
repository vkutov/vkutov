<?php

//lets rock!

//this three dimensial array will keep all the (archived)concert data. The keys of the first dimension are the venues. 
//The values are two dimensial arrays. The singers that have performed in the venue are the keys and the income of the cities become the values
//eg music_statistics=>array("Arena Armeec"=>array("Judas Priest"=>2 000 000))
$music_statistics = array();
//this array will keep the income by venue so that we ca sort it
$income_venue = array();

// extract the concert data from the corrent line untill "End"
while (($concert = readline()) != "End") {
//the format is "singer @venue ticketsPrice ticketsCount";.
//get the data from the line - the one before @ is the artist, after @ come venue ticket price and count
    $concert_data = explode("@", $concert);
// the info about the venue and tickets is in the second part of the array
    $ticket_data = $concert_data[1];
// fetch each concert detail in an array
    $ticket_info = explode(" ", $ticket_data);
//get its count
    $n = count($ticket_info);
// the array should have at least three elements , and the last two shoud be numeric- count and price    
    if ($n > 2 && is_numeric($ticket_info[$n - 1]) && is_numeric($ticket_info[$n - 2])) {
        $venue = $ticket_info[0]." ";
        for ($i = 1; $i < $n - 2; $i++) {
            $venue .= $ticket_info[$i];
        }
        $ticketsCount = $ticket_info[$n - 1];
        $ticketsPrice = $ticket_info[$n - 2];
        $singer = $concert_data[0];
//check if the current venue is already in the archive
        if (array_key_exists($venue, $music_statistics)) {
            //echo "$venue\n";
//check if the current singer is already in the venue
            if (isset($music_statistics[$venue][$singer])) {
//increase its income in such case by the current row
                $income = $ticketsPrice * $ticketsCount;
                $music_statistics[$venue][$singer] += $income;
            } else {
//create the singer(value) in the venue(key).Then the city becomes the key in the second domension of the array.
//We give it the income from the current row as value
                $income = $ticketsPrice * $ticketsCount;
                $music_statistics[$venue][$singer] = $income;
            }
//keep the income by venue in another array so that we can sort it later
            $venue_income[$venue] += $income;
        } else {
            $income = $ticketsPrice * $ticketsCount;
            $music_statistics[$venue][$singer] = $income;
            $venue_income[$venue] = $income;
        }
    }
}
//sort the venues by their income(values)
arsort($venue_income);
foreach ($venue_income as $arena => $profit) {
//get the key->value pair of the array of the music statistics e.g. "Wacken"=>array(Metallica=>2 000 000)
    echo $arena."\n";
//sort the singers within the venues by their income(values)
    arsort($music_statistics[$arena]);
    foreach ($music_statistics[$arena] as $artist => $tickets) {
//get the key->value pair of the array of the given coutry , e.g. "Metallica"=>2 000 000
        echo "#  " . $artist . "-> " . $tickets;
        echo "\n";
    }
}





//** Сръбско Unleashed
//Admit it – the heavy metal is your favorite sort of music. You never miss a concert and you have become quite the geek
//concerning everything involved with hard rock. You can’t decide between all the singers you know who your favorite
//one is. One way to find out is to keep statistics of how much money their concerts make. Write a program that does
//all the boring calculations for you.
//
//Page 3 of 10 Follow us:
//© Software University Foundation. This work is licensed under the CC-BY- NC-SA license.
//
//
//
//On each input line you’ll be given data in format: &quot;singer @venue ticketsPrice ticketsCount&quot;. There will
//be no redundant whitespaces anywhere in the input. Aggregate the data by venue and by singer. For each venue,
//print the singer and the total amount of money his/her concerts have made on a separate line. Venues should be
//kept in the same order they were entered; the singers should be sorted by how much money they have made in
//descending order. If two singers have made the same amount of money, keep them in the order in which they were
//entered.
//Keep in mind that if a line is in incorrect format, it should be skipped and its data should not be added to the output.
//Each of the four tokens must be separated by a space, everything else is invalid. The venue should be denoted with
//@ in front of it, such as @Sunny Beach
//SKIP THOSE: Ceca@Belgrade125 12378, Ceca @Belgrade12312 123
//The singer and town name may consist of one to three words.
//Input
// The input data should be read from the console.
// It consists of a variable number of lines and ends when the command “End&quot; is received.
// The input data will always be valid and in the format described. There is no need to check it explicitly.
//Output
// The output should be printed on the console.
// Print the aggregated data for each venue and singer in the format shown below.
// Format for singer lines is #{2*space}{singer}{space}-&gt;{space}{total money}
//Constraints
// The number of input lines will be in the range [2 … 50].
// The ticket price will be an integer in the range [0 … 200].
// The ticket count will be an integer in the range [0 … 100 000]
// Singers and venues are case sensitive
// Allowed working time for your program: 0.1 seconds. Allowed memory: 16 MB.
