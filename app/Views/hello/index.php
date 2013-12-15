<?php HTML::doc(); ?>
<html>
<head>
	<title><?=$title; ?></title>
</head>
<body>
	
	<h3>Assalamu'alaikum warahmatullahi wabarokatuh</h3>
	This is free open source micro framework <br />
	<?php
	echo $content;
	HTML::br();
	HTML::anchor('Click Here',"https://github.com/blob1/Froggy-MicroMVC");

	?>
</body>
</html>