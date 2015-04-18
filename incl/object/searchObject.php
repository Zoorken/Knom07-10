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
	$stmt = $db->prepare('SELECT * FROM Object WHERE title LIKE :parameter OR owner LIKE :parameter');
	$stmt->bindParam(':parameter', $s, PDO::PARAM_STR);
	$stmt->execute();
	$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!--Search for a object-->
<p>Sök efter ett objekt</p>
<p>Du kan söka på objekt namn, eller ägare till ojektet</p>
<form method="post">
	<input type="text" name="searchString">
	<input type="submit" value="Submit">
</form>
<?php if($s != null):?>
	<?php foreach($res as $images):?>	
		<?php $counter = 1; ?>
		<h2><?php echo $images['title']; ?></h2>
		<p>Kategori: <?php echo $images['category']; ?></p>
		<p><?php echo figure($images['image'], 550, $images['text']); ?></p>
		<p>Ägare: <?php echo $images['owner']; ?></p>	 
	<?php endforeach;?>
<?php endif;?>

<?php if($counter == 0){
	echo "Inga resultat";
}
?>