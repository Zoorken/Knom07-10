<?php include("incl/config.php"); 
	$title ="BMO - Home";
	$pageId ="index";

//
//Setting up path to files
//
$path = dirname(__FILE__) . "/incl/article/data/";
$files = readDirectory($path);

//
// Check if the file exist
//
$filename = $path . "frontContent";

?>

<?php include("incl/header.php"); ?>
	<div id="content">
			<article class="justifyBorder">
				<figure class="right top">
					<img src="img/ronny_holm_200.jpg">
					<figcaption>
						<p>BMO grundare, Ronny Holm</p>
					</figcaption>
				</figure>
				
				<p><?php echo getFileContents($filename);?></p>
			
			</article>
	</div>
<?php include("incl/footer.php"); ?>
