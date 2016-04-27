<?php

/*
 *Jerry Thomas (jerry@canonails.net)
 *
 *Part 1:
 *Santa needs help mining some AdventCoins (very similar to bitcoins) to use as gifts for
 *all the economically forward-thinking little girls and boys. To do this, he needs to find
 *MD5 hashes which, in hexadecimal, start with at least five zeroes. The input to the MD5 hash
 *is some secret key (your puzzle input, given below) followed by a number in decimal. To mine
 *AdventCoins, you must find Santa the lowest positive number (no leading zeroes: 1, 2, 3, ...)
 *that produces such a hash.
 *
 *Answer: 346386
 *
 *Part 2:
 *Looking for six 0's
 *
 *Answer: 9958218
*/
$looking = true;
$x = 1;
$key = "iwrupvqb";

while($looking){
	if($x % 10000 == 0){
		echo $x."\n";
	}
	$md5 = md5($key . $x);
	//if(preg_match('@^0{5,5}@',$md5)){		--From Part 1
	if(preg_match('@^0{6,6}@',$md5)){
		echo $x."\n";
		$looking = false;
	}
	$x++;
}


?>