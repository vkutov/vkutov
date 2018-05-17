<?php
//this three dimensial array will keep all the (archived)demographic data. The keys of the first dimension are the countries. 
//The values are two dimensial arrays. The cities within the countries are the keys and the population of the cities become the values
//eg world_citizens=>array("Bulgaria"=>array("Sofia"=>2 000 000))
$world_citizens = array();
//this array will keep the population by country so that we ca sort it
$population_country = array();
$i=0;
while (($demographics = readline()) != "report") {
// extract the demograohic data from the corrent line
    $demographic_data = explode("|", $demographics);
    $city = $demographic_data[0];
    $country = $demographic_data[1];
    $population = (int) $demographic_data[2];
//check if the current country is already in the archive
    if (array_key_exists($country, $world_citizens)) {
//check if the current city is already in the archive
        if (isset($world_citizens[$country][$city])) {
//increase its citizents in such case by the current row
            $world_citizens[$country][$city] += $population;
        } else {
//create the city(value) in the coutry(key).Then the city becomes the key in the second domension of the array.
//We give it the population from the current row as value
            $world_citizens[$country][$city] = $population;
        }
 //keep the population by country in another array so that we can sort it later
        $population_country[$country] += $population;
    } else {
//we add a new coutry as key and city as value. The city is key in the second dimension and its citizens become the value. 
        $world_citizens[$country][$city] = $population;
//start counting the population by country
        $population_country[$country] = $population;
    }
}
//sort the countries by their population(values)
arsort($population_country);
echo "\n";
foreach ($population_country as $nation => $inhabitants) {
//get the key->value pair of the array of the world citizens e.g. "Bulgaria"=>array(Sofia=>2 000 000)
   echo $nation ." (total population: $inhabitants)\n";
//sort the cities within the country by their population(values)
   arsort($world_citizens[$nation]);
   foreach($world_citizens[$nation] as $town=>$residents)
   {
//get the key->value pair of the array of the given coutry , e.g. "Sofia"=>2 000 000
      echo "=>".$town.": ".$residents; 
      echo "\n";
   }
}
//So many people! It’s hard to count them all. But that’s your job as a statistician. You get raw data for a given city and
//you need to aggregate it.
//On each input line, you’ll be given data in format: &quot;city|country|population&quot;. There will be no redundant
//whitespaces anywhere in the input. Aggregate the data by country and by city and print it on the console.
//For each country, print its total population and on separate lines, the data for each of its cities. Countries should be
//ordered by their total population in descending order and within each country, the cities should be ordered by the
//same criterion.
//If two countries/cities have the same population, keep them in the order in which they were entered. Check out
//the examples; follow the output format strictly!
//Input
// The input data should be read from the console.
// It consists of a variable number of lines and ends when the command &quot;report&quot; is received.
// The input data will always be valid and in the format described. There is no need to check it explicitly.
//Output
// The output should be printed on the console.
// Print the aggregated data for each country and city in the format shown below.
//Constraints
// The name of the city, country and the population count will be separated from each other by a pipe (&#39;|&#39;).
// The number of input lines will be in the range [2 … 50].
// A city-country pair will not be repeated.
// The population count of each city will be an integer in the range [0 … 2 000 000 000].
// Allowed working time for your program: 0.1 seconds. Allowed memory: 16 MB.