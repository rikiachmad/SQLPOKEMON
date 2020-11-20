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
    if(isset($_POST['submitted']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $name = mysqli_real_escape_string($conn, $name);
        $hp = $_POST['HP'];
        $atk = $_POST['ATK'];
        $def = $_POST['DEF'];
        $spd = $_POST['SPD'];

        $pid = mysqli_query($conn, "SELECT * FROM pokemon WHERE p_id=$id;");
        $row = mysqli_num_rows($pid);
        if($row>0){
        $insertpokemon = "UPDATE pokemon SET p_name='$name', p_hp='$hp', p_atk='$atk', p_def='$def', p_spd='$spd' WHERE p_id = $id";
        mysqli_query($conn, $insertpokemon);
        $newrecord = 'Pokemon has been updated!';
        }

        else echo 'No pokemon is found!';
        

    }
    ?>
    <html>
    <head>
        <title>POKEMON DATABASE</title>
        <link rel = "icon" href ="pikachu.png" type = "image/x-icon"> 
        <link rel="stylesheet" type="text/css" href="styles.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Changa+One&display=swap" rel="stylesheet"> 
    </head>

    <body class="update">
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

        <h3 class="section-title">Update Pokemon</h3>
        <div class="contents-item">
            <form action="update.php" method="POST">
                <input type="hidden" name="submitted" value="true" />
                <fieldset>
                    <legend>Update Your Pokemon</legend>
                    <p>
                        <label>Enter pokemon Id:</label>
                        <input type="text" name="id" placeholder="Pokemon Id.."/>
                    </p>
                    <p>
                        <label>Update Name To:</label>
                        <input type="text" name="name" placeholder="Pokemon Name.."/>
                    </p>
                    <p>
                        <label>Update HP To:</label>
                        <input type="number" name="HP" placeholder="HP..."/>
                    </p>
                    <p>
                        <label>Update ATK To:</label>
                        <input type="number" name="ATK" placeholder="ATK..."/>
                    </p>
                    <p>
                        <label>Update DEF To:</label>
                        <input type="number" name="DEF" placeholder="DEF..."/>
                    </p>
                    <p>
                        <label>Update SPD To:</label>
                        <input type="number" name="SPD" placeholder="SPD..."/>
                    </p>
                    <br>
                    <input type="submit" value="Submit">
                    <?php echo $newrecord; ?>
                </fieldset>
            </form>
            </body>
            </html>