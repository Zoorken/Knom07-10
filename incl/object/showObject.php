<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors.

//
// Create a select/option list of the articles
$stmt = $db->prepare('SELECT * FROM Object;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select ="<select id='input1' name='object' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Objekt</option>";

foreach($res as $object){
	$selected ="";
	if(isset($_POST['object']) && $_POST['object'] == $object['id']){
		$selected = "selected";
		$current = $object;
	}
	$select .= "<option value='{$object['id']}' {$selected}>{$object['title']} ({$object['id']})</option>";
}
$select .= "</select>";
?>
<h2>Objekt som lista</h2>

<form method="post">
  <fieldset>
    <p>
      <label for="input1">Objekt:</label><br>
      <?php echo $select; ?>
    </p>
    
  <?php if(isset($current)): ?>
    <p>
      <div style="background:#eee; border:1px solid #eee;padding:1em;">
        <h2><?php echo $current['title']; ?></h2>
        <p>Kategori: <?php echo $current['category']; ?></p>
        <p><?php echo figure($current['image'], 550, $current['text']); ?></p>
        <p>Ägare: <?php echo $current['owner']; ?></p>
      </div>
    </p>
  <?php endif; ?>
    
  </fieldset>
</form> 