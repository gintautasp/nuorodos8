<?php

	$dir_bendra = realpath ( __DIR__ . '/../bendram/' ) . '/';
	
	include $dir_bendra . 'duomenu_baze.class.php';
	
	$db = new DuomenuBaze ( 'nuorodos8' );
	
	if ( isset ( $_GET [ 'i' ] ) && ( intval ( $_GET [ 'i' ] ) > 0 ) ) {
	
		$qw_gauti_nuoroda =
				"
			SELECT 
				*
			FROM
				`nuorodos`
			WHERE
				`id`= " . intval ( $_GET [ 'i' ] ) . "
				";
			$rs_list = $db -> uzklausa ( $gw_gauti_sarasa );
			
			if ( $row = $rs_list -> fetch_assoc() ) {
					
				echo json_stringify ( $row );
			}
	}