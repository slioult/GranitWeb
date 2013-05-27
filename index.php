<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include 'style/Mobile_Detect.php';
$detect = new Mobile_Detect();
if ($detect->isMobile() OR $detect->isTablet())
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style/mobile_style.css\" media=\"screen\" />";
}
else
{
	echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style/style.css\" media=\"screen\" />";
}
?>
<title>Mayenne Granits</title>
<script>

</script>


<style>
</style>
</head>

<body>
	<div id="page">
		<h1 id="centrer_titre">Mayenne <br /> Granits</h1>
		<br />
		<br />
		<br />
		<form method="post" action="accueil.php" >
			<p>Identifiant :<br />
			<input class="authentification" type="text" name="login" /></p>
			<p>Mot de passe :<br />
			<input class="authentification" type="password" name="password" /></p>
			<br />
			<br />
			<br />
			<div id="btn">
				<input class="bouton" type="submit" name="btnConnect" value="Connexion" />
			</div>
		</form>
	</div>

	<?php include("pied_de_page.php"); ?>

</body>
</html>
