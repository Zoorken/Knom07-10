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
	<!--Listar artiklarna-->
	<?php if($a==null):?>
		<h2>Artiklar</h2>
		<p>Välkommen till min artikelsida. Här nedan kan du välja en artikel att läsa.</p>
		<ul>
		<?php foreach($res as $article): ?>
			<li><a href="<?php echo $currentArticle="?p=showArticle&a=" . $article['title']; ?>"><?php echo $article['title']; ?></a>
		<?php endforeach; ?>
		</ul>
	<?php endif;?>
	

	<!--Plockar fram artikeln som användaren valt -->
	<?php if(isset($a)){
		foreach($res as $article){
			if($a == $article['title']){
				$current = $article;
				//break;
			}
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
	
	
	
		<section id="textContent">
			<h1><?php echo $current['title']; ?></h1>
			<p class="by-author"><?php echo $current['author'] . ', publicerad ' . $current['pubdate']; ?></p>
			<?php echo $current['content']; ?>
			
			<?php 
				//Block out About page
				$nextarticle=1;
				//Add current article number to blocked out, this show next article.
				$nextarticle=$current['id'] +1;
				if($nextarticle['id']<3){
					$prevArticle=$current['id']-1;
				}
			?>
		
		
		</section>
		
		<div id="imageContent">
				<?php foreach($oRes as $images):?>
					<!--Change search route-->
					<!--Also makes image clickable for full size-->
					<?php
						$newPathImage['image'] = $images['image'];
						$resizeImage ="bmo/250";
						$newPathImage['image'] = str_replace("bmo", $resizeImage, $images['image']);
					?>
				<a href="<?php echo $images['image']?>"><img src="<?php echo $newPathImage['image']; ?>" alt="Bild"></a>
				<?php endforeach; ?>
		</div>
		
		<!--Navigation to next and prev article -->
				<?php foreach($res as $article): ?>
					<?php if($prevArticle == $article['id']):?>
						<!--<?php echo $article['title']; ?>-->
						<a href="<?php echo $currentArticle="?p=showArticle&amp;a=" . $article['title']; ?>">Föregående artikel - (<?php echo $article['title']; ?>)</a><br>
					<?php endif;?>
					<?php if($nextarticle == $article['id']):?>
						<a href="<?php echo $currentArticle="?p=showArticle&amp;a=" . $article['title']; ?>"> Nästa artikel - (<?php echo $article['title']; ?>)</a>
					<?php endif;?>
				<?php endforeach; ?>
		
	<?php endif;?>