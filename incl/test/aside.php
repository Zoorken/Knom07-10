<nav class="lmenu">
	
	<ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
	   <li><h4>Kmom02</h4>
	      <ul>
				<li id="pagestyle"><a href="?p=kmom02_pageStyle">Ändra style på sidan</a>
		   </ul>
	   <li><h4>Kmom03</h4>
	      <ul>
				<li id="get"><a href="?p=kmom03_get">Visa <code>$_GET</code></a>
				<li id="getform"><a href="?p=kmom03_getform">Form med get</a>
				<li id="postform"><a href="?p=kmom03_postform">Form med post</a>
				<li id="validate"><a href="?p=kmom03_validate">Validera input</a>
				<li id="server"><a href="?p=kmom03_server">Server</a>
				<li id="destroySession"><a href="?p=kmom03_destroySession">Förstör Session</a>
				<li id="changeSession"><a href="?p=kmom03_changeSession">Ändra session</a>
				<li id="showSession"><a href="?p=kmom03_showSession">Visa <code>$_SESSION</code></a>
	      </ul>
	</ul>
</nav>

