<?php

$deck = array();

	for ($i = 0; $i < 52; $i++) {
		$deck[] = $i;
	}
	shuffle($deck);
	
	$points = array(0 , 0 , 0 ,0);
	$people = array();// to store players
	$hands = array();// to store hands
	$winner = array("","","","");// to store string of who wins
	

function doAll()
{
	
	
	for($i=0; $i<4; $i++)//gets the four pictures and hands store in Hands array rather than echo
	{
		getPlayer($i); //get image from player and store in hands array
		
		getHand($i);	//gets the cards and stores them in hands array 	
	}
	findWinner();//goes through the hands and chooses a winner
	printGame();//prints all the hands including the winner


}
function getPlayer($i)
{
	//echo "<img src= 'Silverjack/faces"  . $i++ . ".png'/>" ;
	global $people;

	$people = "<img src= 'SilverJack/faces" . $i++ .".ping'/>";//get the image of player
}


function getHand($player) {
	
	//print_r($deck);
 	global $deck;
	global $points;
	global $hands;
	$amount = rand(4, 6);


	//echo $amount;

	for ($i = 0; $i < $amount; $i++) {

		$lastCard = array_pop($deck);//pops the last card to be used later

		$suitArray = array("clubs", "diamonds", "hearts", "spades");//to know what folder to go into
		
		$number = (($lastCard % 13) + 1);//chooses the number of the card
		$points[$player] += $number;
		//echo "<img src= 'Silverjack/cards/" . $suitArray[floor($lastCard / 13)] . "/" . $number . ".png'/>";
		$hands = "<img src= 'Silverjack/cards/" . $suitArray[floor($lastCard / 13)] . "/" . $number . ".png'/>";//adds to the aray
 
		
	}
	$hands = "0";//to know when a new hand starts	
	//echo $points[$player] ; will print later
	//echo "<br/> <br/>";

}

function getWinner()
{
	global $points;
	global $hands;
	global $winner;

	$temp = "";
	$nameArray = array("Joe", "Jane", "Bob", "Tim");//change names to appropiate
	$max = 0;//start with 0

	for(int $i=0; $i<4; $i++)
	{
		if($points[i]<42 && $points[i]>max)//gets the highest winning hand;
		{
		 	$max = $i;
		}
		
	}
	if($max!=0)//if theres a winner store name of winner in appropiate index
{

 	$temp.= nameArray[$max] . "wins";
	$winner[$max] = $temp;
}
else
{
$temp.= "No winner";
$winner[3]= $temp;
}


}

function drawGame()
{
	global $points;
	global $hands;
	global $winner;
	global $people;

	int $k=0;
	for(int $i=0; $i<4; $i++)//prints the person, hands up to the zero, winner quote 
{
	echo $people[i];
	while($hands[$k]!=0)
{
	echo $hands[$k];//prints the hand for that person
	$k++;
}
	echo $winner[$i];
}
}
?>
