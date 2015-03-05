<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors.

//
// Create a select/option list of the articles
$stmt = $db->prepare('SELECT * FROM Article;');
$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$current = null;

$select ="<select id='input1' name='article' onchange='form.submit();'>";
$select .= "<option value='-1'>Välj Artikel</option>";

foreach($res as $article){
	$selected="";
	if(isset($_POST['article']) && $_POST['article'] == $article['id']){
		$selected = "selected";
		$current = $article;
	}
	$select .="<option value='{$article['id']}' {$selected}>{$article['title']} ({$article['id']})</option>";
}
$select .= "</select>";
?>

<form method="post">
	<fieldset>
		<p>
			<label for="input1">Artikel.:</label><br>
			<?php echo $select;?>
		</p>
		
		<?php if(isset($current)): ?>
			<p>
				<div style="background:#eee; border:1px solid #eee;padding:1em;overflow:auto;">
					<h1><?php echo $current['title']; ?></h1>
					<p class="by-author"><?php echo $current['author'] . ', publicerad ' . $current['pubdate']; ?></p>
					<p><?php echo $current['content']; ?></p>
				</div>
			</p>
		<?php endif;?>
	</fieldset>
</form>
