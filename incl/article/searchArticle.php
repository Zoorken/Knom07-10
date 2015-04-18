<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors.

$s=null;
if(isset($_POST["searchString"])){
	$s = $_POST["searchString"];
}
$counter = 0;
//
// Create a select/option list of the articles
if($s != null){
	$s = $s . "%";
	
	//$stmt = $db->prepare('SELECT * FROM Object WHERE title LIKE :param');
	//$stmt->bindParam(':parameter', $s, PDO::PARAM_STR);
	$stmt = $db->prepare('SELECT * FROM Article WHERE title LIKE :parameter');
	$stmt->bindParam(':parameter', $s, PDO::PARAM_STR);
	$stmt->execute();
	$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!--Search for a object-->
<p>Sök efter en artikel</p>
<p>Du kan söka pårtiklens titelnamn</p>
<form method="post">
	<input type="text" name="searchString">
	<input type="submit" value="Submit">
</form>

<?php if($s != null):?>
	<fieldset>
		<?php foreach($res as $ad):?>
			<?php $counter = 1; ?>
			<div style="background:#eee; border:1px solid #eee;padding:1em;overflow:auto;">
				<h1><?php echo $ad['title']; ?></h1>
				<p class="by-author"><?php echo $ad['author'] . ', publicerad ' . $ad['pubdate']; ?></p>
				<p><?php echo $ad['content']; ?></p>
			</div>
		<?php endforeach;?>
	</fieldset>
<?php endif;?>

<?php if($counter == 0){
	echo "Inga resultat";
}
?>