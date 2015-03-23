<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors.

//
// Create a select/option list of the articles
$stmt = $db->prepare('SELECT * FROM Article WHERE category = "article";');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;
$i= 0;
//$select ="<select id='input1' name='article' onchange='form.submit();'>";
//$select .= "<option value='-1'>Välj Artikel</option>";

//checking the url for a query string	
//Just the page
$p=null;
if(isset($_GET["p"])){
	$p = $_GET["p"];
}
//The article name
$a=null;
if(isset($_GET["a"])){
	$a = $_GET["a"];
}
?>
	<!--Bör flyttas till sidobaren-->
	<fieldset>
		<ul>
		<?php foreach($res as $article): ?>
			<li><a href="<?php echo $currentArticle="?p=showArticle&a=" . $article['title']; ?>"><?php echo $article['title']; ?></a>
		<?php endforeach; ?>
		</ul>
	</fieldset>
	
	<!--Plockar fram artikeln som användaren valt -->
	<?php if(isset($a)){
		foreach($res as $article){
			if($a == $article['title']){
				$current = $article;
				//break;
			}
			$idArray[$i] = array($article['id']);
			$i++;
		}
	}
	?>
	
	<!--Presenterar valda artiklen -->
	<?php if(isset($current)): ?>

	<?php
	//Add objetc
	//
	//$stmt = $db->prepare('SELECT * FROM Object WHERE articleLink = "Begravningskonfekt";');
	$stmt = $db->prepare('SELECT * FROM Object WHERE articleLink = :parameter');
	$stmt->bindParam(':parameter', $a, PDO::PARAM_STR);
	$stmt->execute();
	$oRes = $stmt->fetchAll(PDO::FETCH_ASSOC);
	?>
	
	<fieldset>
		<p>
			<div style="background:#eee; border:1px solid #eee;padding:1em;overflow:auto;">
				<h1><?php echo $current['title']; ?></h1>
				<p class="by-author"><?php echo $current['author'] . ', publicerad ' . $current['pubdate']; ?></p>
				<p><?php echo $current['content']; ?></p>
				
				<p>
				<?php foreach($oRes as $images):?>
					<!--Change search route-->
					<!--Also makes image clickable for full size-->
					<?php
						$newPathImage['image'] = $images['image'];
						$resizeImage ="bmo/250";
						$newPathImage['image'] = str_replace("bmo", $resizeImage, $images['image']);
					?>
				<a href="<?php echo $images['image']?>"><img src="<?php echo $newPathImage['image']; ?>"></a>
				
				
				<?php endforeach; ?>
				</p>
				
				 <?php
					// $nextarticle = $current['id'] + 1;
					
					// for($i=0; i<count($idArray); $i++;){
						// if($nextarticle == $value){
							// echo $nextarticle;
						// }
					
					// }
					
					// foreach ($idArray as $value) {
						// if($nextarticle == $value){
							// echo $nextarticle;
						// }
						// else{
							// $nextarticle++;
						// }
					// }
					//echo $nextarticle = $current['id'] + 1;
					//print_r($idArray);
			
				// ?>
				
			</div>
		</p>
	</fieldset>
	
	<?php endif;?>