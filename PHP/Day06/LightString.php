<?php
class LightString{
	private $light_collection;
	private $lights_on;
	private $lights_off;
	
	public function __construct(){
		$this->light_collection = array();
		$this->lights_on = 0;
		$this->lights_off = 0;
		$this->build_lights();
	}
	
	private function build_lights(){
		for($i = 0; $i <= 999; $i++){
			$this->light_collection[$i] = new Light();
			$this->lights_off++;
		}
	}
	
	public function GetStatus(){
		$on = 0;
		$off = 0;
		foreach($this->light_collection as $light){
			if($light->GetState() == 1){
				$on++;
			}else{
				$off++;
			}
		}
		return array(
			'on' => $on,
			'off' => $off
		);
	}
	
	public function ChangeLight($x1, $x2 = -1, $state){
		$rng = -1;
		if($x2 != -1){
			$rng = $x2;
		}else{
			$rng = $x1;
		}
		for($i = $x1; $i < $rng + 1; $i++){
			switch($state){
				case 0:
					$this->light_collection[$i]->Off();
					$this->lights_off++;
					$this->lights_on--;
					break;
				case 1:
					$this->light_collection[$i]->On();
					$this->lights_on++;
					$this->lights_off--;
					break;
				case 2:
					if($this->light_collection[$i]->Toggle() == 1){
						$this->lights_on++;
						$this->lights_off--;
					}else{
						$this->lights_off++;
						$this->lights_on--;
					}
					
					break;
				default:
					$this->light_collection[$i]->Off();
					break;
			}
		}
	}
	
	public function ToggleLight($x1, $x2 = -1){
		$rng = -1;
		if($x2 != -1){
			$rng = $x2 + 1;
		}else{
			$rng = $x1 + 1;
		}
		
		for($i = $x1; $i < $rng; $i++){
			$this->light_collection[$i]->Toggle();
		}
	}
	
	public function LightOff($x1, $x2){
		$rng = -1;
		if($x2 != -1){
			$rng = $x2 + 1;
		}else{
			$rng = $x1 + 1;
		}
		for($i = $x1; $i < $rng; $i++){
			$this->light_collection[$i]->Toggle();
		}
	}
	
	public function LightOn($x1, $x2){
		
	}
}
?>