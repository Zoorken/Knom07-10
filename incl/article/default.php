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
$current = null;
//$select ="<select id='input1' name='article' onchange='form.submit();'>";
//$select .= "<option value='-1'>Välj Artikel</option>";

//checking the url for a query string	
//Just the page
$p=null;
if(isset($_GET["p"])){
	$p = $_GET["p"];
}
//The article name
$a=null;
if(isset($_GET["a"])){
	$a = $_GET["a"];
}
?>
<h2>Artiklar</h2>
<p>Välkommen till min artikelsida. Här nedan kan du välja en artikel att läsa.</p>

	<!--Listar artiklarna-->
		<ul>
		<?php foreach($res as $article): ?>
			<li><a href="<?php echo $currentArticle="?p=showArticle&amp;a=" . $article['title']; ?>"><?php echo $article['title']; ?></a>
		<?php endforeach; ?>
		</ul>