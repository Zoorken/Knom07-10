<nav class="lmenu">
	<ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
	   <li><h4>Välj artikel</h4>
	      <ul>
				<li id="article-read-"><a href="?p=showArticle">Read</a>
				<li id="blokket-readAll-"><a href="?p=read-all">Read all</a>
		   </ul>
	</ul>
</nav>