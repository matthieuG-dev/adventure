<?php
$file = $argv[1];
$mapFile = $argv[2];

//définir la fonction pour créer la map
function createMap($file, $mapFile) {
    $fp = fopen ($file, "r");
        //stocker le contenu d'un fichier caractère par 
        //caractère dans un tableau et display le tableau;
    $i = 1;
    while (!feof($fp)) {
        $element = fgetc ($fp);
        if ($element != " " && $element != "-") {
            $array[$i] = $element;
            $i++;
        }
    }
    fclose ($fp);

    //récupère le nombre de colones et le nombre de lignes que comportera notre map
    //pour pouvoir construire un tableau multidimentionnel qui représente la map 
    $col = $array[2];
    $line = $array[3];

    //assigner a chaque case de tableau multidimentionnel le caractère " . ";
    $map = array();
    for ($j = 0; $j < $col; $j++) {
        for ($k = 0; $k < $line; $k++) {
            $map[$j][$k] = '.';
        }
    }   

    //écrire dans le fichier chaque valeurs de notre tableau multi
    $fp = fopen("map.txt", "w+");
    for ($m = 0; $m < $line; $m++) {
        fwrite($fp, implode("       ", array_column($map, $m)));
        fwrite($fp, "\n\n");
    }
    fclose ($fp);
    echo "SUCCESS : votre map est générée dans le fichier de sortie";
}
?>