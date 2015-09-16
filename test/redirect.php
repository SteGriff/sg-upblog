<?php

//Firstly, remove trailing slash, if any
$request = $_SERVER['SCRIPT_URI'];
$requestNoSlash = rtrim($request, '/');

if ($request !== $requestNoSlash)
{
	header('Location: ' . $requestNoSlash);
	die();
}

echo $request;

?>