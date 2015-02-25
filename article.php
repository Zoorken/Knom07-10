<?php 
	include("incl/config.php"); 
	$pageId = "test";

//checking the url for a query string	
	$p=null;
	if(isset($_GET["p"])){
		$p = $_GET["p"];
	}

	//see if there is a page 
	$path = "incl/test";
	$file = null;
	
	if($p == "kmom02_pageStyle"){
		$title = "Tester kmom02: Visa olika style med \$pageStyle";
		$file = "kmom02_pageStyle.php";
	}
	elseif($p == "kmom03_get"){
		$title = "Tester kmom03: visa \$_GET";
		$file = "kmom03_get.php";
	}
	elseif($p == "kmom03_getform"){
		$title ="Tester kmom03: visa formulär";
		$file = "kmom03_getform.php";
	}
	elseif($p == "kmom03_postform"){
		$title = "Tester kmom03: Post formulär";
		$file = "kmom03_postform.php";
	}
	elseif($p == "kmom03_validate"){
		$title = "Tester kmom03: text validering";
		$file = "kmom03_validate.php";
	}
	elseif($p == "kmom03_server"){
		$title = "Tester kmom03: Server";
		$file = "kmom03_server.php";
	}
	elseif($p =="kmom03_destroySession"){
		$title ="Tester kmom03: Förstör session";
		$file = "kmom03_destroySession.php";
	}
	elseif($p == "kmom03_changeSession"){
		$title ="Tester kmom03: Change session";
		$file = "kmom03_changeSession.php";
	}
	elseif($p == "kmom03_showSession"){
		$title ="Tester kmom03: Show session";
		$file = "kmom03_showSession.php";
	}
	else{
		$title = "Tester";
		$file = "default.php";
	}
?>	
	
<?php include("incl/header.php"); ?>
<div id="content">
	<aside class="left" style="width:22%;">
		<?php include("$path/aside.php");?>
	</aside>
	<article class="right border" style="width:72%;">
		<?php include ("$path/$file");?>
	</article>
</div>
<?php include("incl/footer.php");