<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Lekkende Kranen Empirium</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Paul Wagener">

    <link id="callCss" rel="stylesheet" href="/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/themes/css/base.css" rel="stylesheet" media="screen"/>
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="/themes/css/font-awesome.css" rel="stylesheet" type="text/css">

  <!-- De code in dit bestand is met opzet slecht en zeer onveilig opgezet.
       GEBRUIK DEZE CODE NIET als referentiemateriaal voor je eigen PHP projecten! -->
  </head>

<body>
<div id="header">
<div class="container">

<div id="welcomeLine" class="row">
</div>

<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>
  <div class="navbar-inner">
    <a class="brand" href="/webshop"><img src="/themes/images/logo.png" alt="Leaky's Kranen Emporium"/></a>
		<form class="form-inline navbar-search" method="post" action="products.html" >
    </form>
    <ul id="topMenu" class="nav pull-right">

    </ul>
  </div>
</div>
</div>
</div>

<!-- Header End====================================================================== -->
<div id="mainBody">
	<div class="container">
	<div class="row">

	<div class="span12">



<?php

/**
 * Maak verbinding met de database
 */
$connection = new mysqli('localhost', 'webshop', 'pass', 'webshop')
    or die('Kan geen verbinding maken met MySQL');

$query = 'SELECT naam, afbeelding, beschrijving, prijs FROM producten WHERE id = ' . $connection->real_escape_string($_GET['id']);

$result = $connection->query($query)
  or die('<div class="alert alert-danger">Query error: <pre>' . $connection->error . '</pre>Query: <code>' . $query . '</code> </div>');

$row = $result->fetch_array();

$connection->close();
?>

<div class="row">

		<div id="gallery" class="span3">
		<a href="/webshop/image_zoom.php?image=<?php echo $row['afbeelding'] ?>">
		 <img src="/themes/images/products/<?php echo $row['afbeelding'] ?>" style="width:100%"/>
		</a>
        </div>
		<div class="span6">
			<h3><?php echo $row['naam'] ?></h3>
			<small><?php echo $row['beschrijving'] ?></small>
			<hr class="soft"/>
			<form class="form-horizontal qtyFrm">
			  <div class="control-group">
				<label class="control-label"><span>&euro;<?php echo $row['prijs'] ?></span></label>
			</form>

			<hr class="soft"/>
			<h4>Dit item is op voorraad</h4>
		</div>

</div>



</div>
</div>
<!-- MainBody End ============================= -->
</body>
</html>
