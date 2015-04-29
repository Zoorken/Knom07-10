<?php


//
//Connect to the database
$db = new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//
//Check if Save-button was pressed, save if its true.
if(isset($_POST['doSave'])){
	$strip = "<b><i><p><img>";

	//Add all entries to an array
	$ad[] = strip_tags($_POST["category"], $strip);
	$ad[] = strip_tags($_POST["title"], $strip);
	$ad[] = strip_tags($_POST["text"], $strip);
	$ad[] = strip_tags($_POST["owner"], $strip);
	$ad[] = strip_tags($_POST["imgLink"], $strip);
	$ad[] = strip_tags($_POST["articleLink"], $strip);
	$ad[] = strip_tags($_POST["id"], $strip);
	

	$stmt = $db->prepare('UPDATE Object SET category=?, title=?, text=?,owner=?, image=?, articleLink=? WHERE id=?');
	$stmt->execute($ad);
	$output = "Uppdaterade objektet. Rowcount is = " . $stmt->rowCount() . ".";
}
//
//Create a link to article drop down connection
$stmt = $db->prepare('SELECT * FROM Article');
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


//
//Create a selected/optin-list of the ads
$stmt = $db->prepare('SELECT * FROM Object');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select = "<select id='input1' name='ads' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Objekt</option>";

foreach ($res as $ad) {
	$selected="";
	if(isset($_POST['ads']) && $_POST['ads'] == $ad['id']){
		$selected = "selected";
		$current = $ad;
	}
	$select .= "<option value='{$ad['id']}' {$selected}>{$ad['title']} ({$ad['id']})</option>";

}
$select .= "</select>";

$imagesAlt = null;
?>


<h2>Uppdatera Objekt</h2>
<p>Välj ett objekt som du vill upptatera.</p>
<p>Om du ska välja en ny bild, och vill använda dropdown funktionen måste du först trycka skicka och sen fylla i alla fält, annars sparas det ej. Du kan även fylla i alla fält först och sen trycka på spara och sen välja bild och tryck på skicka och sen spara igen. !!!Glöm ej att klistra in texten i rutan!!!</p>

<!--Formuläret -->
<form method="post">
	<fieldset>
		<input type="hidden" name="id" value="<?php echo $current['id'];?>">
		<p>
			<label for="input1">Objekt:</label>
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
			<textarea style="width:100%;" name="text"><?php echo $current['text']; ?></textarea>
		</p>
		
		<p>
			<label for="input1">Ägare:</label>
			<br>
			<input type="text" class="text" name="owner" value="<?php echo $current['owner']; ?>">
		</p>
		
		<p>
			<label for="input1">Aktuell bild</label>
			<br>
			
			<input type="text" class="text" name="imgLink" value="<?php echo $current['image']; ?>">	
			<br>
			
			<br>
			<label>Välj ny bild (För att byta bild, välj ny i listan och tryck skicka, kopiera in sökvägen i text rutan "aktuell bild"):</label>
			<br>
			
			<?php			
				//
				//Fix the dropdown choser for picture
				//Could probably be less code includede here
				//
				include('Class_Resize_Image.php');			
					
					$dir = "/home/saxon/students/20122/frbd12/www/htmlphp/kmom07/Knom07-10/img/bmo";
					$files = readDirectory($dir);
			?>			
			<form method="post">
				<select name="imagesAlt">
				<?php foreach($files as $file): ?>
					<option value=<?php echo $file ?>">"<?php echo $file ?></option>
				<?php endforeach;?>
				</select>
				<INPUT TYPE="submit" name="Få sökvägen" />
				<br>
				<?php if(isset($_POST['imagesAlt'])){
					echo "img/bmo/" . $_POST['imagesAlt'];
				}
				?>
			</form>

		</p>

		<p>
			<label for="input1">Länka till artikel, lämna tom om du ej vill länka(Klistra in en artikels namn):</label>
			<br>
			<input type="text" class="text" name="articleLink" value="<?php echo $current['articleLink']; ?>">
			<br>
			<?php foreach ($articles as $article): ?>
					<?php echo $article['title']; ?>
					<br>
			<?php endforeach;?>
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