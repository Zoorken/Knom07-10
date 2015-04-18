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
$prevObjCat=null;

//The category filter
$c=null;
if(isset($_GET["c"])){
	$c = $_GET["c"];
}
$imageCounter=0;
?>

<h2>Gallery</h2>

<p>Filter</p>
<!--Chosse category-->
<p>Filtrera på kategori</p>

<ul>
	<?php foreach($res as $object): ?>
		<?php if($object['category'] !=$prevObjCat):?>
			<li><a href="<?php echo $currentCategory="?p=showGallery&amp;c=" . $object['category']; ?>"><?php echo $object['category']; ?></a>
		<?php $prevObjCat = $object['category'];?>
		<?php endif;?>
	<?php endforeach; ?>
</ul>

<ul class="gallery">
	<?php foreach($res as $images):?>
			<?php
				$newPathImage['image'] = $images['image'];
				$resizeImage ="bmo/80";
				$newPathImage['image'] = str_replace("bmo", $resizeImage, $images['image']);
				$i = $images['id'];
				$next = $i +1;
				$prev = $i -1;
			?>
			
			<!--When NO filter is active -->
			<?php if($c==null):?>		
				<li>
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
		 <?php endif;?>
		 
		
		<!--When filter is active -->
		 <?php if($c!=null):?>
			
			<?php if($c == $images['category']):?>
				<?php $imageCounter+=1;?>
				<li>
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
			<?php endif;?>
		 
		 <?php endif;?>
		 
		 
	<?php endforeach;?>
</ul>
<!--If no image match the filter -->
<?php
if($imageCounter==0 && $c != null){
	echo "Verkar vara något fel med din filtrering, finns inga bilder som matchar ditt filter";
}
?>
