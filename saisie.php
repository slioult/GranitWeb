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
		bouton.setAttribute("onClick", "supprimeLigne(listMateriaux, this, 'Materiaux')");
		
		var count = document.getElementsByName('countMateriaux')[0].value;
		count = parseInt(count) + 1;
		document.getElementsByName('countMateriaux')[0].value = count;
		var id = document.createElement('input');
		id.type = "hidden";
		id.value = document.getElementById('materiau').value + ';' + ep;
		id.name = 'mat' + count;
		
		var textLabel = document.createTextNode(cbx);
		var textEpaisseur = document.createTextNode(ep);
		label.appendChild(textLabel);
		epaisseur.appendChild(textEpaisseur);
		
		ligne.appendChild(id);
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
		bouton.setAttribute("onClick", "supprimeLigne(listNatures, this, 'Natures')");
		
		var count = document.getElementsByName('countNatures')[0].value;
		count = parseInt(count) + 1;
		document.getElementsByName('countNatures')[0].value = count;
		var id = document.createElement('input');
		id.type = 'hidden';
		id.value = document.getElementById('nature').value;
		id.name = 'nat' + count;
		
		var textLabel = document.createTextNode(cbx);
		label.appendChild(textLabel);
		ligne.appendChild(id)
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
		bouton.setAttribute("onClick", "supprimeLigne(listPrestations, this, 'Prestations')");
		
		var count = document.getElementsByName('countPrestations')[0].value;
		count = parseInt(count) + 1;
		document.getElementsByName('countPrestations')[0].value = count;
		var id = document.createElement('input');
		id.type = "hidden";
		id.value = document.getElementById('prestation').value;
		id.name = 'pre' + count;
		
		var textLabel = document.createTextNode(cbx);
		ligne.appendChild(id);
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

function ajouteRemarque(remarque, session)
{
	var table = document.getElementById('listRemarques');
	
	var ligne = document.createElement('tr');
	
	var cellSource = document.createElement('td');
	var cellDate = document.createElement('td');
	var cellRemarque = document.createElement('td');
	
	var dateHeure = getDateHeure();
	var textSource = document.createTextNode(session);
	var textDate = document.createTextNode(dateHeure);
	var textRemarque = document.createTextNode(remarque);
	
	cellSource.appendChild(textSource);
	cellDate.appendChild(textDate);
	cellRemarque.appendChild(textRemarque);
	
	var count = document.getElementsByName('countRemarques')[0].value;
	count = parseInt(count) + 1;
	document.getElementsByName('countRemarques')[0].value = count;
	var id = document.createElement('input');
	id.type = "hidden";
	id.value = session + ';' + dateHeure + ';' + remarque;
	id.name = 'rem' + count;
	
	ligne.appendChild(id);
	ligne.appendChild(cellSource);
	ligne.appendChild(cellDate);
	ligne.appendChild(cellRemarque);
	
	table.appendChild(ligne);
}

function ajouteQualite(commentaire, session, value)
{
	var table = document.getElementById('listQualites');
	
	var ligne = document.createElement('tr');
	
	var cellSource = document.createElement('td');
	var cellDate = document.createElement('td');
	var cellQualite = document.createElement('td');
	var cellCommentaire = document.createElement('td');
	
	var pbQualite = document.getElementById('qualite').options[value].text;
	var dateHeure = getDateHeure();
	var textSource = document.createTextNode(session);
	var textDate = document.createTextNode(dateHeure);
	var textQualite = document.createTextNode(pbQualite);
	var textRemarque = document.createTextNode(commentaire);
	
	cellSource.appendChild(textSource);
	cellDate.appendChild(textDate);
	cellQualite.appendChild(textQualite);
	cellCommentaire.appendChild(textRemarque);
	
	var count = document.getElementsByName('countQualites')[0].value;
	count = parseInt(count) + 1;
	document.getElementsByName('countQualites')[0].value = count;
	var id = document.createElement('input');
	id.type = "hidden";
	id.value = session + ';' + dateHeure + ';' + document.getElementById('qualite').value + ';' + commentaire;
	id.name = 'qlt' + count;
	
	ligne.appendChild(id);
	ligne.appendChild(cellSource);
	ligne.appendChild(cellDate);
	ligne.appendChild(cellQualite);
	ligne.appendChild(cellCommentaire);
	
	table.appendChild(ligne);
}

function getDateHeure()
{
	var today = new Date();
	var jour = today.getDate();
	var mois = today.getMonth() + 1;
	var annee = today.getFullYear();
	if(jour < 10){jour='0'+jour} if(mois < 10){mois='0'+mois} today = jour + '/' + mois + '/' + annee;
	
	var hour = new Date();
	var heure = hour.getHours();
	var minute;
	if(hour.getMinutes() < 10){minute = '0' + hour.getMinutes()} else{minute = hour.getMinutes()};
	
	var date = today + ' ' + heure + 'h' + minute;
	
	return date;
}

function supprimeLigne(table, btn, type)
{
	var ligne = btn.parentNode;
	
	table.removeChild(ligne);
	
	count = document.getElementsByName('count' + type)[0].value;
	count = parseInt(count) - 1;
	document.getElementsByName('count' + type)[0].value = count;
}

function change_onglet(name)
{
    document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
    document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
    document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
    document.getElementById('contenu_onglet_'+name).style.display = 'block';
    anc_onglet = name;
}

function envoi()
{
	
	submit();
}

var session;
init();
var anc_onglet = 'general';

<?php echo '
function init()
{
	session = \''.$_SESSION['login'].'\';
}
';?>
</script>

<style>
</style>
</head>

<body>
	<div id="page">
		<div>
			<a href="accueil.php"><input id="home_bouton" type="image" src="images/bouton_accueil.png" /></a>
		</div>
		
		<form method="post" action="test.php">
			<div>
				<input id="save_bouton" type="image" onclick="envoi()" src="images/save.png" />
			</div>
			<h1 id="centrer_titre">Saisie</h1>
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
							<div class="element">
								<p class="labelElement">État :</p>
								<select id="etat" name="etat" class="valueElement">
									<?php									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Identifier, Label FROM Etat');
										
										while($donnees = $reponse->fetch())
										{
											if($donnees['Label'] == 'En attente feu vert')
											{
												echo '<option value='.$donnees['Identifier'].' selected>'.$donnees['Label'].'</option><br/>';
											}
											else
											{
												echo '<option value='.$donnees['Identifier'].'>'.$donnees['Label'].'</option><br/>';
											}
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
							</div>
						</div>
						<hr class="interligne" />
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
									echo '<option value=0 selected></option><br/>';
									for($i = 1; $i <= 31; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<select name="delaiMois" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 1; $i <= 12; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<select name="delaiAnnee" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 2010; $i <= date("Y") + 2; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
							</div>
						</div>
						<hr class="interligne" />
						<div class="ligne">
							<div class="elementTable">
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
								<table id="listPrestations" border=1 style="margin:1%; max-width:10%;">
									<input type="hidden" value=0 name="countPrestations" />
									<th style="width:auto;">Prestation</th>
									<th style="width:auto;"/>
								</table>
							</div>
							<div class="element">
								<p class="labelElement">Achèvement :</p>
								<select name="achevJour" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 1; $i <= 31; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<select name="achevMois" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 1; $i <= 12; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<select name="achevAnnee" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 2010; $i <= date("Y") + 2; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
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
						<hr class="interligne" />
						<div class="ligne">
							<div class="element">
								<p class="labelElement">Relevé :</p>
								<select id="releve" class="valueElement">
									<?php
									echo '<option value=\'0\' selected>Choisir</option><br/>';
									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Identifier, Label FROM Mesure');
										
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
							</div>
							<div class="element">
								<p class="labelElement">Date relevé :</p>
								<select name="releveJour" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 1; $i <= 31; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<select name="releveMois" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 1; $i <= 12; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<select name="releveAnnee" class="valueElement">
									<?php
									echo '<option value=0 selected></option><br/>';
									for($i = 2010; $i <= date("Y") + 2; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<br/>
								<select name="releveHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="releveMinute" class="valueElement">
									<?php
									for($i = 0; $i <= 59; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">m</label>
							</div>
							<div class="element">
								<p class="labelElement">Tps débit :</p>
								<select name="debitHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="debitMinute" class="valueElement">
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
						<hr class="interligne" />
						<div class="ligne">
							<div class="element">
								<p class="labelElement">Tps cmd numérique :</p>
								<select name="cmdNumeriqueHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="cmdNumeriqueMinute" class="valueElement">
									<?php
									for($i = 0; $i <= 59; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">m</label>
							</div>
							<div class="element">
								<p class="labelElement">Tps finition :</p>
								<select name="finitionHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="finitionMinute" class="valueElement">
									<?php
									for($i = 0; $i <= 59; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">m</label>
							</div>
							<div class="element">
								<p class="labelElement">Tps autres :</p>
								<select name="autresHeure" class="valueElement">
									<?php
									for($i = 0; $i <= 23; $i++)
									{
										echo '<option value='.$i.'>'.$i.'</option><br/>';
									}
									?>
								</select>
								<label class="labelElement">h</label>
								<select name="autresMinute" class="valueElement">
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
						<?php
						echo '<hr class="interligne" />
								<div class="ligne">
									<div class="element">
										<p class="labelElement">Montant HT :</p>
										<input class="valueElement" type="text" name="montant" />
									</div>
								</div>';
						?>
						<hr class="interligne" />
						<div class="ligne">
							<div>
								<label class="labelElement">Adresse :	</label><input class="valueElement" type="text" name="adresse" style="width:50%;" />
								<br />
								<label class="labelElement">CP/Ville :	</label><input class="valueElement" type="text" name="cp" style="width:10%;" /><input class="valueElement" type="text" name="ville" style="width:38%;" />
							</div>
						</div>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_composants">
						<div class="ligne">
							<div class="elementTable">
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
									<input type="hidden" value=0 name="countMateriaux" />
									<th style="width:auto;">Matériau</th>
									<th style="width:auto;">MM</th>
									<th style="width:auto;"/>
								</table>
							</div>
						</div>
						<div class="ligne">
							<div class="elementTable">
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
									<input type="hidden" value=0 name="countNatures" />
									<th style="width:auto;">Nature</th>
									<th style="width:auto;"/>
								</table>
							</div>
						</div>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_remarque">
						<div class="ligne">
							<div class="element">
								<p class="labelElement">Remarque :</p>
								<input class="composants" type="text" id="nouvelleRemarque" />
								<input class="composants" type="button" value="Ajouter" onclick="ajouteRemarque(nouvelleRemarque.value, session)" />
							</div>
						</div>
						<div class="ligne">
							<div class="elementTable">
								<table id="listRemarques" border=1 style="margin:1%; width:100%;">
									<input type="hidden" value=0 name="countRemarques" />
									<th style="width:auto;">Source</th>
									<th style="width:auto;">Date/Heure</th>
									<th style="width:auto;">Remarque</th>
								</table>
							</div>
						</div>
					</div>
					<div class="contenu_onglet" id="contenu_onglet_qualite">
						<div class="ligne">
							<div class="element">
								<p class="labelElement">Problème de qualité :</p>
								<select id="qualite" class="composants">
									<?php
									echo '<option value=\'0\' selected></option><br/>';
									
									try
									{
										$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
										
										$reponse = $bdd->query('SELECT Identifier, Type FROM Qualite Order By Type');
										
										while($donnees = $reponse->fetch())
										{
											echo '<option value='.$donnees['Identifier'].'>'.$donnees['Type'].'</option><br/>';
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
								<input class="composants" type="text" id="commentaireQualite" />
								<input class="composants" type="button" value="Ajouter" onclick="ajouteQualite(commentaireQualite.value, session, qualite.selectedIndex)" />
							</div>
						</div>
						<div class="ligne">
							<div class="elementTable">
								<table id="listQualites" border=1 style="margin:1%; width:100%;">
									<input type="hidden" value=0 name="countQualites" />
									<th style="width:auto;">Source</th>
									<th style="width:auto;">Date/Heure</th>
									<th style="width:auto;">Problème</th>
									<th style="width:auto;">Commentaire</th>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		
	<?php include("pied_de_page.php"); ?>
	</div>

</body>
</html>
