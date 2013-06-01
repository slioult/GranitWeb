<?php session_start(); ?>

<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
	$reponse = $bdd->query('SELECT Login, Password, IsAddCmd, IsUpdCmd, IsDispCA FROM Session');
	if (!empty($_POST['login']) AND !empty($_POST['password']))
	{
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$isOk = False;
		
		while($donnees = $reponse->fetch() AND ! $isOk)
		{
			if($donnees['Login'] == $login AND $donnees['Password'] == md5($password))
			{
				$isOk = True;
				$_SESSION['login'] = $login;
				$_SESSION['password'] = $password;
				$_SESSION['IsAddCmd'] = $donnees['IsAddCmd'];
				$_SESSION['IsUpdCmd'] = $donnees['IsUpdCmd'];
				$_SESSION['IsDispCA'] = $donnees['IsDispCA'];
				$_SESSION['quit'] = False;
			}
		}
		
		$reponse->closeCursor();
		
		if(! $isOk)
		{
			header('location:connectError.php');
		}
	}
	elseif(empty($_SESSION['login']))
	{
		header('location:connectError.php');
	}
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
?>

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

<div id="page" >
		<div id="titre">
			<h1 id="titre">Mayenne <br /> Granits</h1>
		</div>
		<div id="deconnexion">
			<div class="bouton"><?php echo $_SESSION['login']; ?></div>
			<form method="post" action="interface.php">
				<input class="bouton" type="submit" value="Déconnexion" name="disconect" id="disconect" style="font-size:200%;" >
			</form>
		</div>
		<div id="menu">
			<div id="smenu">
				<input class="bouton" type="button" value="Rechercher une commande" onclick="self.location.href='recherche.php'" style="min-width:80%;margin-bottom:10%;" > 
				<?php
				if($_SESSION['IsAddCmd'])
				{
					echo '<input class="bouton" type="button" value="Saisir une commande" onclick="self.location.href=\'saisie.php\'" style="min-width:80%;" >';
				}
				?>
			</div>
		</div>
	</div>

	<?php include("pied_de_page.php"); ?>
</body>
</html>
