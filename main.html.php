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
		input[type=button], input[type=submit] {
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
	
		duomenys = {}		
	
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
			
		

			function pasiimti_duomenis_ajax ( elementas ) {
			
				duomenys.id = $( elementas ).data ( 'id' );	

				if ( parseInt ( duomenys.id ) > 0 ) {

					$.get ( 'http://localhost/nuorodos8/nuorodos-duomenys.php?i=' + duomenys.id , function( data ) {
					
						duomenys = JSON.parse ( data );
						duomenys_i_forma(  duomenys );
					});
				}
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
			
			$( '#pasalinti' ).hide();	
			
			$( '#paieska_visur' ).hide();			
			
			$( '#naujas' ).click( function() {
			
				$( '#pagrindine_forma' ).show();
				$( '#paieska_visur' ).hide();
				
				$( '#atlikti' ).val ( 'Išsaugoti' );
				$( '#pasalinti' ).hide();
				$( '#id_nuorodos' ).val ( 0 );
			});
			
			$( '#ieskoti' ).click( function() {
			
				$( '#pagrindine_forma' ).show();
				$( '#paieska_visur' ).hide();
				
				$( '#atlikti' ).val ( 'Ieškoti' );
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
					duomenys = pasiimti_duomenis_ajax ( this );
					/* duomenys_i_forma(  duomenys ); */
					 
					$( '#pagrindine_forma' ).show();
					$( '#paieska_visur' ).hide();
					$( '#atlikti' ).val ( 'Pakeisti' );
					$( '#pasalinti' ).show();
				});
			});
			
			$( '#pasalinti' ).click ( function() {
			
				if  ( confirm ( 'Patvirtinkite, kad norite pašalinti šią nuorodą'  ) == true  ) {
				
					id_nuorodos = parseInt ( $( '#id_nuorodos' ).val() );
					
					if ( id_nuorodos > 0 ) {
					
						$( '#id_salinamos_nuorodos' ).val ( id_nuorodos );
						$( '#salinimo_forma' ).submit();
					}
				} 
			});
		});
	</script>
</head>
<body>
	<aside id="zymu_sarasas">
		<a target="_self" href="/nuorodos8">
			Visos nuorodos
		</a>,	
		<a target="_self" href="?tag=SEO">
			SEO(1)
		</a>, 
		<a target="_self" href="?tag=rinkodata">
			rinkodata(1)
		</a>, 
		<a target="_self" href="?tag=html">
			html(2)
		</a>, 
		<a target="_self" href="?tag=programavimas">
			programavimas(1)
		</a>, 
		<a target="_self" href="?tag=dizainas">
			dizainas(1)
		</a>, 
		<a target="_self" href="?tag=web programavimas">
			web programavimas(1)
		</a>, 
		<a target="_self" href="?tag=javascript">
			javascript(1)
		</a>,
		<a target="_self" href="?tag=ajax">
			ajax(1)
		</a>,
		<a target="_self" href="?tag=mysql">
			mysql(1)
		</a>,
		<a target="_self" href="?tag=css">
			css(2)
		</a>,
		<a target="_self" href="?tag=php">
			php(1)
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
			<input type="submit" id="atlikti"  name="atlikti"  value="Išsaugoti">
			<input type="button" id="pasalinti" value="Pašalinti">
		</form>
	</div>
	<form  id="salinimo_forma" method="POST" action="">
		<input type="hidden" id="id_salinamos_nuorodos" name="id_salinamos_nuorodos" value="0">
		<input type="hidden" id="salinti"  name="salinti"  value="Šalinti">			
	</form>
	<div id="paieska_visur">
		<form method="POST" action="">	
		<label>Paieškos tekstas</label>		
		<input type="search" id="paieskos_tekstas" name="paieskos_tekstas">
		<input type="submit" id="ieskoti_teksto"  name="ieskoti_teksto" value="Ieškoti">
	</form>		
	</div>
	<section id="nuorodu_sarasas">
		<ul>
<?php
			foreach ( $nuorodu_app -> nuorodos -> sarasas  as $nuoroda1 ) {
?>
			<li>
				<input type="button" class="redaguoti" value="&#9998;" data-id="<?= $nuoroda1 [ 'id' ] ?>">
				<a target="_blank" href="<?= $nuoroda1 [ 'nuoroda' ] ?>" title="<?= $nuoroda1 [ 'aprasymas' ] ?>"><?= $nuoroda1 [ 'pav' ] ?></a>
			</li>
<?php
			}
?>
		</ul>
	</section>
</body>
</html>