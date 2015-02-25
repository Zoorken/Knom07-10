<?php include("incl/config.php");
	$title = "Report";
	$pageId = "report";
 include("incl/header.php"); ?>

	<!-- body -->
	<div id="content">
		<h2>Kmom01: Kom igång med HTML, CSS och PHP</h2>
		<p>Haft riktigt stora problem att få ankan till högersida på bilden. 
		Ja la till en klass till bilden som jag döpte till right. 
		I css-filen la jag till en beskrivning till right float:right, men inget hände i webbläsaren.
		Jag var förtvivlad. Jag tog den drastiska åtgärden att döpa om stylesheet till style för att se om något hände. 
		Vipps så funkade det. Mysko.
		</p>
	
	
		<h2>Kmom02: HTML-element och CSS-konstruktioner</h2>
		<p>Något som varit riktigt knepigt har varit att få rätt på viewsource som fortfarande inte funkar helt bra. </p>
		<p> Jag kan lite html/css men det är svårt att komma på själv hur man ska skriva det för det ska bli bra, 
		tycker detta momentet har hjälpt mig med det då det känns som jag blivit bättre. </p>
		<p>Guiderna html20 och css20 är sådär, varje gång man ska testa så upptateras sidan och man missar vad som händer
		bättre att själv sitta och pilla med det, w3 har ju några bra exempel ochså.</p>
		<p>Strukturen känns bra, det är lite som c++, undvika skriva samma sak på flera ställen</p>
		<p>Svårt att få det bra på sidan med bredd och sådär men med några nya taggar löst det sig </p>
		<p>La till css för att bara ändra specifik sida. Var väldigt smidigt för att justera specifika ojekt,
		på köpet började min källkod fungera, tros att jag inte ändrade något i den. </p>
		<p>Finns hela tiden små justeringar att göra, som att få foten att inte ta slut
        innan skärmen tar slut, vilket är lätt hänt </p>
		
		<h2>Kmom03: Dynamisk webbplats med PHP</h2>
		<p>Hade väldigt stora problem att få länkarna i vänster menyn att ändra färg när de var aktiva,
		felet visade sig vara en felskrivning, men den var jäkligt svår att hitta, tog över en timme.
		<p>Att lägga in tesidorna på sidan var inga problem. Däremot var det lite knepigt att få de att fungera
		först och att få rätt på if satserna. Det är svårt att måla upp bilden i huvudet hur man vill ha det 
		när man aldrig gjort det förr</p>
		<p>Hade stora problem med att få <code>destroySession()</code> att fungera. Jag löste det med att skippa utskriften utav $code och att byta else if satsen
		till en vanlig if sats. Jag tom försökte copy pasta din kod men fick det icke att fungera vilket var ganska snoppet. När jag kollade på det igen nu, några veckor senare så fungerade det inte lägre, bytte till en else if sats och det började fungera igen.
		<p>Att få login/logut grejen att fungera var knepgit. Behövde kolla rätt mycket på hur du gjort. Var inte helt med på att
		skapa sidor ifrån funktioner. Känndes skumt att det gick sådär bara. Många html/CSS taggar har man börjat kunna använda lättare nu utan att behöva slå upp dem.</p>
		<p>Det var roligt att börjar skriva lite mer PHP men det är svårt då det är mycket olika funktioner att komma ihåg. Men är väl en vanesak, C++ känns lättare när man 
		bygger funktionerna de flesta funktionerna från grunden själv. Det känns som att man skulle kunna automatisera en heldel sidoskapningar i framtiden med PHP. Börjar bli
		lite knepgit att hålla reda på alla filerna. Finns ju även saker som bara "funkar" på sidan nu, som man fixade till för längesen. 
		<p>Har även förstått varför stylesheeten började fungera när jag bytte namn på den i moment 1. Det har att göra med att webbläsaren är
		rätt långsam på att upptatera stylesheeten så det får man göra manuellt genom att rensa sidan med ett snabbkommando. </p>
	</div>	
<?php include("incl/footer.php"); ?>

