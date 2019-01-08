<?php 
class Monster
{
    private $_type;
    private $_symbol;
    private $_x;
    private $_y;
    private $_axis;
    private $_level;
    private $_steps;

    private function __construct($type=NULL, $symbol=NULL, $y=NULL, $x=NULL, $axis=NULL, $level=NULL, $steps=NULL) {
        $this->_type = $type;
        $this->_symbol = $symbol;
        $this->_x = $x;
        $this->_y = $y;
        $this->_axis = $axis;
        $this->_level = $level;
        $this->_steps = $steps;
    }

    public static function init_orc($params) {
        return new Monster("Orc", $params[0], $params[1], $params[2], "vertical", $params[3], $params[4]);
    }

    public static function init_goblin($params) {
        return new Monster("Goblin", $params[0], $params[1], $params[2], "horizontal", $params[3], $params[4]);
    }

    public function getType() {
        return $this->_type;
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
    public function getAxis() {
        return $this->_axis;
    }
    public function getLevel() {
        return $this->_level;
    }
    public function getSets() {
        return $this->_steps;
    }
}
?>