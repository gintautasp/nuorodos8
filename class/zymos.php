<?php

	class Zymos extends  ModelDbSarasas  {
	
		public function __construct() {
		
			parent::__construct();
		}
		
		public function atnaujintiZymas( $zymos ) {
		
			$lst_zymos = explode ( ',', $zymos );
			
			$i = 0;
			foreach ( $lst_zymos as $zyma ) {
			
				$lst_zymos [ $i ] = trim ( $zyma );
				$i++;
			}
			
			if ( ( $lst_zymos ) && ( $lst_zymos [ 0 ] != '' ) ) {
			
				$qw_iterpti_zymas =
						"
					INSERT INTO `zymos` ( `zyma` )
					VALUES (
						'" . implode ( "' ), ( '", $lst_zymos ) . "'
					)
					ON DUPLICATE KEY UPDATE `kiek_kartojasi`=`kiek_kartojasi`+1
						";
																																			// echo $qw_iterpti_zymas;						
				$this -> db -> uzklausa ( $qw_iterpti_zymas );
			}
		}
		
		public function gautiSarasaIsDuomenuBazes() {

		}		
	}