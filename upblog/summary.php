<?php
use \Michelf\Markdown;

function summary_of_current()
{
	global $UPBLOG;
	return summary_of($UPBLOG);
}

function summary_of_file($filename)
{
	$content = file_get_contents($filename);
	return summary_of($content);
}

function summary_of($content){
	
	//Parse the md to html and select p tags
	$htmlContent = Markdown::defaultTransform($content);
	$doc = phpQuery::newDocument($htmlContent);
	$textContent = $doc['p'];
	
	//Tidy up the text a bit
	$textContent = trim(strip_tags($textContent));

	//Stop at the space closest to 200 chars (or whatever is configured) if we can afford to
	$whenToStop = @strpos($textContent, ' ', SUMMARY_LENGTH);
	if ($whenToStop !== false)
	{
		//A space after 200 chars was found
		$textContent = substr($textContent, 0, $whenToStop) . '...';
	}

	//If we didn't find an appropriate stopping point, the whole text is used as summary

	return $textContent;
}

function summaries($limit = null)
{
	global $posts;
	$keys = array_keys($posts);
	rsort($keys);

	$summaries_html = '';
	
	$i = 0;
	foreach($keys as $k)
	{	
		$p = $posts[$k];
		$pubdt = DateTime::createFromFormat('U', $p['created']);
		$ymd = $pubdt->format('Y-m-d');
		$eng = $pubdt->format('jS F Y');
		$datestring = DateTime::createFromFormat('U', $p['created'])->format('jS F Y');
		$summ = summary_of_file($p['file']);
		$summaries_html .= "
		<section>
			<h2><a href=\"{$p['link']}\">{$p['title']}</a></h2>
			<p>{$summ}</p>
			<p class=\"f6 i\"><time datetime=\"{$ymd}\">{$eng}</time></p>
		</section>";
		
		if ($limit)
		{
			$i++;
			if ($i >= $limit)
			{
				break;
			}
		}
	}
	
	return $summaries_html;
}
