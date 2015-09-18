<?php

$deck = array();

for ($i = 0; $i < 52; $i++) {
	$deck[] = $i;
}
shuffle($deck);

$points = array(0, 0, 0, 0);
$people = array();
// to store players
$hands = array();
// to store hands
$winner = array("", "", "", "");
// to store string of who wins

function doAll() {

	for ($i = 0; $i < 4; $i++)//gets the four pictures and hands store in Hands array rather than echo
	{
		getPlayer($i);
		//get image from player and store in hands array

		getHand($i);
		//gets the cards and stores them in hands array
	}
	getWinner();
	//goes through the hands and chooses a winner
	drawGame();
	//prints all the hands including the winner

}

function getPlayer($pic) {
	global $people;

	//echo "<img src= 'Silverjack/faces/" . $pic . ".png'/>" ;

	$temp = "<img src= 'Silverjack/faces/" . $pic . ".png'/>";
	//stores image of person to print later
	array_push($people, $temp);

}

function getHand($player) {

	//print_r($deck);
	global $deck;
	global $points;
	global $hands;
	$amount = rand(4, 6);

	//echo $amount;

	for ($i = 0; $i < $amount; $i++) {

		$lastCard = array_pop($deck);
		//pops the last card to be used later

		$suitArray = array("clubs", "diamonds", "hearts", "spades");
		//to know what folder to go into

		$number = (($lastCard % 13) + 1);
		//chooses the number of the card
		$points[$player] += $number;
		//echo "<img src= 'Silverjack/cards/" . $suitArray[floor($lastCard / 13)] . "/" . $number . ".png'/>";

		$temp = "<img src= 'Silverjack/cards/" . $suitArray[floor($lastCard / 13)] . "/" . $number . ".png'/>";
		array_push($hands, $temp);
		//adds to the array

	}
	array_push($hands, "0");
	//to know when a new hand starts

	//echo $points[$player];
	//will print later

}

function getWinner() {
	global $points;
	global $hands;
	global $winner;

	$temp = "";
	$nameArray = array("Joe", "Jane", "Bob", "Tim");
	//change names to appropiate
	$max = 0;
	//start with 0
	$index = 0;
	for ($i = 0; $i < 4; $i++) {
		if ($points[$i] <= 42 && $points[$i] > $max)//gets the highest winning hand;
		{
			$max = $points[$i];
			$index = $i;
		}

	}
	if ($max != 0)//if theres a winner store name of winner in appropiate index
	{

		$temp .= $nameArray[$index] . " Wins!!!";
		$winner[$index] = $temp;
	} else {
		$temp .= "No winner";
		$winner[3] = $temp;
	}

}

function drawGame() {
	global $points;
	global $hands;
	global $winner;
	global $people;

	$k = 0;
	echo "<table border = 1>";
	echo "<tr>";
	echo "<td>";
	echo "People";
	echo "</td>";
	for ($i = 0; $i < 6; $i++) {

		echo "<td>";
		$temp = "Cards " . ($i+1);
		echo $temp;
		echo "</td>";

	}
	echo "<td>";
	echo "Points";
	echo "</td>";
	echo "<td>";
	echo "winner?";
	echo "</td>";
	echo "</tr>";
	for ($i = 0; $i < 4; $i++)//prints the person, hands up to the zero, winner quote
	{
		echo "<tr>";

		echo "<td>";
		//echo "People";
		echo $people[$i];
		echo "</td>";

		for ($j = 0; $j < 6; $j++) {//populates 6 columns with cards or blank space

			while ($hands[$k] != "0") {
				echo "<td>";
				echo $hands[$k];
				echo "</td>";
				//prints the hand for that person
				$k++;
				$j++;

			}
			if($j < 6)
			{
				echo "<td>";
		
				echo "</td>";
			}

			

		}

		$k++;
		echo "<td>";
		echo $points[$i];
		echo "</td>";
		echo "<td>";
		echo $winner[$i];
		echo "</td>";
		echo "</tr>";

	}
	echo "</table>";

}
?>

