<?php 
	include("incl/config.php"); 
	$pageId = "object";
	
//Path to the SQLite database file
	$dbPath = dirname(__FILE__) . "/incl/article/data/bmo.sqlite";

//checking the url for a query string	
	$p=null;
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}

	//see if there is a page 
	$path = "incl/object";
	$file = null;
	
	if($p == "showObject"){
		$title ="BMO-enskilt object";
		$file = "showObject.php";
	}
	elseif($p == "showAllObject"){
		$title ="BMO-alla objekt";
		$file = "showAllObjects.php";
	}
	elseif($p == "showGallery"){
		$title = "BMO-Gallery";
		$file = "gallery.php";
	}
	elseif($p == "searchObj"){
		$title = "BMO-search";
		$file = "searchObject.php";
	}
	else{
		$title = "Objekt";
		$file = "default.php";
	}
?>	

<?php include("incl/header.php"); ?>
<div id="content">
	<div class="justify">
		<aside class="left">
			<?php include("$path/aside.php");?>
		</aside>
		<article class="rightContent" style="width:85%;">
			<?php include("$path/$file");?>
		</article>
	</div>
</div>
<?php include("incl/footer.php");