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

?>
<h2>Objekt som galleri</h2>
<p>Tryck på bilden som du vill beskåda för att aktivera effekten</p>


	<?php foreach($res as $images):?>
		 <!--<h2><?php echo $object['title']; ?></h2>-->
       <!--<p>Kategori: <?php echo $object['category']; ?></p>-->
					<?php
						$newPathImage['image'] = $images['image'];
						$resizeImage ="bmo/80";
						$newPathImage['image'] = str_replace("bmo", $resizeImage, $images['image']);
					?>
					<a href="<?php echo $images['image']?>"><img src="<?php echo $newPathImage['image']; ?>"></a>
     <!--   <p><?php echo figure($object['image'], 80, $object['text']); ?></p>-->
       <!--<p>Ägare: <?php echo $object['owner']; ?></p>-->
	<?php endforeach;?>

