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
        <h1 style="color: blue">Wyszukaj swój ulubiony film w najbliższym kinie</h1>
        <form action="#" method="POST">
            <h3 style="color: gold">Wybierz film:</h3>
<?php

$sql = /** @lang text */
    "SELECT * FROM Movies";
$result = $connection->query($sql);
if (!$result) {
    die("Connection Error! " . $connection->connect_error);
}
foreach ($result as $item) {
    echo "<input type='radio' name='movies' value='" . $item['id'] . "'>" . $item['name'] . "<br/>Opis filmu:  " . $item['description'] . "<br/>Rating filmu: " . $item['rating'] . "<br/><br/>";
}

echo "<button class='btn btn-primary' type ='submit'>Wyszukaj kina</button>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['movies'])) {
        $movies = $_POST['movies'];

        $sql = /** @lang text */
            "SELECT movies_id, Cinemas.name AS cinema, Cinemas.adress AS address FROM Shows
            JOIN Cinemas ON Shows.cinemas_id = Cinemas.id WHERE Shows.movies_id = $movies";

        $result = $connection->query($sql);
        if (!$result) {
            die("Connection Error!" . $connection->connect_error);
        }

        $sql1 = /** @lang text */
            "SELECT * FROM Movies WHERE id = '$movies'";
        $result1 = $connection->query($sql1);

        foreach ($result1 as $item) {
            echo "Film: " . $item['name'];
        }

        if ($result->num_rows > 0) {
            echo " jest wyświetlany w następujących kinach: <br/><br/>";
            foreach ($result as $item) {
                echo $item['cinema'] . ", " . $item['address'] . "<br/>";
            }
        } else {
            echo " nie jest wyświetlany w żadnym kinie";
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
