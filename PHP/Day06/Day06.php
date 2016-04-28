<?php
ini_set('memory_limit','256M');
include_once("LightString.php");
include_once("Light.php");

$strings = array();
$instructions = trim(file_get_contents("instructions.txt"));
$instructions = explode("\n",$instructions);

for($i = 0; $i < 1000; $i++){
	$strings[$i] = new LightString();
}
	
foreach($instructions as $ins){
	$state = -1;
	if(preg_match('@^turn on@',$ins)){
		$state = 1;
	}elseif(preg_match('@^turn off@',$ins)){
		$state = 0;
	}elseif(preg_match('@^toggle@',$ins)){
		$state = 2;
	}
	preg_match('@(\d{1,3},\d{1,3}).+?(\d{1,3},\d{1,3})@',$ins,$m);
	$start = explode(",",$m[1]);
	$end = explode(",",$m[2]);
	
	//0 = x
	//1 = y
	
	//x = light
	//y = string
	
	for($s = $start[1]; $s <= $end[1]; $s++){
		$strings[$s]->ChangeLight($start[0],$end[0],$state);
	}
}
$on = 0;
for($i = 0; $i < 1000; $i++){
	$status = $strings[$i]->GetStatus();
	$on += $status['on'];
	$out = $i.":".$status['on'].":".$status['off']."\n";
	file_put_contents("out.txt",$out,FILE_APPEND);
}
echo $on."\n";
?>