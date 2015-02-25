<?php include("incl/config.php"); 

	$title ="Min Me-sida om mig själv";
	$pageId ="me";
	
	//Private css style only for this page 
	$pageStyle = '
	 figure {
	  -moz-box-shadow: 5px 5px 3px #000000;
	  -webkit-box-shadow:5px 5px 3px #000000;
	  box-shadow:5px 5px 3px #000000;
	 }
	 div#content{
	 padding:8px;
	 }
	 figure.right{
	 background: #e6e6e6;
	 }
	 figure.top img{
	 border: 1px solid black;
	 border-radius:10px 10px 0 0;
	 }
	';
?>

<?php include("incl/header.php"); ?>

	<!-- body -->
	<div id="content">
		<article class="Justify border">
			<h2>htmlphp-me</h2>
			
			<figure class="right top">
				<img src="img/duck.gif" width=300 height=250>
				<figcaption>
					<p>Bild på en anka</p>
				</figcaption>
			</figure>
			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
			
			<P>Detta är min anksida, jag tänker lägga upp många olika typer sorters ankor här. Nu förtiden känns det som att ankor inte får den uppmärksamhet de behöver. Innan rick and roll kom skickade man ankor till varandra på skämt på internet.</p>
			<?php include("incl/byline.php"); ?>
		</article>
		
	</div>
<?php include("incl/footer.php"); ?>
