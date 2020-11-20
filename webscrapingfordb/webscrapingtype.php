<?php
include 'dbh.inc.php';

include 'simple_html_dom.php';

//webscraping type
// $html = file_get_html('https://pokemondb.net/type/');
// $list = $html->find('p[class="text-center"]', 0);
// for($i=0; $i<18; $i++) {
//     $type = $list->children($i)->plaintext;
//     $url = file_get_html('https://pokemondb.net/type/'.strtolower($type)."/");
//     $escapeDesc = $url->find('div[class="panel panel-intro"]', 0)->children(0)->plaintext;
//     $desc = mysqli_real_escape_string($conn, $escapeDesc);
//     mysqli_query($conn ,"INSERT INTO pokemon_type (pt_name, pt_desc) VALUES ('$type', '$desc');");

// }

//webscraping type detail

$html = file_get_html('pokemon.html');
$html2 = file_get_html('pokemon2.html');
$list = $html->find('tbody', 0);
$list2 = $html2->find('tbody', 0);

foreach($html->find('tbody') as $table){ 
    $all_trs = $table->find('tr');
    $countTrow = count($all_trs);
}
$p_id = $list->children(0)->find('span[class="infocard-cell-data"]', 0)->plaintext;
foreach($list->children(0)->find('td[class="cell-icon"]') as $table){ 
    $c_type = $table -> find('a');
    $count = count($c_type);
}
for($i=0; $i<$count; $i++)
{
    $pt_name = $list->children(0)->find('td[class="cell-icon"]', 0)->find('a', $i)->plaintext;
    mysqli_query($conn ,"INSERT INTO type_detail (p_id, pt_name) VALUES ('$p_id', '$pt_name');");
}
for($i=1; $i<$countTrow; $i++){

    if($list->children($i)->find('a[class="ent-name"]', 0)->plaintext!=$list->children($i-1)->find('a[class="ent-name"]', 0)->plaintext) {     
        foreach($list->children($i)->find('td[class="cell-icon"]') as $table){ 
            $c_type = $table -> find('a');
            $count = count($c_type);
        }
        for($j=0; $j<$count; $j++)
        {
            $p_id = $list->children($i)->find('span[class="infocard-cell-data"]', 0)->plaintext;
            $pt_name = $list->children($i)->find('td[class="cell-icon"]', 0)->find('a', $j)->plaintext;
            mysqli_query($conn ,"INSERT INTO type_detail (p_id, pt_name) VALUES ('$p_id', '$pt_name');");
        }
    }
}


foreach($html2->find('tbody') as $table){ 
    $all_trs = $table->find('tr');
    $countTrow = count($all_trs);
}
$p_id = $list2->children(0)->find('span[class="infocard-cell-data"]', 0)->plaintext;
foreach($list2->children(0)->find('td[class="cell-icon"]') as $table){ 
    $c_type = $table -> find('a');
    $count = count($c_type);
}
for($i=0; $i<$count; $i++)
{
    $pt_name = $list->children(0)->find('td[class="cell-icon"]', 0)->find('a', $i)->plaintext;
    mysqli_query($conn ,"INSERT INTO type_detail (p_id, pt_name) VALUES ('$p_id', '$pt_name');");
}
for($i=1; $i<$countTrow; $i++){
    
    if($list2->children($i)->find('a[class="ent-name"]', 0)->plaintext!=$list2->children($i-1)->find('a[class="ent-name"]', 0)->plaintext) {     
        foreach($list2->children($i)->find('td[class="cell-icon"]') as $table){ 
            $c_type = $table -> find('a');
            $count = count($c_type);
        }
        for($j=0; $j<$count; $j++)
        {
            $p_id = $list2->children($i)->find('span[class="infocard-cell-data"]', 0)->plaintext;
            $pt_name = $list2->children($i)->find('td[class="cell-icon"]', 0)->find('a', $j)->plaintext;
            mysqli_query($conn ,"INSERT INTO type_detail (p_id, pt_name) VALUES ('$p_id', '$pt_name');");
        }
    }
}