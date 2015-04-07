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

<h2>Gallery</h2>

<ul class="gallery">
	<?php foreach($res as $images):?>
    <li>
			<?php
				$newPathImage['image'] = $images['image'];
				$resizeImage ="bmo/80";
				$newPathImage['image'] = str_replace("bmo", $resizeImage, $images['image']);
				$i = $images['id'];
				$next = $i +1;
				$prev = $i -1;
			?>
			
        <a href="#img<?php echo $images['id']; ?>"><img src="<?php echo $newPathImage['image']; ?>" alt="Image Thumb"></a>
        <article id="img<?php echo $images['id']; ?>">
            <figure>
                <img src="<?php echo $images['image']; ?>" alt="Image <?php echo $images['id']; ?>">
                <figcaption><?php echo $images['text']; ?></figcaption>
            </figure>
				<nav>
                <a class="close" href="#close">Stäng</a>
                <a class="arrow prev" href="#img<?php echo $prev; ?>">Föregående</a>
					<a class="arrow next" href="#img<?php echo $next; ?>">Nästa</a>
            </nav>
				
        </article>
    </li>
	<?php endforeach;?>
</ul>