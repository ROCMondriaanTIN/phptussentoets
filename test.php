<?php
$autos = [8, 9, 1];
$totaal = count($autos);

$i = 0;

while ($totaal > $i) {
    array_push($autos, $i);
    $i++;
}
var_dump($autos);

$avarage = 18 / $totaal;
echo $avarage;
