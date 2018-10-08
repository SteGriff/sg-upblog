<?php

require 'upblog.php';

$limit = $_GET['limit'];
if (empty($limit) || !is_numeric($limit))
{
	$limit = null;
}

echo json_encode(summaries($limit, 'json'));

?>

