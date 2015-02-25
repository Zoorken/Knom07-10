<h2>Formulär och get-metod</h2>
	<form method="get" action="?">
		<fieldset>
		 <input type="hidden" name="p" value="kmom03_getform">
			<legend>Det berömda formuläret</legend>
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
