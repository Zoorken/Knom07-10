	<h2>Formulär och get-metod</h2>
	<form method="post" action="?p=kmom03_validate">
		<fieldset>
			<legend>Ett formulär med get-metod</legend>
			<p>
			 <label for="username">Användarkonto:</label><br>
			 <input id="username" class="text" type="text" name="account">
			</p>
			<p>
			 <label for="password">Lösenord:</label><br>
			 <input id="password" class="text" type="password" name="password">
			</p>
			<p>
			 <input type="submit" name="doLogin" value="Login">
			</p>
		</fieldset>
	</form>
	
	<p>Du anropade sidan med följande querysträng</p>
	<p><code>$_GET</code> innehåller följaden:</p>
	<pre><?php print_r($_GET); ?></pre>
	
	<p><code>$_POST</code>Inehåller Följande:</p>
	<pre><?php print_r($_POST); ?></pre>
	
	<?php 
		if(isset($_POST['account'])){
			echo "<p>Konton är definerat</p>";
		
			if(empty($_POST['account'])){
				echo "<p>Kontot är tomt</p>";
			}
			else{
				if(is_numeric($_POST['account'])){
					echo "<p>Variabeln består av endast siffror</p>";
				}
				else{
					echo"<p>Konton består EJ av enbart siffror</p>";
				}
			echo "<p>Med strip_tags ser kontot ut: '". strip_tags($_POST['account']) . "'</p>";
			}
		}	
		else{
			echo "<p>Konton är ej definerat</p>";
		}
	?>
	