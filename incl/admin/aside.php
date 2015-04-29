<nav class="lmenu">
	<ul <?php if(isset($p)) echo "id='".strip_tags($p)."'"; ?>>
	   <li><h4>Admin panel</h4>
	      <ul>
				<li id="bmo-update-"><a href="?p=update">Upptatera artikel</a>
				<li id="bmo-create-"><a href="?p=create">Skapa artikel</a>
				<li id="bmo-delete-"><a href="?p=delete">Radera artikel</a>
				<li id="bmo-upload-obj-"><a href="?p=uploadObj">Ladda upp Objekt</a>
				<li id="bmo-update-obj-"><a href="?p=updateObj">Upptatera Objekt</a>
				<li id="bmo-create-obj-"><a href="?p=createObj">Skapa Objekt</a>
				<li id="bmo-delete-obj-"><a href="?p=removeObj">Radera Objekt</a>
				<li id="bmo-front-"><a href="?p=frontArticle">Upptatera framsidan</a>
				
		   </ul>
	</ul>
</nav>