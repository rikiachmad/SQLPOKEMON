<?php
include 'dbh.inc.php';

include 'simple_html_dom.php';

$html = file_get_html('pokemon.html');
$list = $html->find('tbody', 0);


foreach($html->find('tbody') as $table){ 
    $all_trs = $table->find('tr');
    $count = count($all_trs);
}

$escapeName = $list->children(0)->find('a[class="ent-name"]',0)->plaintext;
$name = mysqli_real_escape_string($conn, $escapeName);
$find = ['.', '\'', ':'];
$replace = [''];
$dash = '-';
$link= "https://img.pokemondb.net/sprites/sword-shield/icon/";
$img =$link.str_replace(' ','-', str_replace($find, $replace, strtolower($name))).".png";
$hp = $list->children(0)->find('td[class="cell-num"]' ,0)->plaintext;
$atk = $list->children(0)->find('td[class="cell-num"]' ,1)->plaintext;
$def = $list->children(0)->find('td[class="cell-num"]' ,2)->plaintext;
$spd = $list->children(0)->find('td[class="cell-num"]' ,5)->plaintext;
mysqli_query($conn ,"INSERT INTO pokemon (p_img, p_name, p_hp, p_atk, p_def, p_spd) VALUES ('$img', '$name', '$hp', '$atk', '$def', '$spd');");
for($i=1; $i<$count; $i++) {
    if($list->children($i)->find('a[class="ent-name"]', 0)->plaintext!=$list->children($i-1)->find('a[class="ent-name"]', 0)->plaintext){
        $escapeName = $list->children($i)->find('a[class="ent-name"]',0)->plaintext;
        $name = mysqli_real_escape_string($conn, $escapeName);
        $img =$link.str_replace(' ','-', str_replace($find, $replace, strtolower($name))).".png";
        $hp = $list->children($i)->find('td[class="cell-num"]' ,0)->plaintext;
        $atk = $list->children($i)->find('td[class="cell-num"]' ,1)->plaintext;
        $def = $list->children($i)->find('td[class="cell-num"]' ,2)->plaintext;
        $spd = $list->children($i)->find('td[class="cell-num"]' ,5)->plaintext;
        mysqli_query($conn ,"INSERT INTO pokemon (p_img, p_name, p_hp, p_atk, p_def, p_spd) VALUES ('$img', '$name', '$hp', '$atk', '$def', '$spd');");
    }
}

$html2 = file_get_html('pokemon2.html');
$list2 = $html2->find('tbody', 0);

foreach($html2->find('tbody') as $table2){ 
    $all_trs2 = $table2->find('tr');
    $count2 = count($all_trs2);
}

$escapeName2 = $list2->children(0)->find('a[class="ent-name"]',0)->plaintext;
$name2 = mysqli_real_escape_string($conn, $escapeName2);
$img2 =$link.str_replace(' ','-', str_replace($find, $replace, strtolower($name2))).".png";
$hp2 = $list2->children(0)->find('td[class="cell-num"]' ,0)->plaintext;
$atk2 = $list2->children(0)->find('td[class="cell-num"]' ,1)->plaintext;
$def2 = $list2->children(0)->find('td[class="cell-num"]' ,2)->plaintext;
$spd2 = $list2->children(0)->find('td[class="cell-num"]' ,5)->plaintext;
mysqli_query($conn ,"INSERT INTO pokemon (p_img, p_name, p_hp, p_atk, p_def, p_spd) VALUES ('$img2', '$name2', '$hp2', '$atk2', '$def2', '$spd2');");
for($i=1; $i<$count2; $i++) {
    if($list2->children($i)->find('a[class="ent-name"]', 0)->plaintext!=$list2->children($i-1)->find('a[class="ent-name"]', 0)->plaintext){
                $escapeName2 = $list2->children($i)->find('a[class="ent-name"]',0)->plaintext;
                $name2 = mysqli_real_escape_string($conn, $escapeName2);
                $img2 =$link.str_replace(' ','-', str_replace($find, $replace, strtolower($name2))).".png";
                $hp2 = $list2->children($i)->find('td[class="cell-num"]' ,0)->plaintext;
                $atk2 = $list2->children($i)->find('td[class="cell-num"]' ,1)->plaintext;
                $def2 = $list2->children($i)->find('td[class="cell-num"]' ,2)->plaintext;
                $spd2 = $list2->children($i)->find('td[class="cell-num"]' ,5)->plaintext;
                mysqli_query($conn ,"INSERT INTO pokemon (p_img, p_name, p_hp, p_atk, p_def, p_spd) VALUES ('$img2', '$name2', '$hp2', '$atk2', '$def2', '$spd2');");
            }
    }
