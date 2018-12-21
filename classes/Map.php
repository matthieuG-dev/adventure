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

    public static function displayMap($arr ,$mapFile) {
        foreach ($arr as $object) {
            
            $type = $object->getType();
            $temp = array();
            $column = $object->getX();
            $line = $object->getY();
            $caracter = $object->getCaracter();
            
            if ($type == "Plain") {                
                $temp = Map::createMap($caracter, $column, $line, $temp);
                
                $fp = fopen($mapFile, "w+");
                for ($m = 0; $m < $line; $m++) {
                    fwrite($fp, implode("       ", array_column($temp, $m)));
                    
                    if ($m != $line - 1) {
                        fwrite($fp, "\n\n");
                    }
                }
            }

            // if ($type == "Mountain") {
            //     echo  $column . " " .  $line . " " . $caracter . " " . $type . "<br>";
            //     Map::displayElement($caracter, $column, $line, $temp);
            //     $fp = fopen($mapFile, "w+");
            //     for ($m = 0; $m < $line; $m++) {
            //         fwrite($fp, implode("       ", array_column($temp, $m)));
                    
            //         if ($m != $line - 1) {
            //             fwrite($fp, "\n\n");
            //         }
            //     }
            //     fclose ($fp);
            // }
        }
    }

    public static function createMap($caracter, $columns, $line, $temp) {
        for ($j = 0; $j < $columns; $j++) {
            for ($k = 0; $k < $line; $k++) {
                $temp[$j][$k] = $caracter;
            }
        }
        return $temp;
    }
    public static function displayElement($caracter, $line, $column, $temp) {
        $temp[$line][$column] = $caracter;
    }
    public static function writeMap() {

    }
}   

?>
