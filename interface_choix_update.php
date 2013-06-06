<?php session_start(); ?>

<?php
if(empty($_SESSION['login']))
{
	header('location:index.php');
}
?>

<?php
function chargerClasse($classe)
{
	require 'classes/'.$classe.'.classe.php';
}
spl_autoload_register('chargerClasse');
?>

<?php
$commande = unserialize($_SESSION['UpdCommande']);					 
$existe = $commande->isExisteCommande();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Refresh" content="3;URL=accueil.php" />

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
		
		<?php
			
		if($_SESSION['IsAddCmd'])
		{
			$commande->update();
		}
		elseif($_SESSION['IsUpdCmd'])
		{
			$commande->limitUpdate();
		}
		
		echo '<h1 id="centrer_titre">Mayenne <br /> Granits</h1>
		<br /> <br /> <br /><br /> <br /> <br />
		<h2 style="margin-bottom:20%;">La commande n°'.$commande->getNumeroCommande().' a été modifiée avec succès. <br /> <br /> Vous allez être redirigé automatiquement.</h2>';

		?>
	</div>

</body>
</html>
