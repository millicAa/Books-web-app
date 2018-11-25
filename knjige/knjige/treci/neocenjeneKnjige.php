<?php include 'init.php'; ?>


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
							$knjige = $db->rawQuery('select * from knjiga k join zanr z on k.zanrID = z.zanrID where k.knjigaID not in (select knjigaID from ocena)');
							//var_dump($knjige);
						?>
						<table>
							<thead>
								<tr>
									<th>KnjigaID</th>
									<th>Naslov</th>
									<th>Autor</th>
									<th>Opis</th>
									<th>Zanr</th>
									<th>Oceni</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($knjige as $k){ ?>
									<tr>
										<td><?php echo $k['knjigaID']; ?></td>
										<td><?php echo $k['naslov']; ?></td>
										<td><?php echo $k['autor']; ?></td>
										<td><?php echo $k['opis']; ?></td>
										<td><?php echo $k['naziv']; ?></td>
										<td><a href="oceni.php?id=<?php echo $k['knjigaID']; ?>">Oceni</a></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
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
