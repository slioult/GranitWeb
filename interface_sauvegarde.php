<?php session_start(); ?>

<?php
if(empty($_SESSION['login']))
{
	header('location:index.php');
}
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
		function chargerClasse($classe)
		{
			require 'classes/'.$classe.'.classe.php';
		}
		spl_autoload_register('chargerClasse');
		?>
		
		<?php		
		$id = $_POST['idCommande'];
		$dateCommande = new MyTime($_POST['commandeJour'], $_POST['commandeMois'], $_POST['commandeAnnee']);
		$numCmd = $_POST['numCommande'];
		$etat = new Etat(intval($_POST['etat'], 10));
		$client = new Client(0, strtoupper($_POST['client']));
		$contremarque = new Contremarque(0, strtoupper($_POST['contremarque']));
		$delai = new MyTime($_POST['delaiJour'], $_POST['delaiMois'], $_POST['delaiAnnee']);
		$prestations = array();
		for($i = 1; $i <= $_POST['countPrestations']; $i++)
		{
			$prest = new Prestation($_POST['pre'.$i]);
			array_push($prestations, $prest);
		}
		$datePrestations = new MyTime($_POST['achevJour'], $_POST['achevMois'], $_POST['achevAnnee'], $_POST['achevHeure'], $_POST['achevMinute'], 00);
		$releve = new Mesure($_POST['releve']);
		$dateReleve = new MyTime($_POST['releveJour'], $_POST['releveMois'], $_POST['releveAnnee'], $_POST['releveHeure'], $_POST['releveMinute'], 00);
		$tpsDebit = $_POST['debitHeure'] * 60 + $_POST['debitMinute'];
		$tpsCmdNumerique = $_POST['cmdNumeriqueHeure'] * 60 + $_POST['cmdNumeriqueMinute'];
		$tpsFinition = $_POST['finitionHeure'] * 60 + $_POST['finitionMinute'];
		$tpsAutres = $_POST['autresHeure'] * 60 + $_POST['autresMinute'];
		$montant = $_POST['montant'];
		$arrhes = $_POST['arrhes'];
		$adresse = $_POST['adresse'].';'.$_POST['cp'].';'.$_POST['ville'];
		
		$materiaux = array();
		for($i = 1; $i <= $_POST['countMateriaux']; $i++)
		{
			$array = explode(";", $_POST['mat'.$i]);
			$mat = new Materiau($array[0], '', $array[1]);
			array_push($materiaux, $mat);
		}
		
		$natures = array();
		for($i = 1; $i <= $_POST['countNatures']; $i++)
		{
			$nat = new Nature($_POST['nat'.$i]);
			array_push($natures, $nat);
		}
		
		$remarques = array();
		for($i = 1; $i <= $_POST['countRemarques']; $i++)
		{
			$array = explode(";", $_POST['rem'.$i]);
			$rem = new Remarque(0, $array[0], str_replace("/", "-", str_replace("h", ":", $array[1]).':00'), $array[2]);
			array_push($remarques, $rem);
		}
		
		$pbQualites = array();
		for($i = 1; $i <= $_POST['countQualites']; $i++)
		{
			$array = explode(";", $_POST['qlt'.$i]);
			$pbQlt = new ProblemeQlt(0, $array[0], str_replace("/", "-", str_replace("h", ":", $array[1]).':00'), new Qualite($array[2]), $array[3]);
			array_push($pbQualites, $pbQlt);
		}
		
		$commande = new Commande($id,
								 $numCmd,
								 $montant,
								 $arrhes,
								 $dateCommande,
								 $adresse,
								 $tpsDebit,
								 $tpsCmdNumerique,
								 $tpsFinition,
								 $tpsAutres,
								 $delai,
								 $etat,
								 $client,
								 $contremarque,
								 $releve,
								 $dateReleve,
								 $materiaux,
								 $natures,
								 $prestations,
								 $datePrestations,
								 $remarques,
								 $pbQualites);
		$commande->ajoute();
		echo '<h1 id="centrer_titre">Mayenne <br /> Granits</h1>
		<br /> <br /> <br /><br /> <br /> <br />
		<h2 style="margin-bottom:20%;">La commande n°'.$commande->getNumeroCommande().' a été ajoutée avec succès. <br /> <br /> Vous allez être redirigé automatiquement.</h2>';
		?>
	</div>

</body>
</html>
