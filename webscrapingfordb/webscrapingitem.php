<?php
include 'dbh.inc.php';

include 'simple_html_dom.php';

$html = file_get_html('https://pokemondb.net/item/all/');
$list = $html->find('tbody', 0);


foreach($html->find('tbody') as $table){ 
    $all_trs = $table->find('tr');
    $count = count($all_trs);
}
for($i=0; $i<$count; $i++) 
{
    $escapeName = $list->children($i)->find('a[class="ent-name"]', 0)->plaintext;
    $escapeEffect = $list->children($i)->find('td[class="cell-long-text"]', 0)->plaintext;
    $effect = mysqli_real_escape_string($conn, $escapeEffect);
    $name = mysqli_real_escape_string($conn, $escapeName);
    mysqli_query($conn ,"INSERT INTO item (i_name, i_effect) VALUES ('$name', '$effect');");
}
