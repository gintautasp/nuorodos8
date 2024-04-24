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
	
	}