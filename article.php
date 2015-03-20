<?php 
	include("incl/config.php"); 
	$pageId = "BMO-Artiklar";
	
//Path to the SQLite database file
	$dbPath = dirname(__FILE__) . "/incl/article/data/bmo.sqlite";

//checking the url for a query string	
	$p=null;
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}

	//see if there is a page 
	$path = "incl/article";
	$file = null;
	
	if($p == "showArticle"){
		$title ="BMO-enskild artikel";
		$file = "showArticle.php";
	}
	elseif($p == "read-all"){
		$title ="BMO-alla artiklar";
		$file = "showAllArticle.php";
	}
	else{
		$title = "Artiklar";
		$file = "default.php";
	}
?>	

<?php include("incl/header.php"); ?>
<div id="content">
	<div class="justify">
		<aside class="left">
			<?php include("$path/aside.php");?>
		</aside>
		<article class="right border" style="width:85%;">
			<?php include("$path/$file");?>
		</article>
	</div>
</div>
<?php include("incl/footer.php");