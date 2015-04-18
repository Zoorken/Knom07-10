<?php
//
//Connect to database
$db= new PDO("sqlite:$dbPath");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // Display errors.

//
//Get a number of how many objects there are
$stmt2 = $db->prepare('SELECT COUNT(id) FROM Object;');
$stmt2->execute();
$totNrOfObj = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$totNrOfObj = $totNrOfObj[0]['COUNT(id)'];


//
//StartNrValue
$startNr = null;
if(isset($_GET["start"])){
	$startNr = $_GET["start"];
	
} else {
	$startNr = 0;
}
//
//EndNrValue
$endNr = null;
if(isset($_GET["end"])){
	$endNr = $_GET["end"];
} else {
	$endNr = $totNrOfObj;
}

//
// Create a select/option list of the articles
$stmt = $db->prepare('SELECT * FROM Object WHERE id BETWEEN :startObjNr AND :endObjNr;');
$stmt->bindParam(':startObjNr', $startNr, PDO::PARAM_INT);
$stmt->bindParam(':endObjNr', $endNr, PDO::PARAM_STR, 12);

$stmt->execute();
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
$prevObjCat=null;

//
//The category filter
$c=null;
if(isset($_GET["c"])){
	$c = $_GET["c"];
}


$imageCounter=0;
$linkBuildHelper="?p=showGallery&amp;start=0" . "&amp;end=";
?>
<h2>Gallery</h2>

<p>Filter</p>
<a href="?p=showGallery">Återställ filter</a>

<p>Hur många objekt ska visas?</p>
<li><a href="<?php echo $linkBuildHelper . $totNrOfObj;?>">Alla</a></li>
<li><a href="<?php echo $linkBuildHelper . "5";?>">5</a></li>
<li><a href="<?php echo $linkBuildHelper . "10";?>">10</a></li>
<li><a href="<?php echo $linkBuildHelper . "20";?>">20</a></li>

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
	
	
	//
	//Prev image set 
	if($startNr >= 0){
		$diff = $endNr - $startNr;
		$startNrHelper = $startNr - $diff;
		$endNrHelper = $endNr - $diff;

		if($startNr > 0){
			$linkBuildHelper2="?p=showGallery&amp;start=" . $startNrHelper . "&amp;end=" . $endNrHelper;
			
		}
		else{
			$startNrHelper = 0;
			$linkBuildHelper2="?p=showGallery&amp;start=" . $startNrHelper . "&amp;end=" . $diff;
		}
	}

	//
	//Next image set
	if($endNr < $totNrOfObj){
		$diff = $endNr - $startNr;
		$startNrHelper2 = $startNr + $diff;
		$endNrHelper2 = $endNr + $diff;

		if($endNr < $totNrOfObj){
			$linkBuildHelper3="?p=showGallery&amp;start=" . $startNrHelper2 . "&amp;end=" . $endNrHelper2 ;
			
		}
		else{
			$linkBuildHelper3="?p=showGallery&amp;start=" . $startNrHelper2 . "&amp;end=" . $totNrOfObj;
		}
	}
	
?>
<?php if($startNr > 0):?>
	<a href="<?php echo $linkBuildHelper2;?>">Föregående</a>
<?php endif;?>

<?php if($endNr < $totNrOfObj):?>
	<a href="<?php echo $linkBuildHelper3;?>">Nästa</a>
<?php endif;?>
