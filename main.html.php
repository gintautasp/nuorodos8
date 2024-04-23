<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nuorodų projektas</title>
	<style>
		body{
			background-color: #e3dbdb;
		}
		label, input[type=nuoroda], input[type=text], input[type=search], input[type=nuoroda], input[type=zymos], textarea  {
			width: calc(100% - 34px);
			padding: 7px;
			margin: 12px;
			font-size: 20px;			
		}
		aside {
			width: 30%;
			padding-left: 15px;
			margin-left: 15px;
			float: right;
		}
		input[type=button] {
			background-color: #808080;
			border: none;
			color: white;
			padding: 12px 24px;
			text-decoration: none;
			margin: 12px;
			cursor: pointer;
			font-size: 20px;
		}
		input[type=button].redaguoti {
			padding: 3px 6px;
			margin: 3px;			
		}
		#pagrindine_forma, #paieska_visur, menu {
			padding: 12px;
			width: 60%;
			margin: 12px;
		}
		ul {
			list-style-type: none;
		}
		a {
			text-decoration: none;
			font-size: 20px;	
			color: CadetBlue;
		}
		a:hover {
			text-decoration: underline;
		}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		$(document).ready( function() {
		
			function pasiimti_duomenis_is_data ( elementas ) {
			
				duomenys = {}
				duomenys.id = $( elementas ).data ( 'id' );
				duomenys.pav = $( elementas ).data ( 'pav' );
				duomenys.nuoroda = $( elementas ).data ( 'nuoroda' );
				duomenys.zymos = $( elementas ).data ( 'zymos' );
				duomenys.aprasymas = $( elementas ).data ( 'aprasymas' );
																										// alert ( JSON.stringify ( duomenys ) );
				return duomenys;
			}
			
			function pasiimti_duomenis_is_html ( elementas ) {
			
				duomenys = {}
				duomenys.id = $( elementas ).data ( 'id' );
				duomenys.pav = $( elementas ).next().html();
				duomenys.nuoroda = $( elementas ).next().attr( 'href' );
				duomenys.zymos = $( elementas ).data ( 'zymos' );
				duomenys.aprasymas = $( elementas ).next().attr( 'title' );
				alert ( JSON.stringify ( duomenys ) );
				return duomenys;
			}			
			
			function duomenys_i_forma(  duomenys ) {
			
				$( '#id_nuorodos' ).val ( duomenys.id );
				$( '#pav' ).val ( duomenys.pav );
				$( '#nuoroda' ).val ( duomenys.nuoroda );
				$( '#zymos' ).val ( duomenys.zymos );	
				$( '#aprasymas' ).val ( duomenys.aprasymas );				
			}
			
			$( '#pagrindine_forma' ).hide();
			
			$( '#issaugoti' ).hide();
			$( '#pasalinti' ).hide();
			$( '#ieskoti_detaliau' ).hide();	
			
			$( '#paieska_visur' ).hide();			
			
			$( '#naujas' ).click( function() {
			
				$( '#pagrindine_forma' ).show();
				$( '#paieska_visur' ).hide();
				$( '#issaugoti' ).show();
				$( '#ieskoti_detaliau' ).hide();
				$( '#pasalinti' ).hide();
				$( '#id_nuorodos' ).val ( 0 );
			});
			
			$( '#ieskoti' ).click( function() {
			
				$( '#pagrindine_forma' ).show();
				$( '#paieska_visur' ).hide();
				
				$( '#issaugoti' ).hide();				
				$( '#ieskoti_detaliau' ).show();
				$( '#pasalinti' ).hide();
				$( '#id_nuorodos' ).val ( 0 );				
			});
			
			$( '#ieskoti_visur' ).click( function() {
			
				$( '#paieska_visur' ).show();
				$( '#pagrindine_forma' ).hide();
			});

			$( '.redaguoti' ).each ( function() {
			
				$( this ).click ( function() {
				
					id_nuorodos = $( this ).data( 'id' );
																																		// alert( id_nuorodos );
					duomenys = pasiimti_duomenis_is_html ( this );
					duomenys_i_forma(  duomenys );
					 
					$( '#pagrindine_forma' ).show();
					$( '#paieska_visur' ).hide();
					$( '#issaugoti' ).show();
					$( '#pasalinti' ).show();					
					$( '#ieskoti_detaliau' ).hide();					
				});
			});
		});
	</script>
</head>
<body>
	<aside id="zymu_sarasas">
		<a target="_self" href="?tag=Gintauto">
			Gintauto(15)
		</a>, 
		<a target="_self" href="?tag=html">
			html(7)
		</a>, 
		<a target="_self" href="?tag=opencart">
			opencart(3)
		</a>, 
		<a target="_self" href="?tag=Rimos">
			Rimos(12)
		</a>, 
		<a target="_self" href="?tag=rinkodara">
			rinkodara(8)
		</a>, 
		<a target="_self" href="?tag=Anželika">
			Andželika(10)
		</a>, 
		<a target="_self" href="?tag=site-pro">
			site-pro(9)
		</a>
	</aside>	
	<menu>
		<input type="button" id="naujas" value="Nauja">
		<input type="button" id="ieskoti" value="Ieškoti">
		<input type="button" id="ieskoti_visur" value="Ieškoti visur ..">		
	</menu>
	<div id="pagrindine_forma">
		<form method="POST" action="">
			<label>Nuoroda</label>
			<input type="text" id="nuoroda" name="nuoroda">
			<label>Pavadinimas</label>
			<input type="text" id="pav" name="pav">	
			<label>Žymos</label>
			<input type="text" id="zymos" name="zymos">
			<label>Aprašymas</label>		
			<textarea  id="aprasymas" name="aprasymas" rows="3"></textarea>
			<input type="hidden" id="id_nuorodos" name="id_nuorodos" value="0">		
			<input type="submit" id="issaugoti"  name="issaugoti"  value="Išsaugoti">
			<input type="button" id="pasalinti" value="Pašalinti">
			<input type="button" id="ieskoti_detaliau" value="Ieškoti">
		</form>
	</div>
	<div id="paieska_visur">
		<label>Paieškos tekstas</label>
		<input type="search" id="nuoroda" name="nuoroda">
		<input type="button" id="ieskoti_teksto" value="Ieškoti">		
	</div>
	<section id="nuorodu_sarasas">
		<ul>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="1">
				<a target="_blank" href="https://www.prisijungusi.lt/medziaga/nauji/39/">prisijungusi.lt Pateiktys</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="2">
				<a target="_blank" href="https://docs.opencart.com/en-gb/getting-started/">OpenCart dokumentacija</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="3">			
				<a target="_blank" href="https://marko.lt/wp-content/uploads/2021/01/10_2013_Tinklalapiu_kurimas_dizainas_ir_valdymas.pdf">Ričkutė "Tinklalapių kūrimas dizainas ir valdymas"</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="4">			
				<a  target="_blank" href="http://svetaine.lt/klausimai/patarimai-kuriant-svetaine/kaip-greiciau-atsidurti-google-ir-kitose-paiesku-sistemose-64">kaip greičiau atsidurti google ir kitose paieškų sistemose?</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="5" data-nuoroda="https://seositecheckup.com/" data-pav="SeoSiteCheckUp.com" data-zymos="SEO, rinkodata" data-aprasymas="Run unlimited analysis on our most powerful servers. Stored reports make it easy to view  progress and past work">			
				<a  target="_blank" href="https://seositecheckup.com/" title="Run unlimited analysis on our most powerful servers. Stored reports make it easy to view  progress and past work">SeoSiteCheckUp.com</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="6">			
				<a  target="_blank" href="https://www.seoptimer.com/">SEOpimer.com</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="7">			
				<a target="_blank" href="https://www.rankwatch.com/tools/web-analyzer.html">SEO Analyzer &and; Website Checker Tool</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="8">				
				<a target="_blank" href="https://whois.domaintools.com/">Whois lookup</a>
			</li>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="9">			
				<a target="_blank" href="http://www.esparama.lt/es_parama_pletra/failai/ESFproduktai/2013_Kompozicijos_ir_grafinio_dizaino_pagrindai.pdf.pdf">2013 Kompozicijos ir grafinio dizaino pagrindai</a>
			</li>
		</ul>
	</section>
</body>
</html>