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
        <title>POKEMON DATABASE</title>
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
        <th><a class="th" href="items.php<?php echo sortorder('name'); ?>">Name</a></th>
        <th><a class="th" href="items.php<?php echo sortorder('effect'); ?>">Effect </a></th>
    </tr>
</thead>
<tbody>

<?php
$sql = "SELECT * FROM item";

if (isset($_GET['order_by']))
{

    if($_GET['order_by']=="name"){
        if($_GET['sort']=='asc')
            $sql .= " ORDER BY i_name ASC";
        else $sql .= " ORDER BY i_name DESC";
    }
    if($_GET['order_by']=="effect"){
        if($_GET['sort']=='asc')
            $sql .= " ORDER BY i_effect ASC";
        else $sql .= " ORDER BY i_effect DESC";
    }
}

$query = mysqli_query($conn ,$sql);
    while($row = mysqli_fetch_array($query)) {
        echo "<tr><td>".$row["i_name"]."</td><td>"
        .$row["i_effect"]."</td></tr>";
    }
    ?>
</tbody>
</table>
</div>
</body>