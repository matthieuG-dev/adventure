<?php
//autoloader pour inclure les classes automatiquement
require 'Autoloader.php'; 
Autoloader::register(); 

//focntion test debuggage
function print_array($r) {
    echo "<pre>";
    var_dump($r);
    echo "</pre>";
}

//inclure fichier contenant les configurations de la map
$confFile = 'conf.txt';

//inclure fichier de sortie
$mapFile = 'map.txt';

$conf = Map::readConf($confFile);

//lecture du fichier de conf et création d'un tableau contenant tous les objets générés
$elements = Element::createElements($conf);

Map::displayMap($elements, "map.txt");

$mapArr = Map::readMap($mapFile);

$mapArr = Map::displayElement($elements, $mapArr, $mapFile);

Map::writeFile($mapArr, $mapFile);

$action = Move::adventurerMoves($elements, $mapArr);
// echo "<br>test found :<br>";
// print_array($test);
Map::writeFile($action, $mapFile);

?>

