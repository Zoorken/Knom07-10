<?php 
	include("incl/config.php"); 
	$pageId = "BMO-om";
	$title = "Om-BMO";
	
//Path to the SQLite database file
	$dbPath = dirname(__FILE__) . "/incl/article/data/bmo.sqlite";
?>

<?php include("incl/header.php"); ?>
<div id="content">
	<div class="justify">
		<article>
			<?php include("incl/article/aboutContent.php");?>
		</article>
	</div>
</div>
<?php include("incl/footer.php");