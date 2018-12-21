<?php 
public static function writeMap() {
    $fp = fopen('map.txt', "w+");
            for ($m = 0; $m < $lines; $m++) {
                fwrite($fp, implode("       ", array_column($temp, $m)));
                
                if ($m != $lines - 1) {
                    fwrite($fp, "\n\n");
                }
            }
            fclose ($fp);
}

Map::writeMap($mapFile, $lines, $temp);
?>