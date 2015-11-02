<!DOCTYPE HTML>
<html>
<head>
<title><?=$TITLE?> - SteGriff</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?=twitter_card()?>

<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" type="text/css" href="/sgn_style.css" />
<link rel="stylesheet" type="text/css" href="/upblog/sgn_blog.css" />
<link rel="stylesheet" href="/keen.css">
<style type="text/css">

	#metrics
	{
		height: 150px;
		border: 1px solid transparent;
	}
	
	#TotalActivations
	{
		background: #49c5b1;
	}
	
	#UniqueActivators
	{
		background: #F84346;
	}
	
	#UniqueExporters
	{
		background: #CE61CF;
	}
	
	#TotalExports
	{
		background: #49c5b1;
	}

</style>
</head>
<body>

	<header class="beige">
		<h1><a href="/">SteGriff</a></h1>
		<h2><a href="/upblog">Blog</a></h2>
		<nav class="olive">
			<ul>
				<?=nav(6)?>
			</ul>
		</nav>
	</header>
		
	<div class="pager">
		<p class="wispy pager-info">Next & Previous</p>
		<ul>
			<li class="pager-link"><?=link_newer('None')?> <small>(newer)</small></li>
			<li class="pager-link"><?=link_older('None')?> <small>(older)</small></li>
		</ul>
	</div>
	
	<article>
		<?=$UPBLOG?>
	</article>
	
	<footer>
		<p><time>2014</time> SteGriff - Stephen Griffiths</p>
	</footer>
	
	<script type="text/javascript">
	document.getElementsByTagName("time")[0].innerHTML = new Date().getFullYear();
	</script>
	
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="/svc/keen/emoji-keen.js"></script>

</body>
</html>