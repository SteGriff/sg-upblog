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
	
	<article>
		<?=$UPBLOG?>
	</article>
	
	<article class="summaries">
		<p>Loading posts, just a moment...</p>
	</article>
	
	<footer>
		<p><time class="year">2014</time> SteGriff - Stephen Griffiths</p>
	</footer>
	
	<script src="http://code.jquery.com/jquery-2.2.0.min.js"></script>
	<script>
		$(function(){
			$(".year").text(new Date().getFullYear());
			$(".summaries").load("summaries.php");
		});
	</script>
</body>
</html>