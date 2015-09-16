<?php
use \Michelf\Markdown;

require 'upblog.php';

function title_of_x($filename){
	
	$content = file_get_contents($filename);
	$content_md = Markdown::defaultTransform($content);
	$content_doc = phpQuery::newDocument($content_md);

	$title = $content_doc['h1']->getString()[0];
	return $title;
}

header("content-type: text/plain");

$t = title_of_x('./test.md');
echo $t;

?>