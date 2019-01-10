<?php
class Move
{
    private static $start = array(
    "N" => "Move::moveUp",
    "E" => "Move::moveRight",
    "S" => "Move::moveDown",
    "O" => "Move::moveLeft",
    );

    public static function moveUp($arr, $x, $y, $symbol) {
        if ($x > 0)
            $arr[$x - 1][$y] = $symbol;
    }

    public static function moveDown($arr, $x, $y, $symbol) {
        if ($x < count($arr)) 
            $arr[$x + 1][$y] = $symbol;
    }

    public static function moveRight(&$arr, $x, $y, $symbol) {
        if ($y < count($arr[$x])){
            $next = $arr[$x][$y + 1];
            if ($next[0]=="A") return;
            $arr[$x][$y + 1] = $symbol;
            $arr[$x][$y] = ".";
        }
    }

    public static function moveLeft($arr, $x, $y, $symbol) {
        if ($y > 0) 
            $arr[$x][$y - 1] = $symbol;
    }

    public static function adventurerMoves($arrObject, $mapArr) {
        $adventurers = Element::sortArr($arrObject, "Adventurer");
        // $test = array();
        // $i = 0;
        foreach($adventurers as $item) {

            $sequence = $item->getMovement();
            $orientation = $item->getOrientation();
            $symbol = $item->getSymbol();
            $x = $item->getX();
            $y = $item->getY();
            
            $moves = str_split($sequence);
            print_r("move : " .implode(",", $moves) . " symbol : " . $symbol . " x : " .$x . " y : " . $y . "<br>");
            
            // if ($orientation == "E") {
                Move::$start[$orientation]($mapArr, $x, $y, $symbol."(".$item->getName().")");
            // }
        }
        return $mapArr;
    }
}
?>