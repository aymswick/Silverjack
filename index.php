<?php

$deck = array();

	for ($i = 0; $i < 52; $i++) {
		$deck[] = $i;
	}
	shuffle($deck);
	
	$points = array(0 , 0 , 0 ,0);
	
function doAll()
{
	
	
	for($i=0; $i<4; $i++)
	{
		getPlayer($i);
		
		getHand($i);
		
	}
}
function getPlayer($i)
{
	
	
}


function getHand($player) {
	
	//print_r($deck);
 	global $deck;
	global $points;
	$amount = rand(4, 6);

	//echo $amount;

	for ($i = 0; $i < $amount; $i++) {

		$lastCard = array_pop($deck);

		$suitArray = array("clubs", "diamonds", "hearts", "spades");
		
		$number = (($lastCard % 13) + 1);
		$points[$player] += $number;
		echo "<img src= 'Silverjack/cards/" . $suitArray[floor($lastCard / 13)] . "/" . $number . ".png'/>";
		
		
	}
	echo $points[$player] ;
	echo "<br/> <br/>";

}
?>