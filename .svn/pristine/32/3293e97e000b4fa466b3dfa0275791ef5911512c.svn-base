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
echo "<br> CONF : <br>";
print_array($elements);

echo "<br> SORT : <br>";



Map::displayMap($elements, "map.txt");

$mapArr = Map::readMap($mapFile);

$mapArr = Map::displayElement($elements, $mapArr, $mapFile);
echo "<br>START MAP :<br>";
print_array($mapArr);

Map::writeFile($mapArr, $mapFile);

// $test = Move::adventurerMoves($elements, $mapArr);
// echo "<br>test found :<br>";
// var_dump($test);

// echo "TEST";




?>

