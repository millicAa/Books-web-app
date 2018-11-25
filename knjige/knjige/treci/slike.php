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
						<div id="slike"></div>
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
			<script>
			        var id = '5a08cf9eff1293b0fb4d';
			        var idSecret = '9780ddbd6c6ec2b936a0fc0251df4a27954db11e';
			        var auto = 'Basic ' + window.btoa(id + ':' + idSecret);

			            $.ajax({
			              url: "https://api.shutterstock.com/v2/images/search?per_page=50&query=books&view=full",
			              headers: {
			                Authorization: auto
			              },
			              success: function(result){
			                var text = '<div>';
			              $.each(result.data, function (i, item) {
			                text +='<div><h1>'+item.description+'</h1><img src="'+item.assets.preview["url"]+'"></div>';
			            });
			            text+= "</div>"
			            $('#slike').html(text);
			            }});


          </script>
	</body>
</html>
