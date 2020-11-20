<?php

include 'simple_html_dom.php';

$name = "Type: Null";
$find = ['.', '\'', ':'];
$replace = [''];
$dash = '-';
$link= "https://img.pokemondb.net/sprites/sword-shield/icon/";
$img =$link.str_replace(' ','-', str_replace($find, $replace, strtolower($name))).".png";
echo 'n/';
// $html = file_get_html('pokemon.html');
// $list = $html->find('tbody', 0);
// echo $list->children(0)->getAttribute('data-src');
// header('content-type: image/png'); 
// $theImage = "myimage.png";//the real image url. 
// echo file_get_contents($theImage); 

// $c = 2;
// foreach($html->find('tbody') as $table){ 
//     // returns all the <tr> tag inside $table
//     $all_trs = $table->find('tr');
//     $count = count($all_trs);
// }
// echo "1. ";
 

// $hp = $list->children(0)->find('td[class="cell-num"]' ,0)->plaintext;
// $atk = $list->children(0)->find('td[class="cell-num"]' ,1)->plaintext;
// $def = $list->children(0)->find('td[class="cell-num"]' ,2)->plaintext;
// $spd = $list->children(0)->find('td[class="cell-num"]' ,5)->plaintext;
// echo $hp; echo $atk ; echo $def; echo $spd;

// echo "<br>";
// for($i=1; $i<$count; $i++) {
//     if($list->children($i)->find('a[class="ent-name"]', 0)->plaintext!=$list->children($i-1)->find('a[class="ent-name"]', 0)->plaintext){
//         echo $c; echo ". ";
//         $hp = $list->children($i)->find('td[class="cell-num"]' ,0)->plaintext;
//         $atk = $list->children($i)->find('td[class="cell-num"]' ,1)->plaintext;
//         $def = $list->children($i)->find('td[class="cell-num"]' ,2)->plaintext;
//         $spd = $list->children($i)->find('td[class="cell-num"]' ,5)->plaintext;
//         echo $hp; echo $atk; echo $def; echo $spd;
//         echo "<br>";
//         $c++;
//     }
// }
// $html2 = file_get_html('pokemon2.html');
// $list2 = $html2->find('tbody', 0);

// foreach($html2->find('tbody') as $table2){ 
//     $all_trs2 = $table2->find('tr');
//     $count2 = count($all_trs2);
// }
// $c++;
// echo "667. ";
// $hp2 = $list2->children(0)->find('td[class="cell-num"]' ,0)->plaintext;
// $atk2 = $list2->children(0)->find('td[class="cell-num"]' ,1)->plaintext;
// $def2 = $list2->children(0)->find('td[class="cell-num"]' ,2)->plaintext;
// $spd2 = $list2->children(0)->find('td[class="cell-num"]' ,5)->plaintext;
// echo $hp2; echo $atk2 ; echo $def2; echo $spd2;
// echo "<br>";
// for($i=1; $i<$count2; $i++) {
//     if($list2->children($i)->find('a[class="ent-name"]', 0)->plaintext!=$list2->children($i-1)->find('a[class="ent-name"]', 0)->plaintext){
//         echo $c; echo ". ";
//         $hp2 = $list2->children($i)->find('td[class="cell-num"]' ,0)->plaintext;
//         $atk2 = $list2->children($i)->find('td[class="cell-num"]' ,1)->plaintext;
//         $def2 = $list2->children($i)->find('td[class="cell-num"]' ,2)->plaintext;
//         $spd2 = $list2->children($i)->find('td[class="cell-num"]' ,5)->plaintext;
//         echo $hp2; echo $atk2; echo $def2; echo $spd2;
//         echo "<br>";
//         $c++;
//     }
// }