<?php
session_start();
if (!isset($_SESSION['general'])) {
    header('Location: index.php');
    exit();
}

$num_people = $_SESSION['general']['num_people'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['people'] = $_POST['people'];
    header('Location: summary.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Osoby</title>
</head>
<body>
<h1>Wpisz dane osobowe</h1>
<form method="post" action="">
    <?php for ($i = 0; $i < $num_people; $i++): ?>
        <h2>Osoba <?php echo $i + 1; ?></h2>
        <label for="people[<?php echo $i; ?>][name]">Imię:</label>
        <input type="text" id="people[<?php echo $i; ?>][name]" name="people[<?php echo $i; ?>][name]" required><br>

        <label for="people[<?php echo $i; ?>][age]">Wiek:</label>
        <input type="number" id="people[<?php echo $i; ?>][age]" name="people[<?php echo $i; ?>][age]" required min="0"><br>

        <label for="people[<?php echo $i; ?>][email]">Email:</label>
        <input type="email" id="people[<?php echo $i; ?>][email]" name="people[<?php echo $i; ?>][email]" required><br>
        <label for="people[<?php echo $i; ?>][address]">Adres:</label>
        <input type="text" id="people[<?php echo $i; ?>][address]" name="people[<?php echo $i; ?>][address]" required><br>

    <?php endfor; ?>

    <input type="submit" value="Submit">
</form>
</body>
</html>