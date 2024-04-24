<?php

	class NuoroduApp extends Controller {
	
		public $ar_sukurti_nauja_nuoroda = false, $ar_vykdoma_detali_paieska = false, $ar_vykdoma_tekstine_paieska = false, $nuorodos;
	
		public function __construct() {
		
		}
	
		public function tikrintiUzklausuDuomenis() {
		
			$this -> ar_sukurti_nauja_nuoroda = isset ( $_POST [ 'atlikti' ] ) && ( $_POST [ 'atlikti' ] == 'Išsaugoti' )   && ( $_POST [ 'id_nuorodos' ] == '0' );
			$this -> ar_vykdoma_detali_paieska = isset ( $_POST [ 'atlikti' ] ) && ( $_POST [ 'atlikti' ] == 'Ieškoti' );
			$this -> ar_vykdoma_tekstine_paieska = isset ( $_POST [ 'ieskoti_teksto' ] ) && ( $_POST [ 'ieskoti_teksto' ] == 'Ieškoti' ) && ( trim( $_POST [ 'paieskos_tekstas' ] ) != '' );
																										// echo ( $this -> ar_vykdoma_detali_paieska ? 'ieškom' : 'neieškom' );
		}
	
		public function arSukurtiNaujaNuoroda() {
	
			return $this -> ar_sukurti_nauja_nuoroda;
		}
	
		public function sukurtiNaujaNuoroda() {
		
			$nuoroda =  new Nuoroda ( $_POST [ 'nuoroda' ], $_POST [ 'pav' ], $_POST [ 'aprasymas' ], $_POST [ 'zymos' ] );
			$nuoroda -> issaugotiNauja();
			
			$zymos = new Zymos();
			$zymos -> atnaujintiZymas( $_POST [ 'zymos' ] );
		}
	
		public function arPakeistiEsamaNuoroda()  {
		
		}
	
		public function pakeistiEsamaNuoroda() {
		
		}	
	
		public function arPasalintiNuoroda() {
	
		}
		
		public function pasalintiNuoroda() {
		
		}
	
		public function gautiDuomenis() {
		
			$this -> nuorodos = new Nuorodos();
			
			if ( $this -> ar_vykdoma_detali_paieska ) {
			
				$this -> nuorodos -> detaliosPaieskosParametrai ( $_POST [ 'nuoroda' ], $_POST [ 'pav' ], $_POST [ 'aprasymas' ], $_POST [ 'zymos' ] );
			
			}
			if ( $this -> ar_vykdoma_tekstine_paieska ) {
			
				$this -> nuorodos -> detaliosPaieskosParametrai ( $_POST [ 'paieskos_tekstas' ], $_POST [ 'paieskos_tekstas' ], $_POST [ 'paieskos_tekstas' ], $_POST [ 'paieskos_tekstas' ], false );
			}
			
			
			$this -> nuorodos -> gautiSarasaIsDuomenuBazes();
		}
	}
	