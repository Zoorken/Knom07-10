<h3>Ändrar session</h3>
<p>Räknar upp counter variablen i sessionen. Upptatera denna sidan några gånger</p>

<?php
$_SESSION['me'] = "duckyDuckstarSessionVaribale";
if(isset($_SESSION['counter'])){
	$_SESSION['counter'] = $_SESSION['counter'] + 1;
}
else{
	$_SESSION['counter'] = 1;
}
?>