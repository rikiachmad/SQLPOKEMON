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
    </body>
    <?php
$id = $_POST['delete'];
mysqli_query($conn, "DELETE FROM type_detail WHERE p_id = $id");
mysqli_query($conn, "DELETE FROM pokemon WHERE p_id = $id");
echo 'Pokemon has been deleted.';