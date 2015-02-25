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
	</header>
	<!-- Header -->
	<div class="containerWrapper">
		<header id="top">
			<div class="left">
				<img src="img/logo.png" alt="htmlphp logo" width=98 height=90 style="padding-right: 5px;">
			</div>
			<h1>Ducky Duckstar</h1>
		</header>
		
		<!-- Navigeringsmenu -->
		<nav class="navMenu">
			<a id="index-"     href="index.php">Hem</a>
			<a id="article-" href="article.php">Artiklar</a>
			<a id="object-" href="#">Objekt</a>
			<a id="about-" href="about.php">Om BMO</a>
			<a id="source-" href="viewsource.php">Källkod</a>
		</nav>