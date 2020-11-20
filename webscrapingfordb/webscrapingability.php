<?php
include 'dbh.inc.php';

include 'simple_html_dom.php';

$html = file_get_html('https://pokemondb.net/ability/');
$list = $html->find('tbody', 0);
// webscraping abilites.

// foreach($html->find('tbody') as $table){ 
//     $all_trs = $table->find('tr');
//     $count = count($all_trs);
// }

// for($i=0; $i<$count; $i++) {
//     $escapeName = $list-> children($i)->find('a[class="ent-name"]', 0)->plaintext;
//     $name = mysqli_real_escape_string($conn, $escapeName);
//     $escapeDesc = $list-> children($i)->find('td[class="cell-med-text"]', 0)->plaintext;
//     $desc = mysqli_real_escape_string($conn, $escapeDesc);
//     mysqli_query($conn ,"INSERT INTO ability (a_name, a_desc) VALUES ('$name', '$desc');");
// }

//webscraping abilities detail.
$c = 1;
$list = $html->find('tbody', 0);
for($i=0; $i<263; $i++) {
    $list = $html->find('tbody', 0);
    $name = $list-> children($i)->find('a[class="ent-name"]', 0)->plaintext;
    $link = str_replace(' ','-', str_replace('\'','', strtolower($name)));
    $url = file_get_html('https://pokemondb.net/ability/'.$link."/");
    $find = $url -> find('div[class="grid-col span-md-12 span-lg-6"]', 1);
    foreach($find->find('div[class="resp-scroll"]', 0)->find('table') as $tbody){ 
        $all = $tbody->find('tr');
        $count_trow = count($all)-1;
    }
    $p_id = $find->find('table[class="data-table"]', 0)->find('tbody', 0)->children(0)->find('span[class="infocard-cell-data"]', 0)->plaintext;
    mysqli_query($conn ,"INSERT INTO ability_detail (a_id, p_id) VALUES ('$c', '$p_id');");
    if($count_trow>1) {
        for($j=1; $j<$count_trow; $j++)
        {
            
            if($find->find('table[class="data-table"]', 0)->find('tbody', 0)->children($j)->find('span[class="infocard-cell-data"]', 0)->plaintext!=$find->find('table[class="data-table"]', 0)->find('tbody', 0)->children($j-1)->find('span[class="infocard-cell-data"]', 0)->plaintext)
            {
                $p_id = $find->find('tbody', 0)->children($j)->find('span[class="infocard-cell-data"]', 0)->plaintext;
                mysqli_query($conn ,"INSERT INTO ability_detail (a_id, p_id) VALUES ('$c', '$p_id');");
            }
        
        }
    }
    $c++;

}