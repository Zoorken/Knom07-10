<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors.
//
// Create a select/option list of the articles
$stmt = $db->prepare('SELECT * FROM Article WHERE category = "about";');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare('SELECT * FROM Object WHERE articleLink = "about";');
$stmt->execute();
$res2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="textContent">
	<?php foreach($res as $ad):?>
		<h1><?php echo $ad['title']; ?></h1>
		<p class="by-author"><?php echo $ad['author'] . ', publicerad ' . $ad['pubdate']; ?></p>
		<p><?php echo $ad['content']; ?></p>
	<?php endforeach;?>
</section>

<div id="imageContent">
				<?php foreach($res2 as $images):?>
					<?php
						$newPathImage['image'] = $images['image'];
						$resizeImage ="bmo/250";
						$newPathImage['image'] = str_replace("bmo", $resizeImage, $images['image']);
					?>
				<a href="<?php echo $images['image']?>"><img src="<?php echo $newPathImage['image']; ?>"></a>
				<?php endforeach; ?>
</div>