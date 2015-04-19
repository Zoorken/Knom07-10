<?php include("incl/config.php");
	$pageId ="login";

//kolla om det finns något i url:en
	$p = null;
	if(isset($_GET["p"])){
			$p = $_GET["p"];
	}
	
	

//Betyder det som står i urlen något?
$content = null;
$output = null;
if($p == "login") 
{
  $title = "Logga in";
  $content = userLogin();
}
else if ($p == "logout") 
{
  $title = "Logga ut";
  $content = userLogout();
} 
{
  $title = "Status login / logout";
}

?>

<?php include ("incl/header.php");?>
<div id="content">
	<div class="left border" style="width:80%;">
	<article class="justifyBorder">
 <?php if(isset($content)):
      echo $content;
    else: ?> 
      <h1>Status login / logout</h1>
      <p>Denna webbplats har skyddade delar. Du måste logga in för att komma åt dem.</p>
      <p>För tillfället är du: 
      <?php if(userIsAuthenticated()): ?>
        <strong>inloggad</strong>.</p>
        <p><a href="?p=logout">Vill du logga ut</a>?</p>
      <?php else: ?>
        <strong>ej inloggad</strong>.</p>
        <p><a href="?p=login">Vill du logga in</a>?</p>
      <?php endif; ?>  
    <?php endif; ?>
	 		</article>
	 </div>
</div>


<?php include ("incl/footer.php");?>