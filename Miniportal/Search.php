<h3>Wyświetl informacje spośród wszystkich kin, filmów, biletów, dat i metod płatności</h3>
<form method="post" action="#">
    <input type="radio" name="cinema">Lista kin<br/>
    <input type="radio" name="movie">Lista filmów<br/>
    <input type="radio" name="ticket">Lista biletów<br/>
    <input type="radio" name="payment">Lista płatności<br/><br/>
    <input type="submit" name='submit' value='Wyszukaj'>
</form>

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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cinema']) && isset($_POST['submit']) == true) {
        $cinema = $_POST['cinema'];

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
    }
    if (isset($_POST['movie']) && isset($_POST['submit']) == true) {
        $movie = $_POST['movie'];

        $sql = "SELECT * FROM Movie ORDER BY name ASC";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            echo "<br/>Lista filmów w moje bazie:<br/><br/>";
            while ($row = $result->fetch_assoc()) {
                echo $row['name'] . " - " . $row['description'] . ", " . $row['rating'] . "<br/>";
            }
        } else {
            echo "Brak filmów w bazie danych<br>";
        }
    }
    if (isset($_POST['ticket']) && isset($_POST['submit']) == true) {
        $ticket = $_POST['ticket'];

        $sql = "SELECT * FROM Ticket";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            echo "<br/>Lista biletów w bazie danych:<br/><br/>";
            while ($row = $result->fetch_assoc()) {
                echo "Ilość: " . $row['quantity'] . " - Cena: " . $row['price'] . " zł<br/>";
            }
        } else {
            echo "W bazie danych nie ma żadnych biletów<br/>";
        }
    }
    if (isset($_POST['payment']) && isset($_POST['submit']) == true) {
        $payment = $_POST['payment'];

        $sql = "SELECT * FROM Payment ORDER BY date DESC";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            echo "<br/>Lista płatności w bazie:<br/>";
            echo "(od najmłodszych)<br/><br/>";
            while ($row = $result->fetch_assoc()) {
                echo $row['type'] . ", " . $row['date'] . "<br/>";
            }
        } else {
            echo "Brak płatności w bazie<br/>";
        }

        $sql = "SELECT * FROM Payment ORDER BY date ASC";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            echo "<br/>Lista płatności w bazie:<br/>";
            echo "(od najstarszych)<br/><br/>";
            while ($row = $result->fetch_assoc()) {
                echo $row['type'] . ", " . $row['date'] . "<br/>";
            }
        } else {
            echo "Brak płatności w bazie<br/>";
        }
    }
}
$connection->close();
