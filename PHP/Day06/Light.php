<?php
class Light{
	private $state;
	
	public function __construct(){
		$this->state = 0;
	}
	
	public function GetState(){
		return $this->state;
	}
	
	public function Toggle(){
		if($this->state == 0){
			$this->state = 1;
		}else{
			$this->state = 0;
		}
		return $this->state;
	}
	
	public function Off(){
		$this->state = 0;
	}
	
	public function On(){
		$this->state = 1;
	}
}
?>