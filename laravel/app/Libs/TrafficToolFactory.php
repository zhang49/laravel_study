<?php
namespace App\Libs;
interface Visit{
	public function go();
}
class TrafficToolFactory{
	public function createTrafficTool($name){
		switch($name){
			case 'Leg':
			return new Leg();
			case 'Car':
			return new Car();
			case 'Train':
			return new Train();
		}
	}
}
class Leg implements Visit{
	public function go(){
		return 'by Leg';
	}
}
class Car implements Visit{
	public function go(){
	return 'by Car';
	}
}
class Train implements Visit{
	public function go(){
		return 'by Train';
	}
}