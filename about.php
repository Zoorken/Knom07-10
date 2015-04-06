<?php 
	include("incl/config.php"); 
	$pageId = "about";
	$title = "Om-BMO";
	
//Path to the SQLite database file
	$dbPath = dirname(__FILE__) . "/incl/article/data/bmo.sqlite";
?>

<?php include("incl/header.php"); ?>
<div id="content">
	<div class="justify">
		<article class="justifyBorder">
			<?php include("incl/article/aboutContent.php");?>
		</article>
	</div>
</div>
<?php include("incl/footer.php");