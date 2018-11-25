<?php
include 'init.php';
$sort = "";
if(isset($_GET['sort'])){
	if($_GET['sort'] == 'asc'){
		$sort = " order by o.visina asc";
	}
	if($_GET['sort'] == 'desc'){
		$sort = " order by o.visina desc";
	}
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
							<p>Ocene vecine knjiga cete moci da procitate na delu sa ocenama <br/>
								<a href="ocene.php?sort=asc"> Sortiraj rastuce </a> <a href="ocene.php?sort=desc"> Sortiraj opadajuce </a></p>
						</header>
						<?php
							$knjige = $db->rawQuery('select * from ocena o join knjiga k on o.knjigaID=k.knjigaID join zanr z on k.zanrID = z.zanrID '.$sort);
							//var_dump($knjige);
						?>
						<table>
							<thead>
								<tr>
									<th>KnjigaID</th>
									<th>Naslov</th>
									<th>Autor</th>
									<th>Zanr</th>
									<th>Ocena</th>
									<th>Razlog</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($knjige as $k){ ?>
									<tr>
										<td><?php echo $k['knjigaID']; ?></td>
										<td><?php echo $k['naslov']; ?></td>
										<td><?php echo $k['autor']; ?></td>
										<td><?php echo $k['naziv']; ?></td>
										<td><?php echo $k['visina']; ?></td>
										<td><?php echo $k['razlog']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>
						<h2> Spisak zanrova </h2>
						<div id="tabela"> </div>
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
			<script>

						function prikazZanrova(){
							$.ajax({
								url: "generisiZanrove.php",
								success: function(result){
								var text = '<table class="table"><thead><tr><th>Zanr ID</th><th>Naziv zanra</th></tr></thead><tbody>';
								$.each($.parseJSON(result), function(i, val) {
									text += '<tr>';
									text += '<td>'+val.zanrID+'</td>';
									text += '<td>'+val.naziv+'</td>';
									text += '</tr>';

									});

									text+='</tbody></table>';
									$('#tabela').html(text);
							}});
						}

			</script>
			<script>
					$( document ).ready(function() {
						prikazZanrova();
					});
			</script>
	</body>
</html>
