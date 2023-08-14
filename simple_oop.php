<?php

// Base class Ship
class Ship {
    protected $name;
    protected $type;

    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
    }

    public function getInfo() {
        return "Ship Name: {$this->name}\nType: {$this->type}\n";
    }
}

// MotorBoat class
class MotorBoat extends Ship {
    private $engineType;

    public function __construct($name, $engineType) {
        parent::__construct($name, "Motor Boat");
        $this->engineType = $engineType;
    }

    public function getInfo() {
        return parent::getInfo() . "Engine Type: {$this->engineType}\n";
    }
}

// SailBoat class
class SailBoat extends Ship {
    private $sailCount;

    public function __construct($name, $sailCount) {
        parent::__construct($name, "Sail Boat");
        $this->sailCount = $sailCount;
    }

    public function getInfo() {
        return parent::getInfo() . "Sail Count: {$this->sailCount}\n";
    }
}

// Yacht class
class Yacht extends Ship {
    private $luxuryLevel;

    public function __construct($name, $luxuryLevel) {
        parent::__construct($name, "Yacht");
        $this->luxuryLevel = $luxuryLevel;
    }

    public function getInfo() {
        return parent::getInfo() . "Luxury Level: {$this->luxuryLevel}\n";
    }
}


$ship1 = new MotorBoat("Speedy", "Diesel");
$ship2 = new SailBoat("Sailor", 3);
$ship3 = new Yacht("Luxuria", "High");

$ships = [$ship1, $ship2, $ship3];

foreach ($ships as $ship) {
    echo $ship->getInfo() . "\n";
}

?>
