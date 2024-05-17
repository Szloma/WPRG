<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['general'] = $_POST;
    header('Location: details.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dane</title>
</head>
<body>
<h1>Wpisz dane</h1>
<form method="post" action="">
    <label for="card_number">Numer Karty kredytowej:</label>
    <input type="text" id="card_number" name="card_number" required><br>

    <label for="name">Imię:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="num_people">Ilość ludzi:</label>
    <input type="number" id="num_people" name="num_people" required min="1"><br>

    <label for="arrival_date">Data przyjazdu:</label>
    <input type="date" id="arrival_date" name="arrival_date"><br>

    <label for="arrival_time">Godzina przyjazdu:</label>
    <input type="time" id="arrival_time" name="arrival_time"><br>

    <input type="submit" value="Next">
</form>
</body>
</html>