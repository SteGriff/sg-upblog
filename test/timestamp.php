<?php

function date_difference($postedTime)
{
	$posted = new DateTime("@$postedTime");
	
	$today_ts = strtotime('today');
	$today = new DateTime("@$today_ts");

	$difference = $today->diff($posted);

	if ($difference->days == 0)
	{
		return "Today";
	}
	elseif ($difference->days == 1)
	{
		return "Yesterday";
	}
	
	$ds = [];
	if ($difference->m > 0)
	{
		$ds[] = $difference->m . ' months';
	}
	if ($difference->d > 0)
	{
		$ds[] = $difference->d . ' days';
	}
	
	$dateString = implode(', ', $ds) . ' ago';
	return $dateString;
}

$ts = 1171502725;
$ts = filemtime('test.md');
$tsx = "@$ts";
$date = new DateTime($tsx);
echo $date->format('U = Y-m-d H:i:s') . "\n";

echo date_difference($ts);

?>
