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
?>

<fieldset>
	<?php foreach($res as $ad):?>
		<div style="background:#eee; border:1px solid #eee;padding:1em;overflow:auto;">
			<h1><?php echo $ad['title']; ?></h1>
			<p class="by-author"><?php echo $ad['author'] . ', publicerad ' . $ad['pubdate']; ?></p>
			<p><?php echo $ad['content']; ?></p>
		</div>
	<?php endforeach;?>
</fieldset>