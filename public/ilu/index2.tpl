{config_load file=test.conf section="setup" }
<!DOCTYPE html> 
 <html lang="pl"> 
   <head> 
     <meta charset="utf-8"> 
     <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
     <meta name="viewport" content="width=device-width, initial-scale=1"> 
     <title>{#portal#} - {$tytul_strony|ucwords}</title>
<!-- Bootstrap --> 
     <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href='http://fonts.googleapis.com/css?family=Black+Ops+One&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	 <link href="css/styl22.css" rel="stylesheet" type="text/css"> 
	 <script>document.cookie='resolution='+Math.max(screen.width,screen.height)+("devicePixelRatio" in window ? ","+devicePixelRatio : ",1")+'; path=/';</script> <!--scrypt do rozmiaru obrazkow -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --> 
<!-- WARNING: Respond.js doesn't work if you view the page via file:// --> 
<!--[if lt IE 9]> 
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script> 
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> 
     <![endif]--> 	
   </head> 
   <body style="background-color:#e7e7c3; background-image:url(ilu/abrams.jpg);background-size:1920px 1080,px; ">
 {include file="nawiNowe.tpl"}
  <div class="container">
        <div class="row">
{foreach item=arty from=$news}
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="news">
		<h4>{$arty.tytulNews}</h4>
		<h5>{$arty.podtytulNews}</h5>
		<p>  {$arty.tekstNews|nl2br|auto_link_urls} </p>

	<ul class="lista">
		<li class="dane_opis">Dodał: {$arty.imieUser} {$arty.nazwiskoUser}</li>
		<li class="dane_opis">Data: {$arty.dataNews}</li>
	</ul>
	</div>
	<hr style="margin:4px;width:65%;">
</div>

{/foreach}
        </div>
		
		<div class="row">
     
{foreach item=wynik from=$dane}
<div class="col-md-3 col-sm-6 col-xs-12">
	<div class="news druga_linia">
		<h4>{$wynik.tytulArt}</h4>
		<p> {$wynik.tekstArt|strip_tags|truncate:260:"...":false} <br /> </p><div  style="text-align:right;">
			<a  href="historia.php?i={$wynik.idArt}"  title="Przeczytaj cały artykuł"> więcej... </a></div>
	<ul class="lista">
		<li class="dane_opis">Dodał: {$wynik.imieUser} {$wynik.nazwiskoUser}</li>
		<li class="dane_opis">Data: {$wynik.dataArt}</li>
	</ul>
	</div>
	<hr style="margin:4px;width:65%;">
</div>
{/foreach}
</div>

<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="news druga_linia">
{literal}
<script type="text/javascript"><!--
google_ad_client = "pub-9001339211341884";
/* 160x90, utworzono 09-05-02 */
google_ad_slot = "2688840726";
google_ad_width = 160;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
{/literal}
		</div>
        <hr style="margin:4px;width:65%;">
	</div>
<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="news druga_linia">
		{literal}
		<script type="text/javascript"><!--
google_ad_client = "pub-9001339211341884";
/* 160x90, utworzono 09-05-02 */
google_ad_slot = "2688840726";
google_ad_width = 160;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
{/literal}
		</div>
       <hr style="margin:4px;width:65%;">
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="news druga_linia">
<h4>Ostatnie Nowo&#347;ci</h4>
<p><strong>Kolejne czołgi w Encyklopedii</strong>
Dodałem do Galerii-Encyklopedii czołg K2 Black Panther . W encyklopedi już jest 70 pozycji. Proszę o propozycję jakich czołgów wam brakuje.
<br />
</p>
		</div>
		<hr style="margin:4px;width:65%;">
	</div>
	<div class="col-md-3 col-sm-6 col-xs-12">
		<div class="news druga_linia">
			<p><strong>Posadziłem stronę </strong>
 Aktualnie juz "siedzę" na dobre na nowym serwerze <a href="http://www.hekko.pl/?ref=13171" title="Link"><img src="http://www.ad.hekko.pl/3_tani_hosting_www.jpg" alt="Hosting" class="obrazek" /></a> Polecam.
 </p>
		</div>
		<hr style="margin:4px;width:65%;">
	</div>

</div>

</div>		
   
{literal}
<script type="text/javascript">
function wyswietlOkno(adresOkna,tytulOkna){
	okno = window.open(adresOkna,'tytulOkna','scrollbar=0,toolbar=0,width=600,height=600');
}
</script>
 {/literal} 
{include file="stopkaNowa.tpl"}