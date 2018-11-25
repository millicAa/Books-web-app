<?php

      $curl_zahtev = curl_init("http://localhost/knjige/api/zanrovi");
      curl_setopt($curl_zahtev, CURLOPT_RETURNTRANSFER, 1);
      $curl_odgovor = curl_exec($curl_zahtev);
      //$json_objekat=json_decode($curl_odgovor, true);
      curl_close($curl_zahtev);
      echo $curl_odgovor;
 ?>
