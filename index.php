<?php

//lire le contenu d'un fichier caractère par caractère: <br/><br/>";
// $fp = fopen ("test.txt", "r");
// $i = 1;
// while (!feof($fp)) {
//     echo "ligne " . $i . " : " . fgetc ($fp) . "<br/>";
//     $i++;
// }
// fclose ($fp);
// echo "<br/><br/>";

//stocker le contenu d'un fichier caractère par caractère dans un tableau et display le tableau : <br/><br/>";
// function createMap() {
    $fp = fopen ("test.txt", "r");
    $i = 1;
    while (!feof($fp)) {
        $element = fgetc ($fp);
        if ($element != " " && $element != "-") {
            $array[$i] = $element;
            echo "element " . $i . " : " . $element . "<br/>";
            $i++;
        }
    }
    echo "<br/><br/>";

    //vérifier le contenu du tableau créé
    echo "<br/>" . var_dump($array);
    fclose ($fp);

    echo "<br/><br/>";
    //creer un tableau avec la longueur récupérée dans le fichier d entrée

    $lenght = $array[2];
    echo "lenght : " . $lenght . "<br/>";

    $j = 0;
    $newArray = array();

    echo "newArray :<br/>";

    // while ($j < $lenght * 2) {
    //     $newArray[$j] = ".";
    //     echo $newArray[$j];
    //     $j++;
    //     $newArray[$j] = " ";
    //     echo $newArray[$j];
    //     $j++;
    // }
    foreach ($newArray as $el) {
        $str = $el;
    }
    echo "test : " . $str;
    $k = 0;
    echo "map : <br/>";
    echo "<pre>";

    while ($newArray[$k]) {
        echo $newArray[$k];
        $k++;
    }
// }
// echo "step 3 :<br/>";
echo json_encode($newArray);

$fichier = fopen('map.txt', 'w+');
fwrite($fichier, $newArray);

// createMap();    
?>