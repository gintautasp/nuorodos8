<?php

	class Nuoroda extends  ModelDb {
	
		public $nuoroda, $pav, $aprasymas, $zymos, $id;
	
		public function __construct( $nuoroda, $pav, $aprasymas, $zymos, $id = 0 ) {
		
			parent::__construct();
			
			$this -> nuoroda = $nuoroda;
			$this -> pav = $pav;
			$this -> aprasymas = $aprasymas;
			$this -> zymos = $zymos;
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
																																		// echo $qw_issaugoti_nauja;
			$this -> db -> uzklausa ( $qw_issaugoti_nauja );
		}
	
	}