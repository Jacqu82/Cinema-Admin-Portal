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
echo "<h1>Wszystkie bilety i metody płatności</h1>";

$sql = /** @lang text */
    "SELECT Payment.id AS id, Payment.type AS type,Payment.date AS date, Movies.name AS movie, Cinemas.name AS cinema,Cinemas.adress AS address,Ticket.price AS price, Ticket.quantity AS quantity
        FROM Payment JOIN Ticket ON Payment.id=Ticket.id
        JOIN Shows ON Ticket.shows_id=Shows.id
        JOIN Movies ON Shows.movies_id=Movies.id
        JOIN Cinemas ON Shows.cinemas_id=Cinemas.id ORDER BY id";

$result = $connection->query($sql);
if (!$result) {
    die("Connection Error! " . $connection->connect_error);
}
foreach ($result as $item) {


    echo "<ol>";
    echo "<li>ID seansu: " . $item['id'];
    echo "<ul>";
    echo "<li>Film: " . $item['movie'] . "</li>";
    echo "<li>Kino: " . $item['cinema'] . ", " . $item['address'] . "</li>";
    echo "<li>Ilość biletów: " . $item['quantity'] . "</li>";
    echo "<li>Cena biletu: " . $item['price'] . " zł</li>";
    echo "<li>Płatność: " . $item['type'] . "</li>";
    echo "<li>Data zakupu: " . $item['date'] . "</li>";
    echo "</ul>";
    echo "</li>";
    echo "</ol>";
}
$connection->close();
