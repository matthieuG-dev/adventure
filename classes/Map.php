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
        }
    }
    
    public static function createMap($caracter, $column, $line, $map) {
        for ($j = 0; $j < $column; $j++) {
            for ($k = 0; $k < $line; $k++) {
                $map[$j][$k] = $caracter;
            }
        }
        return $map;
    }

    public static function readMap($file) {
        $temp = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $i = 0;
        foreach($temp as $line){
            $temp[$i] = str_split(str_replace(' ', '', $line));
            $i++;
        } 
        return $temp;
    }


    public static function displayElement($arr, $temp, $mapFile) {
        foreach($arr as $object) {
            $type = $object->getType();
            $column = $object->getX();
            $line = $object->getY();
            $caracter = $object->getCaracter();

            switch($type) {
                case 'Mountain':
                    $temp[$column][$line] = $caracter;
                case 'Treasure':
                    $temp[$column][$line] = $caracter;
            }
        // }
        // $fp = fopen($mapFile, "w+");
        // for ($m = 0; $m < $line; $m++) {
        //     fwrite($fp, implode("       ", array_column($temp)));
            
        //     if ($m != $line - 1) {
        //         fwrite($fp, "\n\n");
        //     }
        }
        print_r($temp);
        //rééditer le fichier Map
    }
}   

?>
