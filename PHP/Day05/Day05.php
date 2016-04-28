<?php
/*
 *Jerry Thomas (jerry@canonails.net)
 *
*Part 1
*A nice string is one with all of the following properties:
*It contains at least three vowels (aeiou only), like aei, xazegov, or aeiouaeiouaeiou.
*It contains at least one letter that appears twice in a row, like xx, abcdde (dd), or aabbccdd (aa, bb, cc, or dd).
*It does not contain the strings ab, cd, pq, or xy, even if they are part of one of the other requirements.
*
*Answer: 238
*
*Part 2:
*Now, a nice string is one with all of the following properties:
*It contains a pair of any two letters that appears at least twice in the string without overlapping,
*like xyxy (xy) or aabcdefgaa (aa), but not like aaa (aa, but it overlaps).
*It contains at least one letter which repeats with exactly one letter between them, like xyx, abcdefeghi (efe), or even aaa.
*
*Answer: 69
*/
$strings = trim(file_get_contents("strings.txt"));
$strings = explode("\n",$strings);
$score = 0;
$good = 0;
foreach($strings as $str){
	$str = trim($str);
	if(preg_match_all('@(\w)\1{1,}@',$str,$m)){
		if(count($m[0]) > 0){
			$score++;
		}
	}
	if(preg_match_all('@([aeiou])@',$str,$m)){
		if(count($m[0]) >= 3){
	        $score++;
    	}
	}
	if(preg_match_all('@(ab|cd|pq|xy)@',$str,$m)){
		if(count($m) > 0){
			$score--;
		}
	}
	if($score >= 2){
		echo "* " . $str."\n";
		$good++;
	}else{
		//echo $score . " : " . $str."\n";
	}
	$score = 0;
}
echo "Part 1 Good: " . $good . "\n";

$good = 0;
foreach($strings as $str){
	if(preg_match_all('@(\w\w).*(\1)@',$str,$m)){
		if(count($m) > 0){
			if(preg_match_all('@(\w)\w{1}(\1)@',$str,$m)){
				$good++;
			}
		}
	}
}
echo "Part 2 Good: " . $good . "\n";
?>
