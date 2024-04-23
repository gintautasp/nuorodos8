<?php

	class NuoroduApp extends Controller {
	
		public $ar_sukurti_nauja_nuoroda = false;
	
		public function __construct() {
		
		}
	
		public function tikrintiUzklausuDuomenis() {
		
			$this -> ar_sukurti_nauja_nuoroda = isset ( $_POST [ 'issaugoti' ] ) && ( $_POST [ 'id_nuorodos' ] == '0' );
		
		}
	
		public function arSukurtiNaujaNuoroda() {
	
			return $this -> ar_sukurti_nauja_nuoroda;
		}
	
		public function sukurtiNaujaNuoroda() {
		
			$nuoroda =  new Nuoroda ( $_POST [ 'nuoroda' ], $_POST [ 'pav' ], $_POST [ 'aprasymas' ], $_POST [ 'zymos' ] );
			$nuoroda -> issaugotiNauja();
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
		
		}
	}
	