<?php

$hostName = 'localhost';
$userName = 'root';
$password = 'coderslab';
$database = 'cinemas_db';

$connection = new mysqli($hostName, $userName, $password, $database);

if ($connection->connect_error) {
    die("Connection Error! " . $connection->connect_error);
}

$connection->query("SET CHARACTER SET utf8");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['table'])) {

    $id = $_GET['id'];
    $table = $_GET['table'];

    $sql = "DELETE FROM $table WHERE id = $id";
    $result = $connection->query($sql);
    if ($result != false) {
        echo "Z tabeli $table usunięto rekord o id $id";
    } else {
        echo "Błąd poczas usuwania rekordu" . $connection->error . "<br>";
    }
}
$connection->close();
?>

<form method="GET" action="">
    <label>Wybierz tabele w której znajduje się rekord, który chcesz usunąć</label><br>
    <select name="table">
        <option value="Movie">Film</option>
        <option value="Cinema">Kino</option>
        <option value="Ticket">Bilet</option>
        <option value="Payment">Płatność</option>
    </select><br/><br/>
    <label>Podaj id rekordu, który chcesz usunąć</label><br/>
    <input name="id" type="number"><br/><br/>
    <input type="submit" name="submit" value="Usuń wpis">
</form>