<?php session_start(); ?>

<?php
if(empty($_SESSION['login']))
{
	header('location:index.php');
}
elseif(!$_SESSION['IsAddCmd'])
{
	header('location:accueil.php');
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
// Permet d'ajouter un matériau dans le tableau prévue à cette effet
// value : index du matériau sélectionné
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

// Permet d'ajouter une nature dans le tableau prévu à cet effet
// value : index de la nature sélectionnée
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

// Permet d'ajouter une prestation dans le tableau prévu à cet effet
// value : index de la prestation sélectionnée
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

// Permet d'ajouter une remarque dans le tableau prévu à cet effet
// remarque : texte à ajouter comme remarque
// session : nom de session ayant ajouté la remarque
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

// Permet d'ajouter un problème de qualité dans le tableau prévu à cet effet
// commentaire : commentaire relatif au problème de qualité
// session : session ayant signalé le problème de qualité
// value : index du problème de qualité sélectionné
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

// Permet de récupérer la date et l'heure actuelles dans un format standard (compris par une base de données)
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

// Supprime une ligne d'un tableau
// table : tableau HTML dans lequel supprimer la ligne
function supprimeLigne(table, btn, type)
{
	var ligne = btn.parentNode;
	
	table.removeChild(ligne);
	
	count = document.getElementsByName('count' + type)[0].value;
	count = parseInt(count) - 1;
	document.getElementsByName('count' + type)[0].value = count;
}

// Permet de changer la sélectione de l'onglet
// name : nom du nouvel onglet à sélectionner
function change_onglet(name)
{
    document.getElementById('onglet_'+anc_onglet).className = 'onglet_0 onglet';
    document.getElementById('onglet_'+name).className = 'onglet_1 onglet';
    document.getElementById('contenu_onglet_'+anc_onglet).style.display = 'none';
    document.getElementById('contenu_onglet_'+name).style.display = 'block';
    anc_onglet = name;
}

// Envoi le formulaire
function envoi()
{
	var error = '';
	if(document.getElementsByName('numCommande')[0].value != '')
	{
		if(document.getElementsByName('client')[0].value != '')
		{
			if(document.getElementsByName('contremarque')[0].value != '')
			{
				if(document.getElementsByName('delaiJour')[0].value != 0 && document.getElementsByName('delaiMois')[0].value != 0 && document.getElementsByName('delaiAnnee')[0].value != 0)
				{
					if(document.getElementsByName('achevJour')[0].value != 0 && document.getElementsByName('achevMois')[0].value != 0 && document.getElementsByName('achevAnnee')[0].value != 0)
					{
						if(document.getElementsByName('releve')[0].value != 0)
						{
							if(document.getElementsByName('releveJour')[0].value != 0 && document.getElementsByName('releveMois')[0].value != 0 && document.getElementsByName('releveAnnee')[0].value != 0)
							{
								return true;
							}
							else
							{
								error = 'Veuillez saisir la date de relevé';
							}
						}
						else
						{
							error = 'Veuillez choisir le type de relevé';
						}
					}
					else
					{
						document.getElementsByName('achevJour')[0].selectedIndex = document.getElementsByName('delaiJour')[0].selectedIndex;
						document.getElementsByName('achevMois')[0].selectedIndex = document.getElementsByName('delaiMois')[0].selectedIndex;
						document.getElementsByName('achevAnnee')[0].selectedIndex = document.getElementsByName('delaiAnnee')[0].selectedIndex;
						
						error = 'La date d\'achèvement a été modifiée automatiquement, veuillez la vérifier';
					}
				}
				else
				{
					error = 'Veuillez saisir un délai valide';
				}
			}
			else
			{
				error = 'Veuillez saisir un nom de contremarque';
			}
		}
		else
		{
			error = 'Veuillez saisir un nom de client';
		}
	}
	else
	{
		error = 'Veuillez saisir un numéro de commande';
	}
	
	if(error != '')
	{
		alert(error);
		return false;
	}
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
			<a href="accueil.php"><input id="home_bouton" type="image" src="images/bouton_accueil.png" onclick="window.location='accueil.php'" /></a>
		</div>
		
		<form method="post" action="interface_sauvegarde.php" onSubmit="return envoi()">
			<?php
			echo '<input type="hidden" name="idCommande" value="'.$_POST['idCommande'].'"/>';
			?>
			<div>
				<input id="save_bouton" type="image" src="images/save.png" />
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
					<?php 
					if (empty($_POST['UpdNumeroCommande']) AND empty($_POST['ErrNumeroCommande']))
					{
						include 'saisie_nouvelle.php'; 
					}
					else
					{
						include 'saisie_afficher.php';
					}
					?>
				</div>
			</div>
		</form>
		
	<?php include("pied_de_page.php"); ?>
	</div>

</body>
</html>
