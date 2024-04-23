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
	include '../bendram/duomenu_baze.class.php';
	
	$db = new DuomenuBaze ( 'nuorodos8' );
	
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
	
	$nuorodu_app -> gautiNuorodas();
	
	include 'main.html.php';