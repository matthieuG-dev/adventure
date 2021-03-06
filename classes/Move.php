<?php
class Move
{
    private static $start = array(
    "N" => "Move::moveUp",
    "E" => "Move::moveRight",
    "S" => "Move::moveDown",
    "O" => "Move::moveLeft",
    );

    public static function moveRight(&$arr, $x, $y, $symbol) {
        if ($y < (count($arr[$x]) - 1)) {
            $next = $arr[$x][$y + 1];
            if ($next[0]=="A") return;
            $arr[$x][$y + 1] = $symbol;
            $arr[$x][$y] = ".";
        }
    }
    
    public static function moveLeft(&$arr, $x, $y, $symbol) {
        if ($y > 0) 
            $next = $arr[$x][$y - 1];
            if ($next[0]=="A") return;
            $arr[$x][$y - 1] = $symbol;
            $arr[$x][$y] = ".";
    }

    public static function moveDown(&$arr, $x, $y, $symbol) {
        if ($x > 0)
            $next = $arr[$x + 1][$y];
            if ($next[0]=="A") return;
            $arr[$x + 1][$y] = $symbol;
            $arr[$x][$y] = ".";
    }

    public static function moveUp(&$arr, $x, $y, $symbol) {
        if ($x < count($arr)) 
            $next = $arr[$x - 1][$y];
            if ($next[0]=="A") return;
            $arr[$x - 1][$y] = $symbol;
            $arr[$x][$y] = ".";
    }

    public static function foundNext($arrObjects, $item) {
        $y = $item->getY();
        $x = $item->getX();
        $orientation = $item->getOrientation();

        foreach($arrObjects as $obj) {
            $objX = $obj->getY();
            $objY = $obj->getX();

            switch($orientation) {
                case "s": 
                    if(($x > 0) && ($objX == $x + 1) && ($objY == $y))
                    return $obj;  
                break;
            }
        }
    }

    public static function adventurerMoves($items, $mapArr) {

        $adventurers = Element::sortArr($items, "Adventurer");

        foreach($adventurers as $item) {
            $sequence = $item->getMovement();
            $orientation = $item->getOrientation();
            $name = $item->getName();
            $symbol = $item->getSymbol();
            $x = $item->getX();
            $y = $item->getY();
            $moves = str_split($sequence);

            switch($orientation) {
                case 'E':
                    Move::$start[$orientation]($mapArr, $x, $y, $symbol . "(" . $name . ")");
                break;
                case 'O':
                    Move::$start[$orientation]($mapArr, $x, $y, $symbol . "(" . $name . ")");
                break;
                case 'N':
                    Move::$start[$orientation]($mapArr, $x, $y, $symbol . "(" . $name . ")");
                break;
                case 'S':
                    Move::$start[$orientation]($mapArr, $x, $y, $symbol . "(" . $name . ")");
                break;
            }
        }
        return $mapArr;
    }
}
?>