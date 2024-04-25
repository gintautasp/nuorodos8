<?php

	class Nuoroda extends  ModelDb {
	
		public $nuoroda, $pav, $aprasymas, $zymos, $id;
	
		public function __construct( $nuoroda, $pav, $aprasymas, $zymos, $id = 0 ) {
		
			parent::__construct();
			
			$this -> nuoroda = $this -> db -> ercl_db -> real_escape_string ( $nuoroda );
			$this -> pav = $this -> db -> ercl_db -> real_escape_string ( $pav );
			$this -> aprasymas = $this -> db -> ercl_db -> real_escape_string ( $aprasymas );
			$this -> zymos = $this -> db -> ercl_db -> real_escape_string ( $zymos );
			$this -> id = $id;			
		}
		
		public function issaugotiNauja() {
		
			$qw_issaugoti_nauja =
					"
				INSERT INTO `nuorodos` ( `nuoroda`, `pav`, `aprasymas`, `zymos` )
				VALUES (
					'" . $this -> nuoroda . "', '" . $this -> pav . "', '" . $this -> aprasymas . "', '" . $this -> zymos . "'
				)
					";
																																	//	echo $qw_issaugoti_nauja;
			$this -> db -> uzklausa ( $qw_issaugoti_nauja );
		}
		
		public function pakeistiDuomenis() {
		
			$qw_pakeisti_duomenis =
					"
				UPDATE `nuorodos`
				SET
					`nuoroda`='" . $this -> nuoroda . "'
					, `pav`='" . $this -> pav . "'
					, `aprasymas`='" . $this -> aprasymas . "'
					, `zymos`='" . $this -> zymos . "'
				WHERE
					`id`=" . $this -> id . "
					";
																																	//	echo $qw_issaugoti_nauja;
			$this -> db -> uzklausa ( $qw_pakeisti_duomenis );
		}	

		public function pasiimtiDuomenis() {

			$qw_gauti_nuoroda =
					"
				SELECT 
					*
				FROM
					`nuorodos`
				WHERE
					`id`= " . $this -> id . "
					";
			$rs_list = $this -> db -> uzklausa ( $qw_gauti_nuoroda );
			
			if ( $row = $rs_list -> fetch_assoc() ) {
			
				$this -> nuoroda = $row [ 'nuoroda' ];
				$this -> pav = $row [ 'pav' ];
				$this -> aprasymas = $row [ 'aprasymas' ];	
				$this -> zymos = $row [ 'zymos' ];				
			}
		}
		
		public function pasalinti() {
		
			$qw_pasalinti =
					"
				DELETE FROM `nuorodos`
				WHERE
					`id`=" . $this -> id . "
					";
																																	//	echo $qw_issaugoti_nauja;
			$this -> db -> uzklausa ( $qw_pasalinti );		
		}
	}