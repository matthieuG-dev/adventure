<?php
class Element
{
    private $_x;
    private $_y;
    private $_number;
    private $_caracter;
    private $_type;

    private function __construct($x=NULL, $y=NULL, $number=NULL, 
            $caracter=NULL, $type=NULL) {
        $this->_x = $x;
        $this->_y = $y;
        $this->_number = $number;
        $this->_caracter = $caracter;
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
        return new Element($params[1], $params[2], NULL, $params[0], "Mountain");
    }

    public static function init_treasure($params) {
        return new Element($params[1], $params[2], $params[3], $params[0], "Treasure");
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
    public function getCaracter() {
        return $this->_caracter;
    }

    //setter: permet de modifier $_x dans index.php
    public function setX($x) {
        $this->_x = $x;
    }
}
?>
 
