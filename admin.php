<?php include("incl/config.php");
	$pageId ="admin";

//Path to the SQLite database file
	$dbPath = dirname(__FILE__) . "/incl/article/data/bmo.sqlite";

//checking the url for a query string	
	$p=null;
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}	
	
if(userIsAuthenticated()){
	$path = "incl/admin";
	$file = null;
	
	if($p == "update"){
		$title ="BMO-update artikel";
		$file = "update.php";
	}
	elseif($p == "create"){
		$title ="BMO-lägg till artikel";
		$file = "createArticle.php";
	}
	elseif($p == "delete"){
		$title = "BMO-radera artikel";
		$file = "deleteArticle.php";
	}
	elseif($p == "updateObj"){
		$title = "BMO-upptatera Objekt";
		$file = "updateObj.php";
	}
	elseif($p == "createObj"){
		$title = "BMO-skapa Objekt";
		$file = "createObj.php";
	}
	elseif($p == "removeObj"){
		$title = "BMO-radera Objekt";
		$file = "removeObj.php";
	}
	elseif($p == "uploadObj"){
		$title = "BMO-upload Objekt";
		$file = "uploadObj.php";
	}
	elseif($p == "frontArticle"){
		$title = "BMO-Framsida";
		$file = "frontArticle.php";
	
	}
	
	else{
		$title = "Artiklar";
		$file = "default.php";
	}
}
?>
<?php include("incl/header.php"); ?>
<div id="content">
	<div class="justify">
		<?php if(userIsAuthenticated()):?>
				<aside class="left">
					<?php include("$path/aside.php");?>
				</aside>
				<article class="rightContent" style="width:85%;">
					<?php include("$path/$file");?>
				</article>
		<?php endif;?>
		
		<?php if(!userIsAuthenticated()):?>
			<article>
			<p>"Ser ut som att du är utloggad"</p>
			<a href="login.php?p=login">login</a>
			</article>
		<?php endif;?>
	</div>
</div>



