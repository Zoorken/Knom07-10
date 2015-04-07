 <!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="style/FiddeStyle.css" title="Styling">
	<link rel="alternate stylesheet" href="style/debug.css" title="Debug style">
	<link rel="alternate stylesheet" href="style/style.css">
	<link rel="shortcut icon" href="img/ankh.ico">
	
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
		<div id="topMenu">
			<nav class="related">
				<a href="#"><span style="color:#114069">DBWEBB</span> <span style="color:#369449">PROJECT</span></a>
			</nav>
		</div>
	</header>
	<!-- Header -->
	<div class="containerWrapper">
		<header id="top">
			<div class="left">
				<img src="img/logo.png" alt="htmlphp logo" style="padding-right: 5px;">
			</div>
			<h1>BEGRAVNINGSMUSEUM ONLINE</h1>
		</header>

		<!-- Navigeringsmenu -->
		<nav class="navMenu">
			<a id="index-"     href="index.php">Hem</a>
			<a id="article-" href="article.php">Artiklar</a>
			<a id="object-" href="object.php">Objekt</a>
			<a id="about-" href="about.php">Om BMO</a>
		</nav>