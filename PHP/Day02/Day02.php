<?php
/*
 *Jerry Thomas (jerry@canonails.net)
 *
 *Advent Of Code Day 02:
 *Elf Wrapping Paper.
 *Find the surface area of the box The elves also need a little extra
 *paper for each present: the area of the smallest side.
 *All numbers in the elves' list are in feet. How many total square feet
 *of wrapping paper should they order?
 *
 *2LW + 2WH + 2HL = SA
 *
 *Answer: 1598415
 *
 *Part 2:
 *he ribbon required to wrap a present is the shortest distance around its
 *sides, or the smallest perimeter of any one face. Each present also requires
 *a bow made out of ribbon as well; the feet of ribbon required for the perfect
 *bow is equal to the cubic feet of volume of the present.
 *
 *Answer: 3812909
*/

function get_area($l,$w,$h){
	$dims = array();
	$dims['lw'] = $l * $w;
	$dims['wh'] = $w * $h;
	$dims['hl'] = $h * $l;
	asort($dims);
	$sa = current($dims);
	foreach($dims as $k => $v){
		$sa += 2 * $v;
	}
	return $sa;
}

function ribbon_length($dims){
	asort($dims);
	$dims = array_values($dims);
	$ribbon = ($dims[0] * 2) + ($dims[1] * 2);
	$ribbon += $dims[0] * $dims[1] * $dims[2];
	return $ribbon;
}

function get_presents(){
	$file = file("presents.txt");
	$presents = array();
	foreach($file as $line){
		$presents[] = explode("x",strtolower(trim($line)));
	}
	return $presents;
}


$presents = get_presents();
$area = 0;
$ribbon = 0;
foreach($presents as $dim){
	$area += get_area($dim[0],$dim[1],$dim[2]);
	$ribbon += ribbon_length($dim);
}


echo "Total Square Feet Of Paper Needed: ".$area."\n";
echo "Total Feet Of Ribbon Needed: ".$ribbon."\n";
?>