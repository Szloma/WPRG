<?php



$ilosc_osob =  $_GET['liczba_osob'];
$imie =  $_GET['imie'];
$nazwisko =  $_GET['nazwisko'];
$adres =  $_GET['adres'];
$karta_kredytowa = $_GET['karta_kredytowa'];
$email =  $_GET['email'];
$data_pobytu =  $_GET['data_pobytu'];
$godzina_przyjazdu =  $_GET['godzina_przyjazdu'];
$lozko_dziecko = isset( $_GET['lozko_dziecko']) ? "Tak" : "Nie";
$popielniczka = isset( $_GET['popielniczka']) ? "Tak" : "Nie";
$klimatyzacja = isset( $_GET['klimatyzacja']) ? "Tak" : "Nie";

echo "<p>Ilość osób: $ilosc_osob</p>";
echo "<p>Imię: $imie</p>";
echo "<p>Nazwisko: $nazwisko</p>";
echo "<p>Adres: $adres</p>";
echo "<p>Dane karty kredytowej: $karta_kredytowa</p>";
echo "<p>E-mail: $email</p>";
echo "<p>Data pobytu: $data_pobytu</p>";
echo "<p>Godzina przyjazdu: $godzina_przyjazdu</p>";
echo "<p>Potrzeba dostawienia łóżka dla dziecka: $lozko_dziecko</p>";
echo "<p>Popielniczka dla palacza: $popielniczka</p>";
echo "<p>Klimatyzacja: $klimatyzacja"
?>
