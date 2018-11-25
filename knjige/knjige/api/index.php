<?php
require 'flight/Flight.php';
require 'jsonindent.php';


Flight::route('/', function(){

	echo('Popis ruta: <br>');
	echo('------------ <br>');

	echo('GET zanrovi <br>');
	echo('GET knjige <br>');
	echo('POST ocene <br>');
});

Flight::register('db', 'Database', array('niz'));

Flight::route('GET /zanrovi', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiZanrove();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});

Flight::route('GET /knjige', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$db->vratiKnjige();

	$niz =  array();
	$iterator = 0;
	while ($red = $db->getResult()->fetch_object())
	{
		$niz[$iterator] = $red;
		$iterator += 1;
	}

	echo indent(json_encode($niz));
});



Flight::route('POST /ocene', function()
{
	header("Content-Type: application/json; charset=utf-8");
	$db = Flight::db();
	$post_data = file_get_contents('php://input');
	$json_data = json_decode($post_data,true);
	$db->novaOcena($json_data);
	if($db->getResult())
	{
		$response = "Uspesno!";
	}
	else
	{
		$response = "Neuspesno";

	}

	echo indent(json_encode($response));

});

Flight::start();
?>
