<?php
class NoweAuto
{
    // property declaration
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPln;
    function __construct($model, $cenaEuro,$kursEuroPln) {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPln = $kursEuroPln;

    }
    // method declaration
    function displayModel() {
        echo $this->model;
    }

    function getModel()
    {
        return $this->model;
    }
    function setModel($model){
        $this->model = $model;
    }
    function set_cenaEuro($cenaEuro) {
        $this->cenaEuro = $cenaEuro;
    }
    function setCenaEuroPln($euroPln){
        $this->kursEuroPln = $euroPln;
    }
    function getKursEuroPln(){
        return $this->kursEuroPln;
    }

    function obliczCene()
    {
        $tmpval1 = sprintf("%.2f",$this->cenaEuro);
        $tmpval2 = sprintf("%.2f",$this->kursEuroPln);
        return $tmpval2*$tmpval2;
    }
}
class AutoZDodatkami extends NoweAuto{
    protected $alarm;
    protected $radio;

    protected $klimatyzacja;

    public function __construct($model, $cenaEuro, $kursEuroPln, $alarm, $radio,$klimatyzacja)
    {
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;


        parent::__construct($model, $cenaEuro, $kursEuroPln);
    }

    public function setAlarm($alarm)
    {
        $this->alarm = $alarm;
    }
    public function setRadio($Radio)
    {
        $this->radio = $Radio;
    }

    public function setKlimatyzaacja($klimatyzacja){
        $this->klimatyzacja = $klimatyzacja;
    }
    public function getAlarm(){
        return $this->alarm;
    }
    public function getRadio(){
        return $this->radio;
    }
    public function getKlimatyzacja(){
        return $this->klimatyzacja;
    }
    public  function  obliczCene(){
    $podstawa = parent::obliczCene();
    $cenaDodatkowa = ($this->alarm + $this->radio + $this->klimatyzacja) * $this->kursEuroPln;
    return $podstawa+$cenaDodatkowa;
}
}

class Ubezpieczenie extends autoZDodatkami{
    protected $wartoscUbezpieczenia;
    protected $liczbaLatPosiadania;

    public function __construct($model, $cenaEuro, $kursEuroPln, $alarm, $radio, $klimatyzacja, $wartoscUbezpieczenia,$liczbaLatPosiadania)
    {
        $this->wartoscUbezpieczenia = $wartoscUbezpieczenia;
        $this->liczbaLatPosiadania =  $liczbaLatPosiadania;
        parent::__construct($model, $cenaEuro, $kursEuroPln, $alarm, $radio, $klimatyzacja);
    }
    function obliczCene()
    {
        $cenaSamochoduZDodatkami = parent::obliczCene();
        $tmpConversion = sprintf("%.2f", $this->liczbaLatPosiadania);
        $zmniejszenie = (100 - $tmpConversion) / 100;
        $wartoscUbezpieczenia = $this->wartoscUbezpieczenia * $cenaSamochoduZDodatkami * $zmniejszenie;
        return $wartoscUbezpieczenia;
    }
}

$ubezpieczenie1 = new Ubezpieczenie("Model T", 50000, 4.5, 800.0, 450.0, 1100.0, 0.04, 1);
echo  $ubezpieczenie1->getModel();
echo $ubezpieczenie1->getKursEuroPln();
echo $ubezpieczenie1->getAlarm();
echo $ubezpieczenie1->getRadio();
echo $ubezpieczenie1->getKlimatyzacja();
echo $ubezpieczenie1->obliczCene();

?>