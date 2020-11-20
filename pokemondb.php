
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
    $newrecord = '';
    $entername = '';
    if(isset($_POST['submitted']))
    {
        $name = $_POST['name'];
        if($name==NULL)
        $entername = 'Please enter name field!';
        else{
        $name = mysqli_real_escape_string($conn, $name);
        $type1 = $_POST['Type1'];
        $type2 = $_POST['Type2'];
        $hp = $_POST['HP'];
        $atk = $_POST['ATK'];
        $def = $_POST['DEF'];
        $spd = $_POST['SPD'];

        $insertpokemon = "INSERT INTO pokemon (p_name, p_hp, p_atk, p_def, p_spd) VALUES ('$name', '$hp', '$atk', '$def', '$spd')";
        mysqli_query($conn, $insertpokemon);
        $id = mysqli_query($conn, "SELECT p_id FROM pokemon ORDER BY p_id DESC LIMIT 1;");
        $row = mysqli_fetch_array($id);
        $id = $row['p_id'];
        $inserttype1 = "INSERT INTO type_detail (p_id, pt_name) VALUES ('$id', '$type1');";
        $inserttype2 = "INSERT INTO type_detail (p_id, pt_name) VALUES ('$id', '$type2');";
        mysqli_query($conn, $inserttype1);
        mysqli_query($conn, $inserttype2);
        $newrecord = 'New pokemon has been added!';
        }

    }
    ?>

<html>    
<head>
        <title>Pokemon Database</title>
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
        <br>
        <div class="main">
            <div class = "search-engine"><form class="button" action="indexpokemon.php" method="post">
                <h3 class="section-title">Search Pokemon</h3>
                <input type="text" name="search" placeholder="Search.."/></input>
                <input type="submit" name="submit" value="Search!"></input>
            </form></div>
        </div>
        <div class="contents">
            <h3 class="section-title">Enter Your Own Pokemon</h3>
            <div class="contents-item">
                <form action="pokemondb.php" method="POST">
                    <input type="hidden" name="submitted" value="true" />
                    <fieldset>
                        <legend>Enter Your Pokemon</legend>
                        <p>
                            <label>Name:</label>
                            <input type="text" name="name" placeholder="Enter Name.."/>
                        </p>
                        <p>
                            <label>Type 1:</label>
                            <select id="select1" name="Type1">
                                <option value = Normal>Normal</option>
                                <option value = Fire>Fire</option>
                                <option value = Water>Water</option>
                                <option value = Electric>Electric</option>
                                <option value = Grass>Grass</option>
                                <option value = Ice>Ice</option>
                                <option value = Fighting>Fighting</option>
                                <option value = Poison>Poison</option>
                                <option value = Ground>Ground</option>
                                <option value = Flying>Flying</option>
                                <option value = Psychic>Psychic</option>
                                <option value = Bug>Bug</option>
                                <option value = Rock>Rock</option>
                                <option value = Ghost>Ghost</option>
                                <option value = Dragon>Dragon</option>
                                <option value = Dark>Dark</option>
                                <option value = Steel>Steel</option>
                                <option value = Fairy>Fairy</option>
                            </select>
                        </p>
                        <p>
                            <label>Type 2:</label>
                            <select id="select1" name="Type2">
                                <option value = >--</option>
                                <option value = Normal>Normal</option>
                                <option value = Fire>Fire</option>
                                <option value = Water>Water</option>
                                <option value = Electric>Electric</option>
                                <option value = Grass>Grass</option>
                                <option value = Ice>Ice</option>
                                <option value = Fighting>Fighting</option>
                                <option value = Poison>Poison</option>
                                <option value = Ground>Ground</option>
                                <option value = Flying>Flying</option>
                                <option value = Psychic>Psychic</option>
                                <option value = Bug>Bug</option>
                                <option value = Rock>Rock</option>
                                <option value = Ghost>Ghost</option>
                                <option value = Dragon>Dragon</option>
                                <option value = Dark>Dark</option>
                                <option value = Steel>Steel</option>
                                <option value = Fairy>Fairy</option>
                            </select>
                        </p>
                        <p>
                            <label>HP:</label>
                            <input type="number" name="HP" placeholder="HP..."/>
                        </p>
                        <p>
                            <label>ATK:</label>
                            <input type="number" name="ATK" placeholder="ATK..."/>
                        </p>
                        <p>
                            <label>DEF:</label>
                            <input type="number" name="DEF" placeholder="DEF..."/>
                        </p>
                        <p>
                            <label>SPD:</label>
                            <input type="number" name="SPD" placeholder="SPD..."/>
                        </p>
                        <br>
                        <input type="submit" value="Submit">
                        <?php echo $newrecord; echo $entername; ?>
                    </fieldset>
                </form>
            </div>
        </div>
    </body>

</html>

