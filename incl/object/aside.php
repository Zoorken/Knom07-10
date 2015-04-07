<nav class="lmenu">
	<ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
	   <li><h4>Välj Object</h4>
	      <ul>
				<li id="object-list-"><a href="?p=showObject">Objekt lista</a>
				<li id="object-gallery-"><a href="?p=showAllObject">Objekt galleri</a>
				<li id="object-gallery2-"><a href="?p=showGallery">Gallery</a>
		   </ul>
	</ul>
</nav>