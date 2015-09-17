<?php

 function getHand()
 {
 		$deck = array();

	for ($i = 0; $i < 52; $i++) {
		$deck[] = $i;
	}
	shuffle($deck);
	//print_r($deck);

	$amount = rand(4, 6);

	//echo $amount;
	
	for ($i = 0; $i < $amount; $i++) {

		$lastCard = array_pop($deck);

		$suitArray = array("clubs", "diamonds", "hearts", "spades");

		echo "<img src= 'Silverjack/cards/" . $suitArray[floor($lastCard / 13)] . "/" . (($lastCard % 13) + 1) . ".png'/>";
 }


	

}
?>