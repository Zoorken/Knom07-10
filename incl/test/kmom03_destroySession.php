<h3>Förstör session</h3>
<p>sessionen är nu förstörd sucker</p>

<?php
$code = 'else if ($p == "kmom03_destroySession") 
{
  $pageTitle = "Tester kmom03: Förstör sessionen";
  $file = "kmom03_destroySession.php";
  destroySession();
};
';

echo "<blockquote class='code'>\n" . htmlspecialchars($code, ENT_NOQUOTES, "UTF-8") . "</blockquote>";

?>