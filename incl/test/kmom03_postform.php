	<h2>Formulär och get-metod</h2>
	<form method="post" action="?p=kmom03_postform">
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
