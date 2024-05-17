<?php
$servername = "localhost:3308";
$username = "root";
$password = "xxx";
$dbname = "cars";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

function getLowestPricedCars($conn) {
    $sql = "SELECT id, marka, model, cena FROM samochody ORDER BY cena ASC LIMIT 5";
    return $conn->query($sql);
}

function getAllCars($conn) {
    $sql = "SELECT id, marka, model, cena FROM samochody ORDER BY rok DESC";
    return $conn->query($sql);
}

function getCarDetails($conn, $id) {
    $sql = "SELECT * FROM samochody WHERE id = $id";
    return $conn->query($sql)->fetch_assoc();
}

function addCar($conn, $marka, $model, $cena, $rok, $opis) {
    $sql = "INSERT INTO samochody (marka, model, cena, rok, opis) VALUES ('$marka', '$model', $cena, $rok, '$opis')";
    return $conn->query($sql);
}
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Baza Samochodów</title>
    </head>
    <body>
    <table>
        <tr>
            <td><a href="index.php?page=home">Strona główna</a></td>
            <td><a href="index.php?page=all">Wszystkie samochody</a></td>
            <td><a href="index.php?page=add">Dodaj samochód</a></td>
        </tr>
    </table>

    <?php
    if ($page == 'home') {
        $cars = getLowestPricedCars($conn);
        echo "<h1>Samochody z najniższą ceną</h1>";
        echo "<table border='1'><tr><th>ID</th><th>Marka</th><th>Model</th><th>Cena</th></tr>";
        while($row = $cars->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['marka']}</td><td>{$row['model']}</td><td>{$row['cena']}</td></tr>";
        }
        echo "</table>";
    } elseif ($page == 'all') {
        $cars = getAllCars($conn);
        echo "<h1>Wszystkie samochody</h1>";
        echo "<table border='1'><tr><th>ID</th><th>Marka</th><th>Model</th><th>Cena</th><th>Szczegóły</th></tr>";
        while($row = $cars->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['marka']}</td><td>{$row['model']}</td><td>{$row['cena']}</td><td><a href='index.php?page=details&id={$row['id']}'>Szczegóły</a></td></tr>";
        }
        echo "</table>";
    } elseif ($page == 'details' && isset($_GET['id'])) {
        $car = getCarDetails($conn, $_GET['id']);
        echo "<h1>Szczegóły samochodu</h1>";
        echo "<p>ID: {$car['id']}</p>";
        echo "<p>Marka: {$car['marka']}</p>";
        echo "<p>Model: {$car['model']}</p>";
        echo "<p>Cena: {$car['cena']}</p>";
        echo "<p>Rok: {$car['rok']}</p>";
        echo "<p>Opis: {$car['opis']}</p>";
        echo "<a href='index.php'>Powrót do strony głównej</a>";
    } elseif ($page == 'add') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $marka = $_POST['marka'];
            $model = $_POST['model'];
            $cena = $_POST['cena'];
            $rok = $_POST['rok'];
            $opis = $_POST['opis'];
            addCar($conn, $marka, $model, $cena, $rok, $opis);
            echo "<p>Samochód został dodany!</p>";
        }
        ?>
        <h1>Dodaj samochód</h1>
        <form method="post" action="index.php?page=add">
            <p>Marka: <input type="text" name="marka"></p>
            <p>Model: <input type="text" name="model"></p>
            <p>Cena: <input type="number" step="0.01" name="cena"></p>
            <p>Rok: <input type="number" name="rok"></p>
            <p>Opis: <textarea name="opis"></textarea></p>
            <p><input type="submit" value="Dodaj samochód"></p>
        </form>
        <?php
    }
    ?>

    </body>
    </html>

<?php
$conn->close();
?>