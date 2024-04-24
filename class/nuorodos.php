<?php

	class Nuorodos extends  ModelDbSarasas  {
	
		public $nuoroda_paieskai, $paieskos_kriterijai = '1';
	
		public function __construct() {
		
			parent::__construct();
		}
		
		public function detaliosPaieskosParametrai ( $nuoroda, $pav, $aprasymas, $zymos, $detali = true ) {
		
			$salygu_sujungimas = 'AND';
		
			if ( ! $detali ) {
			
				$this -> paieskos_kriterijai = '0';
				$salygu_sujungimas = 'OR';
			}
			
			$this -> nuoroda_paieskai = new Nuoroda ( $nuoroda, $pav, $aprasymas, $zymos );
			
			if ( trim ( $this -> nuoroda_paieskai -> nuoroda ) != '' ) {
			
				$this -> paieskos_kriterijai .= 
						"
					" . $salygu_sujungimas . "
						`nuoroda` LIKE '%" . $this -> nuoroda_paieskai -> nuoroda . "%' 
						";
			}
			
			if ( trim ( $this -> nuoroda_paieskai -> pav ) != '' ) {
			
				$this -> paieskos_kriterijai .= 
						"
					" . $salygu_sujungimas . "
						`pav` LIKE '%" . $this -> nuoroda_paieskai -> pav . "%' 
						";
			}	
			
			if ( trim ( $this -> nuoroda_paieskai -> aprasymas ) != '' ) {
			
				$this -> paieskos_kriterijai .= 
						"
					" . $salygu_sujungimas . "
						`aprasymas` LIKE '%" . $this -> nuoroda_paieskai -> aprasymas . "%' 
						";
			}
			
			if ( $this -> nuoroda_paieskai -> zymos != '' ) {
			
				$this -> paieskos_kriterijai .= 
						"
					" . $salygu_sujungimas . "
						`zymos` LIKE '%" . $this -> nuoroda_paieskai -> zymos . "%' 
						";
			}			
		}

		
		public function gautiSarasaIsDuomenuBazes() {
		
			$gw_gauti_sarasa =
					"
				SELECT 
					`id`, `nuoroda`, `pav`, `aprasymas` 
				FROM 
					`nuorodos`
				WHERE
					" . $this -> paieskos_kriterijai . "
					";
			/*
			print_r( $_POST );
			echo $gw_gauti_sarasa;
			*/
			$rs_list = $this -> db -> uzklausa ( $gw_gauti_sarasa );
			
			while ( $row = $rs_list -> fetch_assoc() ) {
					
				$this -> sarasas[] = $row;
			}
		}
	}