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

//Get summaries of recent posts - choose type 'html' or 'json' and set optional limit (number)
function summaries($limit = null, $type = 'html')
{
	global $posts;
	$keys = array_keys($posts);
	rsort($keys);

	$summaries_text = '';
	$summaries_obj = [];
	
	$i = 0;
	foreach($keys as $k)
	{	
		$p = $posts[$k];
		$pubdt = DateTime::createFromFormat('U', $p['created']);
		$p['ymd'] = $pubdt->format('Y-m-d');
		$p['engdt'] = $pubdt->format('jS F Y');
		$datestring = DateTime::createFromFormat('U', $p['created'])->format('jS F Y');
		$p['summary'] = summary_of_file($p['file']);
		$summaries_text .= "
		<section>
			<h2><a href=\"{$p['link']}\">{$p['title']}</a></h2>
			<p>{$p['summary']}</p>
			<p class=\"f6 i\"><time datetime=\"{$p['ymd']}\">{$p['engdt']}</time></p>
		</section>";
		$summaries_obj[] = $p;
		
		if ($limit)
		{
			$i++;
			if ($i >= $limit)
			{
				break;
			}
		}
	}
	
	return $type === 'html' ? $summaries_text : $summaries_obj;
}
