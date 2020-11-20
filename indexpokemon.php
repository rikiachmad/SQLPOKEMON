<html>
<body>
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
    if(isset($_POST['search'])){
        $searchq = $_POST['search'];
        $sql = "SELECT
        pokemon.p_id,
        pokemon.p_img,
        pokemon.p_name,
        pokemon.p_hp,
        pokemon.p_atk,
        pokemon.p_def,
        pokemon.p_spd,
        GROUP_CONCAT(pokemon_type.pt_name) as types
        FROM pokemon
        JOIN type_detail ON pokemon.p_id = type_detail.p_id
        JOIN pokemon_type ON pokemon_type.pt_name = type_detail.pt_name
        WHERE pokemon.p_name LIKE '%$searchq%'
        GROUP BY pokemon.p_id;";
        $fcount= "SELECT COUNT(*) as total FROM pokemon WHERE pokemon.p_name LIKE '%$searchq%' ";
        $qfound = mysqli_query($conn,$fcount);
        $found = mysqli_fetch_array($qfound);
        $founds = $found["total"]; 
        $query = mysqli_query($conn ,$sql); 
        $count = mysqli_num_rows($query);
    }
    
    ?>
    <head>
        <title>POKEMON DATABASE</title>
        <link rel = "icon" href ="pikachu.png" type = "image/x-icon"> 
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet"> 
    </head>

    <body class="body">
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
    <div class="result">
    <?php echo $founds.' Result found!'; ?>
    </div>
<table>
<thead>
    <tr>
        <th>No</th>
        <th>Img</th>
        <th>Name </th>
        <th>HP  </th>
        <th>ATK </th>
        <th>DEF </th>
        <th>SPD </th>
        <th>Type    </th>
        <th><form action = update.php method=POST>
            <input type = submit value = UpdatePokemon>
            </form>
            </th>
    </tr>
</thead>
<tbody>
<?php
    
        if($count==0) {
            $output = 'No pokemon found!';
            echo $output;
        }
        else {
            while($row = mysqli_fetch_array($query)) {
                // $imageData = base64_encode(file_get_contents($row["p_img"])); uncomment this line and replace $row["p_img"] with $imagedata to display pokemon.png
                $id = $row["p_id"];
                echo "<tr><td>".$row["p_id"]."</td><td>".$row["p_img"]."</td><td>"
                .$row["p_name"]."</td><td>".$row["p_hp"]."</td><td>".$row["p_atk"]
                ."</td><td>".$row["p_def"]."</td><td>".$row["p_spd"]."</td><td>".$row["types"]."</td><td ><form action = delete.php method=POST>
                <input type = hidden name=delete value =".$id."><a onClick=\"return confirm('are you sure want to delete this pokemon?');\">
                <input type = submit value = DeletePokemon></td>
                </form></tr>";
            }
        }
    ?>
</tbody>
</table>
    </div>
</body>

</html>






