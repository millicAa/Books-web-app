<?php

 include 'init.php';
 if(!isset($_GET['ocenaID'])){
   header("Location: brisanjeIIzmenaOcena.php");
 }
 $db->where("ocenaID",$_GET['ocenaID']);
 $ocenaIzmena = $db->getOne('ocena');
 include 'domen/ocenaKlasa.php';
 $ocena = new Ocena($db);
 $sacuvano = $ocena->brisanje($_GET['ocenaID']);
 header("Location:ocene.php");
?>
