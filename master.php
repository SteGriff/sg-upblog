<!DOCTYPE HTML>
<html>
<head>
<title>Upblog - <?=$TITLE?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/sgn_style.css" />
<link rel="stylesheet" type="text/css" href="sgn_blog.css" />
</head>
<body>

	<header class="beige">
		<h1><a href="/">SteGriff</a></h1>
		<nav class="olive">
			<ul>
				<?=nav()?>
			</ul>
		</nav>
	</header>
	
	<article>
		<?=$UPBLOG?>
	</article>
	
	<footer>
		<p><time>2014</time> SteGriff - Stephen Griffiths</p>
	</footer>
	
	<script type="text/javascript">
	document.getElementsByTagName("time")[0].innerHTML = new Date().getFullYear();
	</script>
</body>
</html>