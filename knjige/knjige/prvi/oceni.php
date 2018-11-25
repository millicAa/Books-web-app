<?php

 include 'init.php';
	if(!isset($_GET['id'])){
		header("Location: neocenjeneKnjige.php");
	}
	$db->where("knjigaID",$_GET['id']);
	$knjigaZaOceniti = $db->getOne('knjiga');
	//var_dump($knjigaZaOceniti);
	$poruka = '';
	if(isset($_POST['novaOcena'])){
		include 'domen/ocenaKlasa.php';
		$ocena = new Ocena($db);
		$sacuvano = $ocena->novaOcena($_GET['id']);
		$poruka = $ocena->get_poruka();
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
							<p>Ocene vecine knjiga cete moci da procitate na delu sa ocenama <br/> <a href="ocene.php"> Ocene </a></p>
						</header>
						<?php
							echo ("Knjga koja je ocenjuje je <b>".$knjigaZaOceniti['naslov']."</b> koju je napisao <b>".$knjigaZaOceniti['autor']."</b>") ;
						?>
						<form method="post" action="">
							<label for="razlog">Razlog ocene</label>
							<input id="razlog" type="text" name="razlog" placeholder="Razlog ocene">
							<br>
							<label for="visina">Visina ocene</label>
							<select id="visina" name="visina">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
							</select>
							<br>
							<input type="submit" name="novaOcena" value="Unesi ocenu">
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
