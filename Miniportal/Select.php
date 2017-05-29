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
echo "<h3>Wszystkie dostępne rekordy w bazie danych</h3>";

$sql = "SELECT * FROM Cinema ORDER BY name ASC";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo "Wszystkie kina w mojej bazie:<br/><br/>";
    while ($row = $result->fetch_assoc()) {
        echo $row['name'] . " - " . $row['address'] . "<br/>";
    }
} else {
    echo "Brak kin w bazie danych!<br>";
}
echo "<hr/>";

$sql = "SELECT * FROM Movie ORDER BY name ASC";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo "Lista filmów w moje bazie:<br/><br/>";
    while ($row = $result->fetch_assoc()) {
        echo $row['name'] . " - " . $row['description'] . ", " . $row['rating'] . "<br>";
    }
} else {
    echo "Brak filmów w bazie danych<br>";
}
echo "<hr/>";

$sql = "SELECT * FROM Ticket";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo "Lista biletów w bazie danych:<br/><br/>";
    while ($row = $result->fetch_assoc()) {
        echo "Ilość: " . $row['quantity'] . " - Cena: " . $row['price'] . " zł<br>";
    }
} else {
    echo "W bazie danych nie ma żadnych biletów<br/>";
}
echo "<hr/>";

$sql = "SELECT * FROM Payment ORDER BY date DESC";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo "<br>";
    echo "Lista płatności w bazie:<br/>";
    echo "(od najmłodszych)<br/><br/>";
    while ($row = $result->fetch_assoc()) {
        echo $row['type'] . ", " . $row['date'] . "<br>";
    }
} else {
    echo "Brak płatności w bazie<br/>";
}

$sql = "SELECT * FROM Payment ORDER BY date ASC";
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    echo "<br>";
    echo "Lista płatności w bazie:<br/>";
    echo "(od najstarszych)<br/><br/>";
    while ($row = $result->fetch_assoc()) {
        echo $row['type'] . ", " . $row['date'] . "<br>";
    }
} else {
    echo "Brak płatności w bazie<br/>";
}
$connection->close();
