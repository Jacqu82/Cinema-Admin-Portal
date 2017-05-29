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

echo "<link rel='stylesheet' href='css/style.css'>";
echo "<h1>Stwórz nowy seans</h1>";
echo "<form action='#' method='POST'>";
echo "<h3>Wybierz kino:</h3>";
echo "<select name='cinema'>";

$sql = /** @lang text */
    "SELECT * FROM Cinemas";
$result = $connection->query($sql);
if (!$result) {
    die("Connection Error! " . $connection->connect_error);
}
foreach ($result as $item) {
    echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option<br/>";
}
echo "</select>";

echo "<h3>Wybierz film:</h3>";
echo "<select name='movie'>";

$sql = /** @lang text */
    "SELECT * FROM Movies";
$result = $connection->query($sql);
if (!$result) {
    die("Connection Error! " . $connection->connect_error);
}
foreach ($result as $item) {
    echo "<option value='" . $item['id'] . "'>" . $item['name'] . "</option><br/>";
}
echo "</select><br/><br/>";
echo "<input type='submit' value='Dodaj'/>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cinema']) && isset($_POST['movie'])) {
        $cinema = $_POST['cinema'];
        $movie = $_POST['movie'];

        $sql = /** @lang text */
            "INSERT INTO Shows(cinemas_id, movies_id) VALUES('$cinema', '$movie')";
        $result = $connection->query($sql);
        if ($result) {
            echo "<h3>Stworzyłeś nowy seans!</h3>";
        } else {
            die("Connection Error! " . $connection->connect_error);
        }
    }
}
$connection->close();
