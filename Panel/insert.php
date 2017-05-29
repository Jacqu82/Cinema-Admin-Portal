<link rel='stylesheet' href='css/style.css'>
<h1 style="color: orangered">Dodaj film lub kino do bazy danych</h1>
<form class="cinema_form" method="post" action="#">
    <h3>Nazwa Kina:</h3>
    <input name="name" type="text" maxlength="255" value=""/>
    <h3>Adres:</h3>
    <input name="address" type="text" maxlength="255" value=""/><br/><br/>
    <input type="submit" name="submit" value="Dodaj"/>
</form>

<form class="movie_form" method="post" action="#">
    <label><h3>Nazwa Filmu:</h3></label>
    <input name="name" type="text" maxlength="255" value=""/>
    <label><h3>Opis:</h3></label>
    <input name="desc" type="text" maxlength="255" value=""/>
    <label><h3>Rating:</h3></label>
    <input name="rating" type="number" min="0" max="10"/><br/><br/>
    <input type="submit" name="submit" value="Dodaj"/>
</form>


<?php

$hostName = 'localhost';
$userName = 'root';
$password = 'coderslab';
$database = 'cinema_db';

$connection = new mysqli($hostName, $userName, $password, $database);

if ($connection->connect_error) {
    die("Connection Error! " . $connection->connect_error);
}

$connection->query("SET CHARACTER SET utf8");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['submit']) == 'cinema') {
        $name = $_POST['name'];
        $address = $_POST['address'];

        $sql = /** @lang text */
            "INSERT INTO Cinemas(name, adress) VALUES ('$name', '$address')";
        $result = $connection->query($sql);

        if ($result != false) {
            echo "<h3>Dodałeś nowe kino do bazy danych!</h3>";
        } else {
            echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect->error;
        }
    }

    if (isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['rating']) && isset($_POST['submit']) == 'movie') {
        if ($_POST['rating'] > 0 && $_POST['rating'] <= 10) {
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $rating = $_POST['rating'];

            $sql = /** @lang text */
                "INSERT INTO Movies(name, description, rating) VALUES ('$name', '$desc', $rating)";
            $result = $connection->query($sql);

            if ($result != false) {
                echo "<h3>Dodałeś nowy film do bazy danych!</h3>";
            } else {
                echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect->error;
            }
        } else {
            echo "Oceń film w skali od 1 do 10!";
        }
    }
}
$connection->close();
