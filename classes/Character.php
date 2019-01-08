<?php 
class Character
{
    private $_type;
    private $_symbol;
    private $_name;
    private $_x;
    private $_y;
    private $_orientation;
    private $_movement;

    private function __construct($type=NULL, $symbol=NULL, $name=NULL, $x=NULL, $y=NULL, $orientation=NULL, $movement=NULL) {
        $this->_type = $type;
        $this->_symbol = $symbol;
        $this->_name = $name;
        $this->_x = $x;
        $this->_y = $y;
        $this->_orientation = $orientation;
        $this->_movement = $movement;
    }

    public static function init_adventurer($params) {
        return new Character("Adventurer", $params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);
    }

    public function getType() {
        return $this->_type;
    }
    public function getName() {
        return $this->_name;
    }
    public function getSymbol() {
        return $this->_symbol;
    }
    public function getX() {
        return $this->_x;
    }
    public function getY() {
        return $this->_y;
    }
    public function getOrientation() {
        return $this->_orientation;
    }
    public function getMovement() {
        return $this->_movement;
    }
}
?>