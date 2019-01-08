<?php
// require 'readConf.php';

//autoloader pour inclure les classes automatiquement
require 'Autoloader.php'; 
Autoloader::register(); 

function print_array($r) {
    echo "<pre>";
    var_dump($r);
    echo "</pre>";
}

//lectrure du le fichier de conf (conf.txt) et stockage
//de chaque ligne dans un tableau multidimensionnel
$file = 'conf.txt';
$mapFile = 'map.txt';
// $conf = readConf($file);
$conf = Map::readConf($file);

//lecture du fichier de conf et création d'un tableau contenant tous les objets générés
$elements = Element::createElements($conf);

$mapArr = Map::readMap($conf);

Map::displayMap($elements, "map.txt");

$temp = Map::readMap($mapFile);


$temp = Map::displayElement($elements, $temp, $mapFile);
echo "<br>START MAP :<br>";

Map::writeFile($temp, $mapFile);
print_array($temp);

$test = Move::adventurerMoves($elements, $temp);
// echo "<br>NEW MAP :<br>";
// print_array($temp);
Map::writeFile($test, $mapFile);
?>