<?php

 include 'init.php';

	//var_dump($knjigaZaOceniti);
	$poruka = '';
	if(isset($_POST['novaKnjiga'])){
		include 'domen/knjigaKlasa.php';
		$knjiga = new Knjiga($db);
		$sacuvano = $knjiga->novaKnjiga();
		$poruka = $knjiga->get_poruka();
	}
?>


<!DOCTYPE HTML>

<html>
	<head>
		<title>KnjigoLjubac</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing">
		<div id="page-wrapper">

				<?php include 'meni.php'; ?>

				<section id="banner">
					<h2>KnjigoLjubac</h2>
					<p>Vas personalni vodic kroz svet knjiga</p>
				</section>

				<section id="main" class="container">

					<section class="box special">
						<header class="major">
							<h2>Spisak procitanih knjiga</h2>
							<p>Ocene vecine knjiga cete moci da procitate na delu sa ocenama </p>
						</header>

						<form method="post" action="">
							<label for="naslov">Naslov</label>
							<input id="naslov" type="text" name="naslov" placeholder="Naslov">
							<br>
              <label for="autor">Autor</label>
							<input id="autor" type="text" name="autor" placeholder="Autor">
							<br>
              <label for="opis">Opis</label>
							<textarea id="opis" type="text" name="opis" rows="10" placeholder="opis"></textarea>
							<br>
							<label for="zanr">Zanr</label>
							<select id="zanr" name="zanr">
                <?php $zanrovi = $db->get('zanr');
                      foreach ($zanrovi as $zanr) {
                        ?>
                        <option value="<?php echo $zanr['zanrID'];?>"><?php echo $zanr['naziv'];?></option>
                        <?php
                      }
                 ?>
							</select>
							<br>
							<input type="submit" name="novaKnjiga" value="Unesi knjigu">
						</form>
						<?php if($poruka != ''){ echo $poruka['msg'] ;} ?>
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
					</section>


				</section>

				<?php include 'footer.php'; ?>

		</div>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollgress.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
