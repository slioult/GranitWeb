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
		<div>
			<a href="accueil.php"><input id="home_bouton" type="image" src="images/bouton_accueil.png" /></a>
		</div>
		<h1 id="centrer_titre">Recherche</h1>
		<form method="post" action="recherche.php">
			<input class="recherche" type="text" value="Client" name="client" />
			<input class="recherche" type="text" value="Contremarque" name="contremarque" />
			<select class="recherche" name="etat" >
				<option value="0">En cours</option>
				<option value="Terminée">Terminées</option>
				<option value="Rendue">Rendues</option>
				<option value="1">Toutes</option>
			</select>
			<br />
			<input class="recherche" type="submit" value="Rechercher" />
		</form>
		
		<hr />
		
		<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		
			if((!empty($_POST['client']) AND $_POST['client'] != 'Client' OR !empty($contremarque) AND $contremarque != 'Contremarque') OR $_POST['etat'] != "1")
			{		
				if($_POST['etat'] != "0" AND $_POST['etat'] != "1")
				{
					$cond = 'e.Label=\''.$_POST['etat'].'\'';
				}
				elseif($_POST['etat'] == "0")
				{
					$cond = 'e.Label<>\'Terminée\' AND e.Label<>\'Rendue\'';
				}
				else
				{
					$cond='e.Label<>\'\'';
				}
				
				if($_POST['client'] != '' AND $_POST['contremarque'] != '' AND $_POST['client'] != 'Client' AND $_POST['contremarque'] != 'Contremarque')
				{
					$reponse = $bdd->prepare('SELECT c.NumCmd, c.Montant, c.DelaiPrevu, e.Label, cl.Nom as cli, cm.Nom as cmq
											FROM Commande as c 
											INNER JOIN Etat as e ON e.Identifier = c.IdentifierEtat
											INNER JOIN Client as cl ON cl.Identifier = c.IdentifierClient
											INNER JOIN Contremarque as cm ON cm.Identifier = c.IdentifierContremarque
											WHERE cl.Nom Like ? AND cm.Nom Like ? AND '.$cond.' 
											Order By c.DelaiPrevu');
					
					$reponse->execute(array("%".$_POST['client']."%", "%".$_POST['contremarque']."%"));
				}
				elseif(!empty($_POST['client']) AND $_POST['client'] != 'Client')
				{
					$reponse = $bdd->prepare('SELECT c.NumCmd, c.Montant, c.DelaiPrevu, e.Label, cl.Nom as cli, cm.Nom as cmq
											FROM Commande as c 
											INNER JOIN Etat as e ON e.Identifier = c.IdentifierEtat
											INNER JOIN Client as cl ON cl.Identifier = c.IdentifierClient
											INNER JOIN Contremarque as cm ON cm.Identifier = c.IdentifierContremarque
											WHERE cl.Nom Like ? AND '.$cond.' 
											Order By c.DelaiPrevu');
											
					$reponse->execute(array("%".$_POST['client']."%"));
				}
				elseif(! empty($_POST['contremarque']) AND $_POST['contremarque'] != 'Contremarque')
				{
					$reponse = $bdd->prepare('SELECT c.NumCmd, c.Montant, c.DelaiPrevu, e.Label, cl.Nom as cli, cm.Nom as cmq
											FROM Commande as c 
											INNER JOIN Etat as e ON e.Identifier = c.IdentifierEtat
											INNER JOIN Client as cl ON cl.Identifier = c.IdentifierClient
											INNER JOIN Contremarque as cm ON cm.Identifier = c.IdentifierContremarque
											WHERE cm.Nom Like ? AND '.$cond.' 
											Order By c.DelaiPrevu');
											
					$reponse->execute(array("%".$_POST['contremarque']."%"));
				}
				else
				{
					$reponse = $bdd->query('SELECT c.NumCmd, c.Montant, c.DelaiPrevu, e.Label, cl.Nom as cli, cm.Nom as cmq
											FROM Commande as c 
											INNER JOIN Etat as e ON e.Identifier = c.IdentifierEtat
											INNER JOIN Client as cl ON cl.Identifier = c.IdentifierClient
											INNER JOIN Contremarque as cm ON cm.Identifier = c.IdentifierContremarque
											WHERE '.$cond.' 
											Order By c.DelaiPrevu');
				}
				
				
				echo '<p id="afficheNbResult">Nombre de résultats : '.$reponse->rowCount().'</p>';
				
				echo 	'<table border="1">
							<th>n°</th>
							<th>Client<br/>Contremarque</th>
							<th>État</th>
							<th>Délai</th>';
							
				while($donnees = $reponse->fetch())
				{
					echo '<tr>
							<td>'.$donnees['NumCmd'].'</td>
							<td>'.$donnees['cli'].'<br/>'.$donnees['cmq'].'</td>
							<td>'.$donnees['Label'].'</td>
							<td>'.date("d/m/Y", strtotime($donnees['DelaiPrevu'])).'</td>
						  </tr>';
				}
				
				$reponse->closeCursor();
				
				echo	'</table>';
			}
			elseif($_POST['etat'] == "1")
			{
				echo '<p id="stopRequeteTousEtats">Désolé, vous ne pouvez pas excuter une requête sur tous les états sans préciser votre demande.</p>';
			}
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		?>
		
	</div>

	<?php include("pied_de_page.php"); ?>

</body>
</html>
