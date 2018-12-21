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
$map = 'map.txt';
// $conf = readConf($file);
$conf = Map::readConf($file);

//lecture du fichier de conf et création d'un tableau contenant tous les objets générés
$elements = Element::createElements($conf);

// $map = Map::readConf($map);

// print_array($map);

//display $elements pour voir ce qu'il contient (tableau d'objets)
// foreach($elements as $element) {
//     print_array($element);
// }
// die();

//FAUT IL TRIER LE TABLEAU ???
// usort($elements, function($a, $b){return $a->getType() < $b->getType();});

//écriture de la map de base
Map::displayMap($elements, "map.txt");



?>