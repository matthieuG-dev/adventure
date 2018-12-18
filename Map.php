<?php
class Map
{
    public static function readConf($file) {
        $handle = fopen($file, "r");
        $e = [];
        if ($handle) {
            $k = 0;
            $i = 0;
            while ($line = fgets($handle, 100)) {
                $trimmedLine = trim($line, "\n");
                $trimmedLine = str_replace(' ', '', $trimmedLine);
                $elements = explode("-", $trimmedLine);
                $list = [];
                foreach($elements as $element) 
                    $list[] = trim($element);
                $e[$i] = $list;
                $e[$i][0] = substr($e[$i][0], 0, 1);
                $i++;
            }
        }
        fclose($handle);
        return $e;
    }

    //prends 2 params: le tableau d objets et le fichier de sortie dans lequel on vient écrire la map
    public static function writeMap($arr ,$mapFile) {
        foreach ($arr as $object) {
            
            $type = $object->getType();
            
            if ($type == "Plain") {
                //récupére x et y de l'objet qui a les conf de la map
                $temp = array();
                $columns = $object->getX();
                $lines = $object->getY();
                
                //$temp = tableau contenant les plaines "."
                //x colonnes et y lines
                
                for ($j = 0; $j < $columns; $j++) {
                    for ($k = 0; $k < $lines; $k++) {
                        $temp[$j][$k] = '.';
                    }
                }

                $fp = fopen($mapFile, "w+");
                for ($m = 0; $m < $lines; $m++) {
                    fwrite($fp, implode("       ", array_column($temp, $m)));
            
                    if ($m != $lines - 1) {
                        fwrite($fp, "\n\n");
                    }
                }
                fclose ($fp);
            }
        }
    }
}   



?>
