<?php

require 'upblog.php';

$limit = $_GET['limit'];
if (empty($limit) || !is_numeric($limit))
{
	$limit = null;
}

echo summaries($limit);

?>

