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
    if (isset($_POST['name']) && isset($_POST['address']) && isset($_POST['submit']) == 'cinema') {
        $name = $_POST['name'];
        $address = $_POST['address'];

        $sql = "INSERT INTO Cinema(name, address) VALUES ('$name', '$address')";
        $result = $connection->query($sql);

        if ($result != false) {
            echo "Poprawnie dodano dane do tabeli";
        } else {
            echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect->error;
        }
    } else if (isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['rating']) && isset($_POST['submit']) == 'movie') {
        if ($_POST['rating'] > 0 && $_POST['rating'] <= 10) {
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $rating = $_POST['rating'];

            $sql = "INSERT INTO Movie(name, description, rating) VALUES ('$name', '$desc', $rating)";
            $result = $connection->query($sql);

            if ($result != false) {
                echo "Poprawnie dodano dane do tabeli";
            } else {
                echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect->error;
            }
        } else {
            echo "Oceń film w skali od 1 do 10!";
        }
    } else if (isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['submit']) == 'ticket') {
        if ($_POST['price'] > 0) {
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];

            $sql = "INSERT INTO Ticket(quantity, price) VALUES ($quantity, $price)";
            $result = $connection->query($sql);

            if ($result != false) {
                echo "Poprawnie dodano dane do tabeli";
            } else {
                echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect->error;
            }
        } else {
            echo "Cena biletu powinna być większa niż 0!";
        }
    } else if (isset($_POST['payment_type']) && isset($_POST['payment_date']) && isset($_POST['submit']) == 'payment') {
        if ($_POST['payment_type'] == 'cash' || $_POST['payment_type'] == 'card' || $_POST['payment_type'] == 'transfer') {
            $payment_type = $_POST['payment_type'];
            $payment_date = $_POST['payment_date'];

            $sql = "INSERT INTO Payment(type, date) VALUES ('$payment_type', $payment_date)";
            $result = $connection->query($sql);

            if ($result != false) {
                echo "Poprawnie dodano dane do tabeli";
            } else {
                echo "Błąd podczas dodawania danych. Spróbuj jeszcze raz!" . $connection->connect_error;
            }
        } else {
            echo "Wybierz jeden z dostępnych typów płatności";
        }
    } else {
        echo "Błąd podczas wprowadzania danych";
    }
}
?>

    <div>
        <h3>Dodaj nowy rekord do bazy danych</h3>
        <form class="cinema_form" method="post" action="#">
            <label>Nazwa Kina:</label><br>
            <input name="name" type="text" maxlength="255" value=""/><br>
            <label>Adres:</label><br>
            <input name="address" type="text" maxlength="255" value=""/><br>
            <button type="submit" name="submit" value="cinema">Wyślij</button>
        </form>
    </div>

    <div>
        <form class="movie_form" method="post" action="#">
            <label>Nazwa Filmu:</label><br>
            <input name="name" type="text" maxlength="255" value=""/><br>
            <label>Opis:</label><br>
            <input name="desc" type="text" maxlength="255" value=""/><br>
            <label>Rating:</label><br>
            <input name="rating" type="number" min="0" max="10"/><br>
            <button type="submit" name="submit" value="movie">Wyślij</button>
        </form>
    </div>

    <div>
        <form class="ticket_form" method="post" action="#">
            <label>Ilość biletów:</label><br>
            <input name="quantity" type="number" min="0"/><br>
            <label>Cena:</label><br>
            <input name="price" type="number" min="0" step="0.01"/><br>
            <button type="submit" name="submit" value="ticket">Wyślij</button>
        </form>
    </div>

    <div>
        <form class="payment_form" method="post" action="#">
            <label>Typ płatności:</label><br>
            <select name="payment_type">
                <option value="transfer">Przelew</option>
                <option value="cash">Gotówka</option>
                <option value="card">Karta</option>
            </select><br>
            <label>Data:</label><br>
            <input type="date" name="payment_date"><br>
            <button type="submit" name="submit" value="payment">Wyślij</button>
        </form>
    </div>
<?php
$connection->close();
