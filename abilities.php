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
                <th><a class="th" href="abilities.php<?php echo sortorder('name'); ?>">Name</a></th>
                <th><a class="th" href="abilities.php<?php echo sortorder('descr'); ?>">Description </a></th>
                <th><a class="th" href="abilities.php<?php echo sortorder('pokemon'); ?>">Pokemons With This Ability</a></th>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "SELECT ability.a_id, ability.a_name, ability.a_desc, GROUP_CONCAT(pokemon.p_name) as pokemons
                    FROM ability JOIN ability_detail ON ability.a_id = ability_detail.p_id 
                    JOIN pokemon ON pokemon.p_id = ability_detail.a_id GROUP BY ability.a_id";

            if (isset($_GET['order_by']))
            {
                if($_GET['order_by']=="name"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY a_name ASC";
                else $sql .= " ORDER BY a_name DESC";
                }
                if($_GET['order_by']=="descr"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY a_desc ASC";
                else $sql .= " ORDER BY a_desc DESC";
                }
                if($_GET['order_by']=="pokemon"){
                    if($_GET['sort']=='asc')
                        $sql .= " ORDER BY pokemons ASC";
                else $sql .= " ORDER BY pokemons DESC";
                }
}

$query = mysqli_query($conn ,$sql);
    while($row = mysqli_fetch_array($query)) {
        echo "<tr><td>".$row["a_name"]."</td><td>"
        .$row["a_desc"]."</td><td>".$row["pokemons"]."</td></tr>";
    }
    ?>
</tbody>
</table>
</div>
</body>
