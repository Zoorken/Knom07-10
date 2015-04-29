<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors. 

//
//The delete phase. 
//Kollar f�rst om anv�ndaren tryckt p� att delete knappen. Sen kollar den om filen finns d�r.
if(isset($_POST['doDelete'])){
	$ad[] = $_POST["ads"];
	
	$stmt = $db->prepare("DELETE FROM Object WHERE id=?");
	$stmt->execute($ad);
	$output = "Radera Objekt. Rowcount is = " .$stmt->rowCount() . ".";
}


//
// Create a select/option list of the ads
//
$stmt = $db->prepare('SELECT * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

$select ="<select id='input1' name='ads'>";
foreach($res as $ad){
	$select .="<option value='{$ad['id']}'>{$ad['title']} ({$ad['id']})</option>";
}
$select .= "</select>";

?>


<h2>Ta bort en objekt</h2>
<form method="post">
		<fieldset>
			<p>
				<label for="input1">Objekt:</label><br>
				<?php echo $select;?>
			</p>
			
			<p>
				<input type="submit" name="doDelete" value="Ta bort">
			</p>
			
		</fieldset>
</form>
