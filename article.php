<?php 
	include("incl/config.php"); 
	$pageId = "BMO-Artiklar";

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
	elseif($p == "kmom03_getform"){
		$title ="Tester kmom03: visa formulär";
		$file = "kmom03_getform.php";
	}
	else{
		$title = "Artiklar";
		$file = "default.php";
	}
?>	

<?php include("incl/header.php"); ?>
<div id="content">
	<div class="justify">
		<aside class="left" style="width:22%;">
			<?php include("$path/aside.php");?>
		</aside>
		<article class="right border" style="width:72%;">
			<?php include("$path/$file");?>
		</article>
	</div>
</div>
<?php include("incl/footer.php");