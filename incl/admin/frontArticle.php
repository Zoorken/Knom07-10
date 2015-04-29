<?php
//__FILE__ är för att hamna i mappen vi är i just nu. Sen vandrar vi bakåt och sen in i style mappen.
$pathToStyles = "/home/saxon/students/20122/frbd12/www/htmlphp/kmom07/Knom07-10/incl/article/data/";
//Läser det som finns i style mappen. 
$files = readDirectory($pathToStyles); 


//Kollar att inget är skumt med filnamnet för stylen vi ska visa i text fältet.
$filename = $pathToStyles . "frontContent";
$isWritable = null;
	if(is_writable($filename)){
		$isWritable=true;
	}else{
		$isWritable=false;
	}



//Kollar om användaren tryckt ner "spara", lagras i en variabel för att använda senare.
if(isset($_POST['doSave'])){
	$resultFromSave = saveFile($filename, strip_tags($_POST['textAreaContent'], "<b><i><p><img><h2>"));
}

?>
<h2>Upptatera framsidan</h2>

<!--Formuläret -->
<form method="post">
	<textarea style="width:96%;" name="textAreaContent"><?php if($filename) echo getFileContents($filename); ?></textarea>
	
	<input type=submit name="doSave" value=Spara <?php if(!$isWritable) echo "disabled"; ?>>
	<input type=reset value=Ångra>
	
	<?php if($isWritable ===false): ?>
	<p class="info">Filen går ej att skriva till. Gör den skrivbar med chmod 666 </p>
	<?php endif; ?>
	
		<?php if(isset($resultFromSave)): ?>
			<p><output class="success"><?php echo $resultFromSave ?></output></p>
		<?php endif; ?>
	</fieldset>	
</form>