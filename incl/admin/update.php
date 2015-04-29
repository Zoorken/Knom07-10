<?php
//
//Connect to the database
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//
//Check if Save-button was pressed, save if its true.
if(isset($_POST['doSave'])){
	$strip = "<b><i><p><img><div><article><aside><?php><figure><figcaption><fieldset>";

	//Add all entries to an array
	$ad[] = strip_tags($_POST["category"], $strip);
	$ad[] = strip_tags($_POST["title"], $strip);
	$ad[] = strip_tags($_POST["content"], $strip);
	$ad[] = strip_tags($_POST["author"], $strip);
	$ad[] = strip_tags($_POST["pubdate"], $strip);
	$ad[] = strip_tags($_POST["id"], $strip);

	$stmt = $db->prepare('UPDATE Article SET category=?, title=?, content=?,author=?, pubdate=? WHERE id=?');
	$stmt->execute($ad);
	$output = "Uppdaterade annonsen. Rowcount is = " . $stmt->rowCount() . ".";
}

//
//Create a selected/optin-list of the ads
$stmt = $db->prepare('SELECT * FROM Article');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select = "<select id='input1' name='ads' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Artikel</option>";

foreach ($res as $ad) {
	$selected="";
	if(isset($_POST['ads']) && $_POST['ads'] == $ad['id']){
		$selected = "selected";
		$current = $ad;
	}
	$select .= "<option value='{$ad['id']}' {$selected}>{$ad['title']} ({$ad['id']})</option>";

}
$select .= "</select>";
?>


<h2>Uppdatera artikel</h2>
<p>Välj den artikel som du vill använda.</p>

<!--Formuläret -->
<form method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $current['id'];?>">
		<p>
			<label for="input1">Artikel:</label>
			<br>
			<?php echo $select; ?>
		</p>
		<p>
			<label for="input1">Kategori:</label>
			<br>
			<input type="text" class="text" name="category" value="<?php echo $current['category']; ?>">
		</p>
		
		<p>
			<label for="input1">Titel:</label>
			<br>
			<input type="text" class="text" name="title" value="<?php echo $current['title']; ?>">
		</p>
		

		<p>
			<textarea style="width:100%;" name="content"><?php echo $current['content']; ?></textarea>
		</p>
		
		<p>
			<label for="input1">Författare:</label>
			<br>
			<input type="text" class="text" name="author" value="<?php echo $current['author']; ?>">
		</p>
		
		<p>
			<label for="input1">Publicerad:</label>
			<br>
			<input type="text" class="text" name="pubdate" value="<?php echo $current['pubdate']; ?>">
		</p>
		
		<p>
		<input type=submit name="doSave" value=Spara <?php if(!isset($current['id'])) echo "disabled"; ?>>
		<input type=reset value=Ångra>
		</p>
	</fieldset>
	<?php if(isset($output)): ?>
	<p><output class="success"><?php echo $output ?></output></p>
	<?php endif; ?>
</form>