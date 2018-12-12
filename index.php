<?php
include 'readConf.php';

//lectrure du le fichier de conf (conf.txt) et stockage
// de chaque ligne dans un tableau multidimensionnel
$file = 'conf.txt';
$conf = readConf($file);

//affichage du tableau multi (entouré des balise 
//<pre></pre> pour une meilleure lecture)
echo "<pre>";
print_r($conf);
echo "</pre>";

?>