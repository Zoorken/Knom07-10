<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors. 

//
//Check if save button was pressed
//
if(isset($_POST['doCreate'])){
	$ad[] = strip_tags($_POST["title"], "<b><i><p><img>");
	
	$stmt = $db->prepare("INSERT INTO Object (title) VALUES (?)");
	$stmt->execute($ad);
	$output = "Lade till en nytt objekt med id " . $db->lastInsertId() . ". Rowcount is = " . $stmt->rowCount() . ".";
}


//
// Create a select/option list of the ads
//
$stmt = $db->prepare('SELECT * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$select ="<select id='input1' multiple name='ads'>";
foreach($res as $ad){
	$select .="<option value='{$ad['id']}'>{$ad['title']} ({$ad['id']})</option>";
}
$select .= "</select>";

?>

<h2>Lägg till ett Objekt</h2>
<p>Ange ett unikt namn pått Objekt och klicka på knappen</p>

<form method="post">
		<fieldset>
			<p>
				<label for="input1">Befintliga Objekt namn:</label>
				<br>
				<?php echo $select;?>
			</p>
			
			<p>
				<label for="input2">Nytt Objekt:</label><br>
				
				<input id="input2" class="text" name="title">
			</p>
			
			<p>
				<input type="submit" name="doCreate" value="Skapa">
				<input type="reset" name="ångra">
			</p>
		
		</fieldset>
</form>