<!-- Nandar Moe -->
<?php

abstract class Vehicle {

	const DISTANCE = 350;

	public $name;
	public $speed;

	public function __construct($name, $speed) {
		$this->name  = $name;
		$this->speed = $speed;
	}

	abstract public function duration():string;

	public function calculateDuration(float $extraSpeed = 0.0):float {
		return (self::DISTANCE/$this->speed)+$extraSpeed;
	}

	public function __call($name, $args) {
		return 'Method '.$name.' doesn\'t exist!';
	}

}

class SportCar extends Vehicle {

	public function duration():string {

		return $this->name.': '.$this->calculateDuration();
	}

}

class Truck extends Vehicle {

	public function duration():string {

		return $this->name.': '.$this->calculateDuration();
	}
}

class Bike extends Vehicle {

	public function duration():string {

		return $this->name.': '.$this->calculateDuration();
	}

}

class Boat extends Vehicle {

	protected $extraSpeed = 0.25;

	public function duration():string {

		return $this->name.': '.$this->calculateDuration($this->extraSpeed);
	}

}

$vehicles = [
	['type' => 'sport-car', 'speed' => 150],
	['type' => 'truck', 'speed' => 60],
	['type' => 'bike', 'speed' => 100],
	['type' => 'boat', 'speed' => 50]
];

echo 'Duration of each vehicle to reach destination: <br /><br />';

foreach ($vehicles as $vehicle) {

	$vehicleType = str_replace(' ', '', ucwords(str_replace('-', ' ', $vehicle['type'])));

	$vehicle = new $vehicleType($vehicleType, $vehicle['speed']);

	echo $vehicle->duration().'<br /><br />';
}

?>
