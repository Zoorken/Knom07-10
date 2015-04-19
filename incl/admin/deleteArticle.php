<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors. 

//
//The delete phase. 
//Kollar först om användaren tryckt på att delete knappen. Sen kollar den om filen finns där.
if(isset($_POST['doDelete'])){
	$ad[] = $_POST["ads"];
	
	$stmt = $db->prepare("DELETE FROM Article WHERE id=?");
	$stmt->execute($ad);
	$output = "Radera annons. Rowcount is = " .$stmt->rowCount() . ".";
}


//
// Create a select/option list of the ads
//
$stmt = $db->prepare('SELECT * FROM Article;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$select ="<select id='input1' name='ads'>";
foreach($res as $ad){
	$select .="<option value='{$ad['id']}'>{$ad['title']} ({$ad['id']})</option>";
}
$select .= "</select>";

?>


<h2>Ta bort en artikel</h2>
<form method="post">
		<fieldset>
			<p>
				<label for="input1">Artiklarna:</label><br>
				<?php echo $select;?>
			</p>
			
			<p>
				<input type="submit" name="doDelete" value="Ta bort">
			</p>
			
		</fieldset>
</form>
