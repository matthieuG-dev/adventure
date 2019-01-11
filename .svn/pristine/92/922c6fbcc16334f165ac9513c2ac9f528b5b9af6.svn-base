<?php
class Element
{
    private $_x;
    private $_y;
    private $_number;
    private $_symbol;
    private $_type;

    private function __construct($x=NULL, $y=NULL, $number=NULL, $symbol=NULL, $type=NULL) {
        $this->_x = $x;
        $this->_y = $y;
        $this->_number = $number;
        $this->_symbol = $symbol;
        $this->_type = $type;
    }

    public static function createElements($list) {
        $elements = [];
        foreach($list as $element) {
            switch($element[0]) {
                case 'C':
                    $elements[] = Element::init_plain($element);
                    break;
                case 'M':
                    $elements[] = Element::init_mountain($element);
                    break;
                case 'T':
                    $elements[] = Element::init_treasure($element);
                    break;
                case 'A':
                    $elements[] = Character::init_adventurer($element);
                    break;
                case 'O':
                    $elements[] = Monster::init_orc($element);
                    break;
                case 'G':
                    $elements[] = Monster::init_goblin($element);
                    break;
                default:
                    $elements[] = new Element();
            }
        }
        return $elements;
    }

    public static function init_plain($params) {
        return new Element($params[1], $params[2], NULL, ".", "Plain");
    }

    public static function init_mountain($params) {
        return new Element($params[2], $params[1] , NULL, $params[0], "Mountain");
    }

    public static function init_treasure($params) {
        return new Element($params[2], $params[1], $params[3], $params[0], "Treasure");
    }

    public static function sortArr($arr, $type) {
        $sortedArr = array();
        $i = 0;
        foreach($arr as $object) {
            if ($object->getType() == $type)
                $sortedArr[$i] = $object;
                $i++;
        }
        return $sortedArr;
    }

    //getters et setters pour définir $x (largeur tableau ou position element abscisse)
    //getter : permet d'accéder à $_x dans index.php
    public function getX() {
        return $this->_x;
    }
    public function getY() {
        return $this->_y;
    }
    public function getType() {
        return $this->_type;
    }
    public function getSymbol() {
        return $this->_symbol;
    }
    public function getNumber() {
        return $this->_number;
    }

    //setter: permet de modifier $_x dans index.php
    public function setX($x) {
        $this->_x = $x;
    }
}
?>
