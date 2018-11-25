<?php

include 'init.php';
$zanrovi = $db->get('zanr');
echo json_encode($zanrovi);
 ?>
