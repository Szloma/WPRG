<?php
session_start();
if (!isset($_SESSION['general']) || !isset($_SESSION['people'])) {
    header('Location: index.php');
    exit();
}

$general = $_SESSION['general'];
$people = $_SESSION['people'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Podsumowanie</title>
</head>
<body>
<h1>Podsumowanie</h1>
<h2>Informacje</h2>
<p>Numer Karty: <?php echo htmlspecialchars($general['card_number']); ?></p>
<p>Imię: <?php echo htmlspecialchars($general['name']); ?></p>
<p>Ilość ludzi: <?php echo htmlspecialchars($general['num_people']); ?></p>
<p>Data przyjazdu: <?php echo htmlspecialchars($general['arrival_date']); ?></p>
<p>Godzina przyjazdu: <?php echo htmlspecialchars($general['arrival_time']); ?></p>


<h2>Zarejestrowane osoby</h2>
<?php foreach ($people as $index => $person): ?>
    <h3>Osoba <?php echo $index + 1; ?></h3>
    <p>Imię: <?php echo htmlspecialchars($person['name']); ?></p>
    <p>Wiek: <?php echo htmlspecialchars($person['age']); ?></p>
    <p>Email: <?php echo htmlspecialchars($person['email']); ?></p>
    <p>Adres: <?php echo htmlspecialchars($person['address']); ?></p>
<?php endforeach; ?>
</body>
</html>