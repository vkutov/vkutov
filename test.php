<?php

$str = "Hello Friend";

$arr1 = substr($str, 0, 1);
$arr2 = substr($str, -1);

//print_r($arr1);
//print_r($arr2);
$ar = array("second" => array(2, 2, 3, 3, 4, 4));
//$ars=array_unique($ar);
//var_dump($ars);
$i = 5;
switch ($i) {
    case 0:
        echo "i equals 0";
        break;
    case 1:
        echo "i equals 1";
        break;
    case 2:
        echo "i equals 2";
        break;
}
//echo $i;
//    if (isset($ar["first"]) && in_array(2, $ar["first"])) {
//    echo "test";
//    }else echo "no";
//    $logs[$username][$ip]++;
//     $j++;


//$age = array("Peter" => array("age" => "35", "city" => "atlanta"), "Ben" => array("age" => "36", "city" => "boston"), "Joe" => array("age" => "37", "city" => "nj"));
//$test = ksort($age[0]["city"]);
//var_dump($test);
//$country = array(
//'Bulgaria' =>
// '3',
//'UK' =>
// '4',
//'Italy' =>
// '3'
//);
//$big=arsort($country);
//var_dump($big);
$fruits = array("d" => 1, "a" => 2, "b" => 3, "c" => 4);
//var_dump($fruits);
//arsort($fruits);
//var_dump($fruits);
//foreach ($fruits as $key => $val) {
//    echo "$key = $val\n";
//}



$farming=array();
//$farming["shards"]=0;
//$farming["fragments"]=0;
//$farming["motes"]=0;
//
//
//
//while((isset($farming["shards"])&&$farming["shards"]<250)
//        &&(isset($farming["fragments"])&&$farming["fragments"]<250)
//        &&(isset($farming["motes"])&&$farming["motes"]<250))
//{
//    $legends=readline();
//    $legend_details= explode(" ", $legends);
//    for($i=0;$i<count($legend_details)/2;$i++)
//    {
//       $quantity=$legend_details[$i];
//       $material=strtolower($legend_details[$i+1]);
//       if(array_key_exists($material, $farming))
//       {
//           $farming[$material]+=$quantity;
//       }
//       else 
//       {
//           $farming[$material]=$quantity;
//       }
//    }
//    
//}
//var_dump($farming);

//$s="55";
//if(is_string($s)) echo "num";
$concert="Lepa Brena @Sunny Beach 25 3500";
    $concert_data=explode("@",$concert);
//var_dump($s1);
    $ticket_data=$concert_data[1];
    //echo strlen($ticket_data);
    $num = 2; 
printf("%.2f",$num);
//?>