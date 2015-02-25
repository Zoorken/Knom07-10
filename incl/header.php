 <!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="style/FiddeStyle.css" title="Styling">
	<link rel="alternate stylesheet" href="style/debug.css" title="Debug style">
	<link rel="alternate stylesheet" href="style/style.css">
	<link rel="shortcut icon" href="img/icon.png">
	
	<!--Each page can set $pageStyle to create a private stylesheet -->
	<?php if(isset($pageStyle)):?>
		<style type="text/css">
			<?php echo $pageStyle; ?>
		</style>
	<?php endif; ?>
	
</head>
	<body <?php if(isset($pageId)) echo " id='$pageId' "; ?>>
	<!--Above header -->
	<header id="above">
		<?php echo userLoginMenu(); ?>
		<nav class="related">
			<a href="../kmom01/me.php">kmom01</a>
			<a href="../kmom02/me.php">kmom02</a>
			kmom03
		</nav>
	</header>
	<!-- Header -->
	<header id="top">
		<div class="left">
			<img src="img/logo.png" alt="htmlphp logo" width=98 height=90 style="padding-right: 5px;">
		</div>
		<h1>Ducky Duckstar</h1>
	</header>
	
	<!-- Navigeringsmenu -->
	<nav class="navMenu">
		<a id="me-"     href="me.php">Me</a>
		<a id="report-" href="report.php">Redovisning</a>
		<a id="test-" href="test.php">Tester</a>
		<a id="source-" href="viewsource.php">Källkod</a>
	</nav>