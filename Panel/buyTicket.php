<?php

$host = 'localhost';
$user = 'root';
$password = 'coderslab';
$database = 'cinema_db';

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection Error! " . $connection->connect_error);
}

$connection->query("SET CHARACTER SET utf8");

echo "<link rel='stylesheet' href='css/style.css'>";
echo "<h1 style='color:red'>Kup bilet na wybrany seans</h1>";
echo "<form action='#' method='POST'>";
echo "<h3 style='color:orangered'>Wybierz seans:</h3>";
echo "<select name='shows'>";

$sql = /** @lang text */
    "SELECT Shows.id AS id,Cinemas.name AS cinema,Movies.name AS movie FROM Shows
        JOIN Cinemas ON Shows.cinemas_id=Cinemas.id
        JOIN Movies ON Shows.movies_id=Movies.id
        ORDER BY cinema,movie";

$result = $connection->query($sql);
if (!$result) {
    die("Connection Error! " . $connection->connect_error);
}

foreach ($result as $item) {
    echo "<option value='" . $item['id'] . "'>Film: " . $item['movie'] . ", w kinie: " . $item['cinema'] . "</option><br/>";
}

echo "</select>";
echo "<h3 style='color:yellow'>Ilość biletów:</h3>";
echo "<input name='quantity' type='number' min='0'/>";
echo "<h3 style='color:green'>Cena:</h3>";
echo "<input name='price' type='number' min='0' step='0.01'/>";
echo "<h3 style='color:blue'>Typ płatności:</h3>";
echo "<select name='payment_type'>";
echo "<option value='' selected>Wybierz sposób płatności:</option>";
echo "<option value='Przelew'>Przelew</option>";
echo "<option value='Gotówka'>Gotówka</option>";
echo "<option value='Karta'>Karta</option>";
echo "</select>";
echo "<h3 style='color:purple'>Data:</h3>";
echo "<input type='date' name='payment_date'/><br/><br/>";
echo "<input type='submit' name='ticket' value='Kup bilet'/>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['shows']) && isset($_POST['payment_type']) && isset($_POST['payment_date'])) {
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $shows = $_POST['shows'];
        $payment_type = $_POST['payment_type'];
        $payment_date = $_POST['payment_date'];

        $sql = /** @lang text */
            "INSERT INTO Ticket(quantity, price, shows_id) VALUES ($quantity, $price, $shows)";
        $result = $connection->query($sql);

        if ($result == false) {
            echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect_error;
        }
        $id = $connection->insert_id;
        if ('' === $payment_type) {
            $payment_type = "Brak";
            $pay = "Nieopłacony";
        } else {
            $pay = "Opłacony";
        }

        $sql1 = /** @lang text */
            "INSERT INTO Payment VALUES ($id, '$payment_type', '$payment_date','$pay')";
        $result1 = $connection->query($sql1);

        if ($result1 == false) {
            echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect_error;
        }
    }
    if (isset($_POST['ticket'])) {
        $sql2 = /** @lang text */
            "SELECT Ticket.id AS id,Movies.name AS movie,Cinemas.name AS cinema,Cinemas.adress AS address,Ticket.price AS price,
                Ticket.quantity AS quantity FROM Shows
                JOIN Ticket ON Ticket.shows_id=Shows.id
                JOIN Movies ON Movies.id=Shows.movies_id
                JOIN Cinemas ON Cinemas.id=Shows.cinemas_id ORDER BY id DESC LIMIT 1";

        $result2 = $connection->query($sql2);
        if (!$result2) {
            die("Connection Error! " . $connection->connect_error);
        }
        foreach ($result2 as $item) {
            echo "<h3>Kupiłeś bilet na: <br/>ID seansu: " . $item['id'] . "<br/>Film: " . $item['movie'] . "<br/>Kino: " . $item['cinema'] . " , " . $item['address'] . "<br/>Ilość biletów: " . $item['quantity'] . "<br/>Cena biletu: " . $item['price'] . "</h3>";
        }
    }
}
$connection->close();
