<?php 

function readConf($file) {
    $handle = fopen($file, "r");
    if ($handle) {
        $k = 0;
        $i = 0;
        while ($line = fgets($handle, 100)) {
            $trimmedLine = trim($line, "\n");
            $trimmedLine = str_replace(' ', '', $trimmedLine);
            $e[$i] = explode("-", $trimmedLine);
            $i++;
        }
    }
    echo "read the configurations : SUCCESS<br>";
    return $e;

    if (!feof($handle)) {
        echo "Erreur: fgets() a échoué\n";
    }
    fclose($handle);
}
?>