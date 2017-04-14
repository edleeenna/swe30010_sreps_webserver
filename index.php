<!DOCTYPE html>
<html>

<header>
	<title>PHP - SRePS</title>
	<nav class="nav-extended">
		<?php
		echo($_SERVER[ 'DOCUMENT_ROOT' ]);
		include '/includes/head.php';
		?>
	</nav>
</header>

<main>

	<body>
		<div style="text-align:center">
			<p>
				<a class="waves-effect waves-light btn-large disabled" href="sales/quick_sale.php">Quick Sale</a>
				<a class="waves-effect waves-light btn-large" href="search.php">Search</a>
				<a class="waves-effect waves-light btn-large" href="stock/manage.php">Manage Stock</a>
			</p>
			<p> <a class="waves-effect waves-light btn-large disabled" href="stock/predictions.php">Predictions</a> <a class="waves-effect waves-light btn-large disabled" href="support.php">Support</a> </p>
		</div>
	</body>
</main>

<footer>
	<?php
	include $_SERVER[ 'DOCUMENT_ROOT' ] . '/wwwroot/includes/tail.php';
	?>
</footer>

</html>