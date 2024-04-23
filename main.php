<?php

	/*
		tikrinti užklausos duomenis
		
		jei užklausa sukurti nauja nuoroda 
			sukurti naują nuoroda
			
		jei užklausa redaguoti nuoroda
			išsaugoti pakeistą nuorodą
		
		jei užklausa pašalinti nuorodą
			pasalinti nuorodą
			
		gauti nuorodas
	*/
	$dir_bendra = realpath ( __DIR__ . '/../bendram/' ) . '/';
	
	include $dir_bendra . 'duomenu_baze.class.php';
	
	$db = new DuomenuBaze ( 'nuorodos8' );
	
	include $dir_bendra . 'model_db.class.php';
	
	include 'class/nuoroda.php';
	
	include $dir_bendra . 'controller.class.php';	
	include 'class/nuorodu_app.php';
	
	$nuorodu_app = new NuoroduApp();	
	
	$nuorodu_app -> tikrintiUzklausuDuomenis();
	
	if ( $nuorodu_app -> arSukurtiNaujaNuoroda() ) {
	
		$nuorodu_app -> sukurtiNaujaNuoroda();
	}
	
	if ( $nuorodu_app -> arPakeistiEsamaNuoroda() ) {
	
		$nuorodu_app -> pakeistiEsamaNuoroda();
	}	
	
	if ( $nuorodu_app -> arPasalintiNuoroda() ) {
	
		$nuorodu_app -> pasalintiNuoroda();
	}	
	
	$nuorodu_app -> gautiDuomenis();
	
	include 'main.html.php';