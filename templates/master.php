<?php
require_once 'bits/boilerplate.php';
?>
</head>
<body>

	<?php
	require_once 'bits/header.php';
	?>
	
	<?php
	require_once 'bits/pager.php';
	?>
	
	<?
		$pubtime = metadata($FILENAME)['created'];
		$pubdt = DateTime::createFromFormat('U', $pubtime);
		$ymd = $pubdt->format('Y-m-d');
		$eng = $pubdt->format('jS F Y');
	?>
	
	<article>
		<p class="f5 i">
			<time pubdate datetime="<?=$ymd?>"><?=$eng?></time>
		</p>
		<?=$UPBLOG?>
	</article>
	
	<?php
	require_once 'bits/footer.php';
	?>
</body>
</html>