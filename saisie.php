﻿<?php session_start(); ?>

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
<script type="text/javascript">
function ajouteMateriau(value)
{
	if(!document.getElementById("mat" + document.getElementById('materiau').value.toString()) && document.getElementById('materiau').value != 0)
	{
		var cbx = document.getElementById('materiau').options[value].text;
		var ep = document.getElementById('epaisseur').value;
		var table = document.getElementById('listMateriaux');
		var ligne = document.createElement('tr');
		ligne.id = "mat" + document.getElementById('materiau').value.toString();
		var label = document.createElement('td');
		var epaisseur = document.createElement('td');
		var bouton = document.createElement('input');
		bouton.type = "image";
		bouton.setAttribute("class", "boutonSuppression");
		bouton.setAttribute("src", "images/supprimer.png");
		bouton.setAttribute("onClick", "supprimeLigne(listMateriaux, this)");
		
		var textLabel = document.createTextNode(cbx);
		var textEpaisseur = document.createTextNode(ep);
		label.appendChild(textLabel);
		epaisseur.appendChild(textEpaisseur);
		
		ligne.appendChild(label);
		ligne.appendChild(epaisseur);
		ligne.appendChild(bouton);
		
		table.appendChild(ligne);
	}
	else if(document.getElementById("mat" + document.getElementById('materiau').value.toString()))
	{
		alert("Ce métériau a déjà été ajouté.");
	}
}

function ajouteNature(value)
{
	if(!document.getElementById("nat" + document.getElementById('nature').value.toString()) && document.getElementById('nature').value != 0)
	{
		var cbx = document.getElementById('nature').options[value].text;
		var table = document.getElementById('listNatures');
		var ligne = document.createElement('tr');
		ligne.id = "nat" + document.getElementById('nature').value.toString();
		var label = document.createElement('td');
		var bouton = document.createElement('input');
		bouton.type = "image";
		bouton.setAttribute("class", "boutonSuppression");
		bouton.setAttribute("src", "images/supprimer.png");
		bouton.setAttribute("onClick", "supprimeLigne(listNatures, this)");
		
		var textLabel = document.createTextNode(cbx);
		label.appendChild(textLabel);
		ligne.appendChild(label);
		ligne.appendChild(bouton);
		
		table.appendChild(ligne);
	}
	else if(document.getElementById("nat" + document.getElementById('nature').value.toString()))
	{
		alert("Cette nature a déjà été ajoutée.");
	}
}

function ajoutePrestation(value)
{
	if(!document.getElementById("pre" + document.getElementById('prestation').value.toString()) && document.getElementById('prestation').value != 0)
	{
		var cbx = document.getElementById('prestation').options[value].text;
		var table = document.getElementById('listPrestations');
		var ligne = document.createElement('tr');
		ligne.id = "pre" + document.getElementById('prestation').value.toString();
		var label = document.createElement('td');
		var bouton = document.createElement('input');
		bouton.type = "image";
		bouton.setAttribute("class", "boutonSuppression");
		bouton.setAttribute("src", "images/supprimer.png");
		bouton.setAttribute("onClick", "supprimeLigne(listPrestations, this)");
		
		var textLabel = document.createTextNode(cbx);
		label.appendChild(textLabel);
		ligne.appendChild(label);
		ligne.appendChild(bouton);
		
		table.appendChild(ligne);
	}
	else if(document.getElementById("pre" + document.getElementById('prestation').value.toString()))
	{
		alert("Cette prestation a déjà été ajoutée.");
	}
}

function supprimeLigne(table, btn)
{
	var ligne = btn.parentNode;
	
	table.removeChild(ligne);
}

function change_onglet(name)
{
    document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
    document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
    document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
    document.getElementById('contenu_onglet_'+name).style.display = 'block';
    anc_onglet = name;
}
var anc_onglet = 'general';
change_onglet(anc_onglet);
</script>

<style>
</style>
</head>

<body>
	<div id="page">
		<div>
			<a href="accueil.php"><input id="home_bouton" type="image" src="images/bouton_accueil.png" /></a>
		</div>
		<div>
			<input id="save_bouton" type="image" src="images/save.png" />
		</div>
		<h1 id="centrer_titre">Saisie</h1>		
	
		<form>
			<div class="systeme_onglets">
				<div class="onglets">
					<span class="onglet_0 onglet" id="onglet_general" onclick="javascript:change_onglet('general');">Général</span>
					<span class="onglet_0 onglet" id="onglet_composants" onclick="javascript:change_onglet('composants');">Composants</span>
					<span class="onglet_0 onglet" id="onglet_remarque" onclick="javascript:change_onglet('remarque');">Remarques</span>
					<span class="onglet_0 onglet" id="onglet_qualite" onclick="javascript:change_onglet('qualite');">Qualité</span>
				</div>
				<div class="contenu_onglets">
					<div class="contenu_onglet" id="contenu_onglet_general">
						<div class="ligne">
							<div class="element">
								<p class="labelElement">Date :</p>
								<select name="commandeJour" class="valueElement">
									<?php
									for($i = 1; $i <= 31; $i++)
									{
										if($i == date("d"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<select name="commandeMois" class="valueElement">
									<?php
									for($i = 1; $i <= 12; $i++)
									{
										if($i == date("m"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<select name="commandeAnnee" class="valueElement">
									<?php
									for($i = 2010; $i <= date("Y") + 2; $i++)
									{
										if($i == date("Y"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
							</div>
							<div class="element">
								<p class="labelElement">N° commande :</p>
								<input type="text" name="numCommande" class="valueElement" />
							</div>
						</div>
						<div class="ligne">
							<div class="element">
								<p class="labelElement">Client :</p>
								<input class="valueElement" type="text" name="client" />
							</div>
							<div class="element">
								<p class="labelElement">Contremarque :</p>
								<input class="valueElement" type="text" name="contremarque" />
							</div>
							<div class="element">
								<p class="labelElement">Délai :</p>
								<select name="delaiJour" class="valueElement">
									<?php
									for($i = 1; $i <= 31; $i++)
									{
										if($i == date("d"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<select name="delaiMois" class="valueElement">
									<?php
									for($i = 1; $i <= 12; $i++)
									{
										if($i == date("m"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<select name="delaiAnnee" class="valueElement">
									<?php
									for($i = 2010; $i <= date("Y") + 2; $i++)
									{
										if($i == date("Y"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<br/>
								<select name="delaiHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="delaiMinute" class="valueElement">
									<?php
									for($i = 0; $i <= 59; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">m</label>
							</div>
						</div>
						<div class="ligne">
							<div class="element">
								<select id="prestation" class="composants">
									<?php
									echo '<option value=\'0\' selected>Prestations</option><br/>';
									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Identifier, Label FROM Finalisation Order By Label');
										
										while($donnees = $reponse->fetch())
										{
											echo '<option value='.$donnees['Identifier'].'>'.$donnees['Label'].'</option><br/>';
										}
										
										$reponse->closeCursor();
										
										$bdd=null;
									}
									catch (Exception $e)
									{
										die('Erreur : ' . $e->getMessage());
									}
									?>
								</select>
								<input class="composants" type="button" value="+" onclick="ajoutePrestation(prestation.selectedIndex)" />
								<br />
								<table id="listPrestations" border=1 style="margin:1%;">
									<th style="width:auto;">Prestation</th>
									<th style="width:auto;"/>
								</table>
							</div>
							<div class="element">
								<p class="labelElement">Achèvement :</p>
								<select name="achevJour" class="valueElement">
									<?php
									for($i = 1; $i <= 31; $i++)
									{
										if($i == date("d"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<select name="achevMois" class="valueElement">
									<?php
									for($i = 1; $i <= 12; $i++)
									{
										if($i == date("m"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<select name="achevAnnee" class="valueElement">
									<?php
									for($i = 2010; $i <= date("Y") + 2; $i++)
									{
										if($i == date("Y"))
										{
											echo '<option value='.$i.' selected>'.$i.'</option><br/>';
										}
										else
										{
											echo '<option value='.$i.'>'.$i.'</option><br/>';
										}
									}
									?>
								</select>
								<br/>
								<select name="achevHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="achevMinute" class="valueElement">
									<?php
									for($i = 0; $i <= 59; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">m</label>
							</div>
						</div>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_composants">
						<div class="ligne">
							<div class="element">
								<select id="materiau" class="composants">
									<?php
									echo '<option value=\'0\' selected>Matériaux</option><br/>';
									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Identifier, Label FROM Materiau Order By Label');
										
										while($donnees = $reponse->fetch())
										{
											echo '<option value='.$donnees['Identifier'].'>'.$donnees['Label'].'</option><br/>';
										}
										
										$reponse->closeCursor();
										
										$bdd=null;
									}
									catch (Exception $e)
									{
										die('Erreur : ' . $e->getMessage());
									}
									?>
								</select>
								<select id="epaisseur" class="composants">
									<?php
									echo '<option value=\'0\' selected>Épaisseur</option><br/>';
									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Value FROM Epaisseur Order By Value');
										
										while($donnees = $reponse->fetch())
										{
											echo '<option value='.$donnees['Value'].'>'.$donnees['Value'].'</option><br/>';
										}
										
										$reponse->closeCursor();
										
										$bdd=null;
									}
									catch (Exception $e)
									{
										die('Erreur : ' . $e->getMessage());
									}
									?>
								</select>
								<input class="composants" type="button" value="+" onclick="ajouteMateriau(materiau.selectedIndex)" />
								<br/>
								<table id="listMateriaux" border=1 style="margin:1%;">
									<th style="width:auto;">Matériau</th>
									<th style="width:auto;">MM</th>
									<th style="width:auto;"/>
								</table>
							</div>
						</div>
						<div class="ligne">
							<div class="element">
								<select id="nature" class="composants">
									<?php
									echo '<option value=\'0\' selected>Natures</option><br/>';
									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Identifier, Label FROM Nature Order By Label');
										
										while($donnees = $reponse->fetch())
										{
											echo '<option value='.$donnees['Identifier'].'>'.$donnees['Label'].'</option><br/>';
										}
										
										$reponse->closeCursor();
										
										$bdd=null;
									}
									catch (Exception $e)
									{
										die('Erreur : ' . $e->getMessage());
									}
									?>
								</select>
								<input class="composants" type="button" value="+" onclick="ajouteNature(nature.selectedIndex)" />
								<br />
								<table id="listNatures" border=1 style="margin:1%;">
									<th style="width:auto;">Nature</th>
									<th style="width:auto;"/>
								</table>
							</div>
						</div>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_remarque">
						
					</div>
					<div class="contenu_onglet" id="contenu_onglet_qualite">
						
					</div>
				</div>
			</div>
		</form>
	</div>

	<?php include("pied_de_page.php"); ?>

</body>
</html>
