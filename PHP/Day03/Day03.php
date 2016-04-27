<?php
/*
 *Jerry Thomas (jerry@canonails.net)
 *
 *Santa is delivering presents to an infinite two-dimensional grid of houses.
 *He begins by delivering a present to the house at his starting location, and
 *then an elf at the North Pole calls him via radio and tells him where to move next.
 *Moves are always exactly one house to the north (^), south (v), east (>), or west (<). After each move,
 *he delivers another present to the house at his new location.
 *However, the elf back at the north pole has had a little too much eggnog,
 *and so his directions are a little off, and Santa ends up visiting some houses more than once.
 *How many houses receive at least one present?
 *
 *Answer: 2565
 *
 *Part 2:
 *The next year, to speed up the process, Santa creates a robot version of himself, Robo-Santa, to deliver
 *presents with him. Santa and Robo-Santa start at the same location (delivering two presents to the same starting house),
 *then take turns moving based on instructions from the elf, who is eggnoggedly reading from the same script as the previous year.
 *This year, how many houses receive at least one present?
 *
 *Answer: 2639
 *
 *Notes: This is ugly. I know that. I wrote about 90% of it in a 300x300 terminal screen. Why? None of your business.
*/

$input = trim(file_get_contents("directions.txt"));
$ps = array(
    'x' => 0,
    'y' => 0
);
$sp = array(
    'x' => 0,
    'y' => 0
);
$rp = array(
    'x' => 0,
    'y' => 0
);

$h = array(
    '0,0' => 1
);
$h2 = array(
    '0,0' => 2
);
$m = 0;
$p = 1;

//0 = s
//1 = r

for($i = 0; $i < strlen($input); $i++){
    $char = substr($input,$i,1);
	$w = "sp";
	if($i % 2 != 0){
		$w = "rp";
	}
    switch($char){
        case "^":
			$ps['y']++;
			${$w}['y']++;
			break;
        case "v":
            $ps['y']--;
			${$w}['y']--;
            break;
        case "<":
            $ps['x']--;
			${$w}['x']--;
            break;
        case ">":
            $ps['x']++;
			${$w}['x']++;
            break;
    }
    $cps = $ps['x'] .",".$ps['y'];
	$cps2 = ${$w}['x'] .",".${$w}['y'];
    if(!isset($h[$cps])){
		$h[$cps] = 0;
    }
	if(!isset($h2[$cps2])){
		$h2[$cps2] = 0;
    }
    $h[$cps]++;
	$h2[$cps2]++;
    $m++;
    $p++;
}
echo "M: " . $m."\n";
echo "P: ". $p."\n";
echo "H: ". count($h)."\n";
echo "H2: ". count($h2)."\n";
?>
