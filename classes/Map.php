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
                if (substr($line, 0) != "#") {
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
        }
        fclose($handle);
        return $e;
    }

    public static function displayMap($arr ,$file) {
        foreach ($arr as $object) {
            $type = $object->getType();
            $temp = array();
            $column = $object->getX();
            $line = $object->getY();
            $symbol = $object->getSymbol();
            
            if ($type == "Plain") {                
                $temp = Map::createMap($symbol, $column, $line, $temp);
                
                $fp = fopen($file, "w+");
                for ($m = 0; $m < $line; $m++) {
                    fwrite($fp, implode("       ", array_column($temp, $m)));
                    
                    if ($m != $line - 1) {
                        fwrite($fp, "\n\n");
                    }
                }
            }
        }
    }

    public static function writeFile($arr, $file) {
        $fp = fopen($file, "w+");
        $count = 0;
        foreach($arr as $line) {
            fwrite($fp, implode('       ', $line));
            if ($count < count($arr) - 1)
                fwrite($fp, "\n\n");
            $count++;
        }
    }

    public static function createMap($symbol, $column, $line, $map) {
        for ($j = 0; $j < $column; $j++) {
            for ($k = 0; $k < $line; $k++) {
                $map[$j][$k] = $symbol;
            }
        }
        return $map;
    }

    public static function readMap($file) {
        $temp = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $i = 0;
        foreach($temp as $line){
            $temp[$i] = explode('       ', $line);
            $i++;
        } 
        return $temp;
    }

    public static function displayElement($arr, $temp, $file) {
        echo "<br>OBEJCTS ARRAY :<br>";
        foreach($arr as $object) {

            echo "<pre>";
            print_r($object);
            echo "</pre>";

            $type = $object->getType();
            $line = $object->getX();
            $column = $object->getY();
            $symbol = $object->getSymbol();
            switch($type) {
                case 'Mountain':
                    $temp[$column][$line ] = $symbol;
                    break;
                case 'Treasure':
                    $number = "(" . $object->getNumber() . ")";
                    $temp[$column][$line ] = $symbol . $number;
                    break;
                case 'Adventurer':
                    $name = "(" . $object->getName() . ")";
                    $temp[$line][$column ] = $symbol . $name;
                    break;
                case 'Orc':
                    $temp[$column][$line ] = $symbol;
                    break;
                case 'Goblin':
                    $temp[$column][$line ] = $symbol;
                    break;
            }
        }
        //Map::writeFile($temp, $file);

        return $temp;
    }
}
?>
