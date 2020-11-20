<?php
include 'dbh.inc.php';

include 'simple_html_dom.php';

$html = file_get_html('https://pokemondb.net/move/all/');
$list = $html->find('tbody', 0);


foreach($html->find('tbody') as $table){ 
    $all_trs = $table->find('tr');
    $count = count($all_trs);
}
for($i=0; $i<$count; $i++) {
    $name = $list->children($i)->find('td[class="cell-name"]', 0)->plaintext;
    $type = $list->children($i)->find('td[class="cell-icon]' ,0)->plaintext;
    $escapePower = $list->children($i)->find('td[class="cell-num]' ,0)->plaintext;
    $power = str_replace('—','', $escapePower);
    $escapeDesc = $list->children($i)->find('td[class="cell-long-text]' ,0)->plaintext;
    $desc = mysqli_real_escape_string($conn, $escapeDesc);
    mysqli_query($conn ,"INSERT INTO pokemon_move (pm_name, pt_name, pm_power ,pm_desc) VALUES ('$name', '$type', '$power', '$desc');");
}
