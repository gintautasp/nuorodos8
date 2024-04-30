<?php

	class NuoroduApp extends Controller {
	
		public $ar_sukurti_nauja_nuoroda = false, $ar_pakeisti_esama_nuoroda = false, $ar_pasalinti_nuoroda = false
		
		, $ar_vykdoma_detali_paieska = false, $ar_vykdoma_tekstine_paieska = false, $ar_pasirinkta_zyma = false
		
		, $nuorodos, $zymos;
	
		public function __construct() {
		
			$this -> zymos = new Zymos();		
		}
	
		public function tikrintiUzklausuDuomenis() {
		
			$this -> ar_sukurti_nauja_nuoroda = isset ( $_POST [ 'atlikti' ] ) && ( $_POST [ 'atlikti' ] == 'Išsaugoti' )   && ( $_POST [ 'id_nuorodos' ] == '0' );
			$this -> ar_pakeisti_esama_nuoroda = isset ( $_POST [ 'atlikti' ] ) && ( $_POST [ 'atlikti' ] == 'Pakeisti' )   && ( intval ( $_POST [ 'id_nuorodos' ] ) > 0 );	
			$this -> ar_pasalinti_nuoroda = isset ( $_POST [ 'salinti' ] ) && ( $_POST [ 'salinti' ] == 'Šalinti' )   && ( intval ( $_POST [ 'id_salinamos_nuorodos' ] ) > 0 );			
			$this -> ar_vykdoma_detali_paieska = isset ( $_POST [ 'atlikti' ] ) && ( $_POST [ 'atlikti' ] == 'Ieškoti' );
			$this -> ar_vykdoma_tekstine_paieska = isset ( $_POST [ 'ieskoti_teksto' ] ) && ( $_POST [ 'ieskoti_teksto' ] == 'Ieškoti' ) && ( trim( $_POST [ 'paieskos_tekstas' ] ) != '' );
			$this -> ar_pasirinkta_zyma = isset ( $_GET [ 'tag' ] ) && ( $_GET [ 'tag' ] != '' );
																										// echo ( $this -> ar_vykdoma_detali_paieska ? 'ieškom' : 'neieškom' );
		}
	
		public function arSukurtiNaujaNuoroda() {
	
			return $this -> ar_sukurti_nauja_nuoroda;
		}
	
		public function sukurtiNaujaNuoroda() {
		
			$nuoroda =  new Nuoroda ( $_POST [ 'nuoroda' ], $_POST [ 'pav' ], $_POST [ 'aprasymas' ], $_POST [ 'zymos' ] );
			$nuoroda -> issaugotiNauja();
			
			$this -> zymos -> atnaujintiZymas( $_POST [ 'zymos' ] );
		}
	
		public function arPakeistiEsamaNuoroda()  {

			return $this -> ar_pakeisti_esama_nuoroda;
		}
	
		public function pakeistiEsamaNuoroda() {
		
			$sena_nuoroda = new Nuoroda ( '', '', '', '', $_POST [ 'id_nuorodos' ] );
			$sena_nuoroda -> pasiimtiDuomenis() ;
			
			$nuoroda =  new Nuoroda ( $_POST [ 'nuoroda' ], $_POST [ 'pav' ], $_POST [ 'aprasymas' ], $_POST [ 'zymos' ], $_POST [ 'id_nuorodos' ] );
			$nuoroda -> pakeistiDuomenis();
			
			$this -> zymos -> mazintiZymuKartojimosiKieki ( $sena_nuoroda -> zymos );
			$this -> zymos -> atnaujintiZymas( $_POST [ 'zymos' ] );			
		}	
	
		public function arPasalintiNuoroda() {
			return $this -> ar_pasalinti_nuoroda;
		}
		
		public function pasalintiNuoroda() {
		
			$salinama_nuoroda = new Nuoroda ( '', '', '', '', $_POST [ 'id_salinamos_nuorodos' ] );
			$salinama_nuoroda -> pasiimtiDuomenis() ;
			
			$this -> zymos = new Zymos();	
			$this -> zymos -> mazintiZymuKartojimosiKieki ( $salinama_nuoroda -> zymos );			
			
			$salinama_nuoroda -> pasalinti();
		}
	
		public function gautiDuomenis() {
		
			$this -> nuorodos = new Nuorodos();
			
			if ( $this -> ar_vykdoma_detali_paieska ) {
			
				$this -> nuorodos -> detaliosPaieskosParametrai ( $_POST [ 'nuoroda' ], $_POST [ 'pav' ], $_POST [ 'aprasymas' ], $_POST [ 'zymos' ] );
			
			}
			if ( $this -> ar_vykdoma_tekstine_paieska ) {
			
				$this -> nuorodos -> detaliosPaieskosParametrai ( $_POST [ 'paieskos_tekstas' ], $_POST [ 'paieskos_tekstas' ], $_POST [ 'paieskos_tekstas' ], $_POST [ 'paieskos_tekstas' ], false );
			}
			if ( $this -> ar_pasirinkta_zyma ) {
			
				$this -> nuorodos -> detaliosPaieskosParametrai ( '', '', '', $_GET [ 'tag' ] );
			}
			
			$this -> nuorodos -> gautiSarasaIsDuomenuBazes();
			
			$this -> zymos -> gautiSarasaIsDuomenuBazes();
		}
	}
	