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
?>
    <!DOCTYPE html>
    <html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search movie</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <h1 style="color: green">Pokaż repertuar kin w najbliższej okolicy</h1>
        <form action="#" method="POST">
            <h3 style="color: gold">Wybierz kino:</h3>
<?php

$sql = /** @lang text */
    "SELECT * FROM Cinemas";
$result = $connection->query($sql);
if (!$result) {
    die("Connection Error!" . $connection->connect_error);
}
foreach ($result as $item) {
    echo "<input type='radio' name='cinemas' value='" . $item['id'] . "'>" . $item['name'] . " - " . $item['adress'] . "<br/><br/>";
}
echo "<button class='btn btn-success' type ='submit'>Pokaż repertuar</button>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['cinemas'])) {
        $cinemas = $_POST['cinemas'];

        $sql = /** @lang text */
            "SELECT cinemas_id, Movies.name AS movie, Movies.description AS description,Movies.rating AS rating FROM Shows
            JOIN Movies ON Shows.movies_id = Movies.id WHERE Shows.cinemas_id = $cinemas";

        $result = $connection->query($sql);
        if (!$result) {
            die("Connection Error!" . $connection->connect_error);
        }

        $sql1 = /** @lang text */
            "SELECT * FROM Cinemas WHERE id = '$cinemas'";
        $result1 = $connection->query($sql1);

        foreach ($result1 as $item) {
            echo "Kino: " . $item['name'];
        }
        if ($result->num_rows > 0) {
            echo " wyświetla następujące filmy: ";
            foreach ($result as $item) {
                echo "<p> " . $item['movie'] . "<br/>Opis filmu: " . $item['description'] . "<br/>Rating filmu: " . $item['rating'] . "</p>";
            }
        } else {
            echo " nie wyświetla żadnych filmów";
        }
    }
}
?>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    </body>
</html>
<?php
$connection->close();
