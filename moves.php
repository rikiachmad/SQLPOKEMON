<?php
$dbServename = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "db_pokemon";
$conn = mysqli_connect($dbServename, $dbUsername, $dbPassword, $dbName);
if(mysqli_connect_errno()){
 echo "Failed to connect!";
exit();
}
function sortorder($fieldname){
    $sorturl = "?order_by=".$fieldname."&sort=";
    $sorttype = "asc";
    if(isset($_GET['order_by']) && $_GET['order_by'] == $fieldname){
        if(isset($_GET['sort']) && $_GET['sort'] == "asc"){
            $sorttype = "desc";
        }
    }
    $sorturl .= $sorttype;
    return $sorturl;
}
?>
<head>
        <title>POKEMON DATA BASE</title>
        <link rel = "icon" href ="pikachu.png" type = "image/x-icon"> 
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet"> 
    </head>

    <body>
        <div class="header">
            <div class="header-logo"><b>Pokemon Database</b></div>
            <div class="header-list">
                <ul>
                    <li><a href="pokemondb.php">Home</a></li>
                    <li><a href="abilities.php">Abilities</a></li>
                    <li><a href="items.php">Items</a></li>
                    <li><a href="moves.php">Moves</a></li>
                </ul>
            </div>
        </div>
        <div class="tabel">
    <table>
        <thead>
            <tr>
                <th><a class="th" href="moves.php<?php echo sortorder('name'); ?>">Name</a></th>
                <th><a class="th" href="moves.php<?php echo sortorder('type'); ?>">Type </a></th>
                <th><a class="th" href="moves.php<?php echo sortorder('power'); ?>">Power</a></th>
                <th><a class="th" href="moves.php<?php echo sortorder('descr'); ?>">Description </a></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT * FROM pokemon_move";

            if (isset($_GET['order_by']))
            {
                if($_GET['order_by']=="name"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY pm_name ASC";
                else $sql .= " ORDER BY pm_name DESC";
                }
                if($_GET['order_by']=="type"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY pt_name ASC";
                else $sql .= " ORDER BY pt_name DESC";
                }
                if($_GET['order_by']=="power"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY pm_power ASC";
                else $sql .= " ORDER BY pm_power DESC";
                }
                if($_GET['order_by']=="descr"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY pm_desc ASC";
                else $sql .= " ORDER BY pm_desc DESC";
                }
}

$query = mysqli_query($conn ,$sql);
    while($row = mysqli_fetch_array($query)) {
        echo "<tr><td>".$row["pm_name"]."</td><td>"
        .$row["pt_name"]."</td><td>".$row["pm_power"]."</td><td>".$row["pm_desc"]."</td></tr>";
    }
    ?>
</tbody>
</table>
</div>
</body>