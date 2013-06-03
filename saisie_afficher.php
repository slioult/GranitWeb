<?php
require 'classes/Commande.classe.php';
function chargerClasse($classe)
{
	require 'classes/'.$classe.'.classe.php';
}
spl_autoload_register('chargerClasse');
?>
<?php
if (!empty($_POST['UpdNumeroCommande']))
{
	$numCommande = $_POST['UpdNumeroCommande'];
	$cmd = new Commande(0, $numCommande);
	$cmd->getCommande();
}
elseif(!empty($_SESSION['ErrNumeroCommande']))
{
	$cmd = unserialize($_SESSION['ErrNumeroCommande']);
	$_SESSION['ErrNumeroCommande'] = null;
	print_r($commande);
}

if(!$_SESSION['IsAddCmd'])
{
	$okSelect = "disabled";
	$okInput = "readonly";
	$okDroits = false;
}
else
{
	$okSelect = "";
	$okInput = "";
	$okDroits = true;
}
?>

<div class="contenu_onglet" id="contenu_onglet_general">
	<div class="ligne">
		<div class="element">
			<p class="labelElement">Date :</p>
			<select name="commandeJour" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 31; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDateCommande()->getJour())
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
			<select name="commandeMois" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDateCommande()->getMois())
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
			<select name="commandeAnnee" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 2010; $i <= date("Y") + 2; $i++)
				{
					if($i == $cmd->getDateCommande()->getAnnee())
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
			<input type="text" name="numCommande" class="valueElement" value="<?php echo $cmd->getNumeroCommande(); ?>" <?php echo $okInput; ?> />
			<input type="hidden" value="<?php echo $cmd->getIdentifier(); ?>" name="idCommande" />
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
						if($donnees['Identifier'] == $cmd->getEtat()->getIdentifier())
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
			<input class="valueElement" type="text" name="client" value="<?php echo $cmd->getClient()->getNom(); ?>" <?php echo $okInput; ?>/>
		</div>
		<div class="element">
			<p class="labelElement">Contremarque :</p>
			<input class="valueElement" type="text" name="contremarque" value="<?php echo $cmd->getContremarque()->getNom(); ?>" <?php echo $okInput; ?>/>
		</div>
		<div class="element">
			<p class="labelElement">Délai :</p>
			<select name="delaiJour" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 31; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDelaiPrevu()->getJour())
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
			<select name="delaiMois" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDelaiPrevu()->getMois())
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
			<select name="delaiAnnee" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 2010; $i <= date("Y") + 2; $i++)
				{
					if($i == $cmd->getDelaiPrevu()->getAnnee())
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
	</div>
	<hr class="interligne" />
	<div class="ligne">
		<div class="elementTable">
			<?php
			if($okDroits)
			{
				echo '<select id="prestation" class="composants">';
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
					
				echo '</select>';
				
				echo '<input class="composants" type="button" value="+" onclick="ajoutePrestation(prestation.selectedIndex)" />';
			}
			?>
			<br />
			<table id="listPrestations" border=1 style="margin:1%; max-width:10%;">
				<input type="hidden" value=<?php echo count($cmd->getAPrestations()); ?> name="countPrestations" />
				<th style="width:auto;">Prestation</th>
				<?php
				if($okDroits){ echo '<th style="width:auto;"/>'; }
				for($i = 1; $i <= count($cmd->getAPrestations()); $i++)
				{
					echo '<script type="text/javascript">
									var cbx = \''.$cmd->getAPrestations()[$i-1]->getLabel().'\';
									var table = document.getElementById(\'listPrestations\');
									var ligne = document.createElement(\'tr\');
									ligne.id = "pre'.$cmd->getAPrestations()[$i-1]->getIdentifier().'";
									var label = document.createElement(\'td\');';
					if($okDroits){ echo 'var bouton = document.createElement(\'input\');
									bouton.type = "image";
									bouton.setAttribute("class", "boutonSuppression");
									bouton.setAttribute("src", "images/supprimer.png");
									bouton.setAttribute("onClick", "supprimeLigne(listPrestations, this, \'Prestations\')");'; }
									
								echo 'var id = document.createElement(\'input\');
									id.type = "hidden";
									id.value = '.$cmd->getAPrestations()[$i-1]->getIdentifier().';
									id.name = \'pre'.$i.'\';
									
									var textLabel = document.createTextNode(cbx);
									ligne.appendChild(id);
									label.appendChild(textLabel);
									ligne.appendChild(label);';
					if($okDroits){ echo 'ligne.appendChild(bouton);'; }
									
								echo 'table.appendChild(ligne);
						 </script>';
				}
				?>
			</table>
		</div>
		<div class="element">
			<p class="labelElement">Achèvement :</p>
			<select name="achevJour" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 31; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDatePrestations()->getJour())
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
			<select name="achevMois" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDatePrestations()->getMois())
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
			<select name="achevAnnee" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 2010; $i <= date("Y") + 2; $i++)
				{
					if($i == $cmd->getDatePrestations()->getAnnee())
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
			<select name="achevHeure" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 0; $i <= 23; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDatePrestations()->getHeure())
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
			<label class="labelElement">h</label>
			<select name="achevMinute" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDatePrestations()->getMinute())
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
			<label class="labelElement">m</label>
		</div>
	</div>
	<hr class="interligne" />
	<div class="ligne">
		<div class="element">
			<p class="labelElement">Relevé :</p>
			<select id="releve" name="releve" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				echo '<option value=\'0\' selected>Choisir</option><br/>';
				
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
					
					$reponse = $bdd->query('SELECT Identifier, Label FROM Mesure');
					
					while($donnees = $reponse->fetch())
					{
						if($donnees['Identifier'] == $cmd->getMesure()->getIdentifier())
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
		<div class="element">
			<p class="labelElement">Date relevé :</p>
			<select name="releveJour" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 31; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDateMesure()->getJour())
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
			<select name="releveMois" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDateMesure()->getMois())
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
			<select name="releveAnnee" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 2010; $i <= date("Y") + 2; $i++)
				{
					if($i == $cmd->getDateMesure()->getAnnee())
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
			<select name="releveHeure" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 0; $i <= 23; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDateMesure()->getHeure())
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
			<label class="labelElement">h</label>
			<select name="releveMinute" class="valueElement" <?php echo $okSelect; ?>>
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i < 10){$i = '0'.$i;}
					if($i == $cmd->getDateMesure()->getMinute())
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
			<label class="labelElement">m</label>
		</div>
		<div class="element">
			<p class="labelElement">Tps débit :</p>
			<?php 
			$tpsDeb = new MyTime(0, 0, 0, 0, $cmd->getTpsDebit());
			$tpsDeb->MinToHMin();
			?>
			<select name="debitHeure" class="valueElement">
				<?php
				for($i = 0; $i <= 23; $i++)
				{
					if($i == $tpsDeb->getHeure())
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
			<label class="labelElement">h</label>
			<select name="debitMinute" class="valueElement">
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i == $tpsDeb->getMinute())
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
			<label class="labelElement">m</label>
		</div>
	</div>
	<hr class="interligne" />
	<div class="ligne">
		<div class="element">
			<p class="labelElement">Tps cmd numérique :</p>
			<?php 
			$tpsCmdNum = new MyTime(0, 0, 0, 0, $cmd->getTpsCmdNumerique());
			$tpsCmdNum->MinToHMin();
			?>
			<select name="cmdNumeriqueHeure" class="valueElement">
				<?php
				for($i = 0; $i <= 23; $i++)
				{
					if($i == $tpsCmdNum->getHeure())
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
			<label class="labelElement">h</label>
			<select name="cmdNumeriqueMinute" class="valueElement">
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i == $tpsCmdNum->getMinute())
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
			<label class="labelElement">m</label>
		</div>
		<div class="element">
			<p class="labelElement">Tps finition :</p>
			<?php 
			$tpsFin = new MyTime(0, 0, 0, 0, $cmd->getTpsFinition());
			$tpsFin->MinToHMin();
			?>
			<select name="finitionHeure" class="valueElement">
				<?php
				for($i = 0; $i <= 23; $i++)
				{
					if($i == $tpsFin->getHeure())
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
			<label class="labelElement">h</label>
			<select name="finitionMinute" class="valueElement">
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i == $tpsFin->getMinute())
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
			<label class="labelElement">m</label>
		</div>
		<div class="element">
			<p class="labelElement">Tps autres :</p>
			<?php 
			$tpsAutres = new MyTime(0, 0, 0, 0, $cmd->getTpsAutres());
			$tpsAutres->MinToHMin();
			?>
			<select name="autresHeure" class="valueElement">
				<?php
				for($i = 0; $i <= 23; $i++)
				{
					if($i == $tpsAutres->getHeure())
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
			<label class="labelElement">h</label>
			<select name="autresMinute" class="valueElement">
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i == $tpsAutres->getMinute())
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
			<label class="labelElement">m</label>
		</div>
	</div>
	<?php
	if($_SESSION['IsDispCA'] == 1)
	{
		echo '<hr class="interligne" />
				<div class="ligne">
					<div class="element">
						<p class="labelElement">Montant HT en € :</p>
						<input class="valueElement" type="text" name="montant" value="'.$cmd->getMontant().'" />
					</div>
					<div class="element">
						<p class="labelElement">Arrhes en € :</p>
						<input class="valueElement" type="text" name="arrhes" value="'.$cmd->getArrhes().'" />
					</div>
				</div>';
	}
	?>
	<hr class="interligne" />
	<div class="ligne">
		<div>
		<?php
		$adresse = array();
		$adresse = explode(";", $cmd->getAdresseChantier());
		$adr = $adresse[0];
		$cp = $adresse[1];
		$ville = $adresse[2];
		?>
			<label class="labelElement">Adresse :	</label><input class="valueElementLeft" type="text" name="adresse" style="width:50%;" value="<?php echo($adr); ?>" <?php echo $okInput; ?>/>
			<br />
			<label class="labelElement">CP/Ville :	</label><input class="valueElementLeft" type="text" name="cp" style="width:10%;" value="<?php echo($cp); ?>" <?php echo $okInput; ?>/><input class="valueElementLeft" type="text" name="ville" style="width:38%;" value="<?php echo($ville); ?>" <?php echo $okInput; ?>/>
		</div>
	</div>
</div>
<div class="contenu_onglet" id="contenu_onglet_composants">
	<div class="ligne">
		<div class="elementTable">
			<?php
			if($okDroits)
			{
				echo '<select id="materiau" class="composants">';
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
					echo '</select>';
					echo '<select id="epaisseur" class="composants">';
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
				echo '</select>';
				echo'<input class="composants" type="button" value="+" onclick="ajouteMateriau(materiau.selectedIndex)" />
				<br/>';
			}
			?>
			<table id="listMateriaux" border=1 style="margin:1%;">
				<input type="hidden" value=<?php echo count($cmd->getAMateriaux()); ?> name="countMateriaux" />
				<th style="width:auto;">Matériau</th>
				<th style="width:auto;">MM</th>
				<?php
				if($okDroits){ echo '<th style="width:auto;"/>'; }
				for($i = 1; $i <= count($cmd->getAMateriaux()); $i++)
				{
					echo '<script type="text/javascript">
									var cbx = \''.$cmd->getAMateriaux()[$i-1]->getLabel().'\';
									var ep = '.$cmd->getAMateriaux()[$i-1]->getEpaisseur().';
									var table = document.getElementById(\'listMateriaux\');
									var ligne = document.createElement(\'tr\');
									ligne.id = "pre'.$cmd->getAMateriaux()[$i-1]->getIdentifier().'";
									var label = document.createElement(\'td\');
									var epaisseur = document.createElement(\'td\');';
					if($okDroits){ echo 'var bouton = document.createElement(\'input\');
									bouton.type = "image";
									bouton.setAttribute("class", "boutonSuppression");
									bouton.setAttribute("src", "images/supprimer.png");
									bouton.setAttribute("onClick", "supprimeLigne(listMateriaux, this, \'Materiaux\')");'; }
									
								echo 'var id = document.createElement(\'input\');
									id.type = "hidden";
									id.value = '.$cmd->getAMateriaux()[$i-1]->getIdentifier().';
									id.name = \'mat'.$i.'\';
									
									var textLabel = document.createTextNode(cbx);
									var textEpaisseur = document.createTextNode(ep);
									ligne.appendChild(id);
									label.appendChild(textLabel);
									epaisseur.appendChild(textEpaisseur);
									ligne.appendChild(label);
									ligne.appendChild(epaisseur);';
					if($okDroits) { echo 'ligne.appendChild(bouton);'; }
									
								echo 'table.appendChild(ligne);
						 </script>';
				}
				?>
			</table>
		</div>
	</div>
	<div class="ligne">
		<div class="elementTable">
			<?php
			if($okDroits)
			{
				echo '<select id="nature" class="composants">';
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
				echo '</select>';
				echo '<input class="composants" type="button" value="+" onclick="ajouteNature(nature.selectedIndex)" />
				<br />';
			}
			?>
			<table id="listNatures" border=1 style="margin:1%;">
				<input type="hidden" value=<?php echo count($cmd->getANatures()); ?> name="countNatures" />
				<th style="width:auto;">Nature</th>
				<?php
				if($okDroits){ echo '<th style="width:auto;"/>'; }
				for($i = 1; $i <= count($cmd->getANatures()); $i++)
				{
					echo '<script type="text/javascript">
									var cbx = \''.$cmd->getANatures()[$i-1]->getLabel().'\';
									var table = document.getElementById(\'listNatures\');
									var ligne = document.createElement(\'tr\');
									ligne.id = "nat'.$cmd->getANatures()[$i-1]->getIdentifier().'";
									var label = document.createElement(\'td\');';
									
					if($okDroits){ echo '
									var bouton = document.createElement(\'input\');
									bouton.type = "image";
									bouton.setAttribute("class", "boutonSuppression");
									bouton.setAttribute("src", "images/supprimer.png");
									bouton.setAttribute("onClick", "supprimeLigne(listNatures, this, \'Natures\')");'; }
									
								echo 'var id = document.createElement(\'input\');
									id.type = "hidden";
									id.value = '.$cmd->getANatures()[$i-1]->getIdentifier().';
									id.name = \'nat'.$i.'\';
									
									var textLabel = document.createTextNode(cbx);
									ligne.appendChild(id);
									label.appendChild(textLabel);
									ligne.appendChild(label);';
					if($okDroits){ echo 'ligne.appendChild(bouton);'; }
									
								echo 'table.appendChild(ligne);
						 </script>';
				}
				?>
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
				<input type="hidden" value=<?php echo count($cmd->getARemarques()); ?> name="countRemarques" />
				<th style="width:auto;">Source</th>
				<th style="width:auto;">Date/Heure</th>
				<th style="width:auto;">Remarque</th>
				<?php
				for($i = 1; $i <= count($cmd->getARemarques()); $i++)
				{
					echo '<script type="text/javascript">
									var table = document.getElementById(\'listRemarques\');
									var ligne = document.createElement(\'tr\');
									
									var cellSource = document.createElement(\'td\');
									var cellDate = document.createElement(\'td\');
									var cellRemarque = document.createElement(\'td\');
									
									var session = \''.$cmd->getARemarques()[$i-1]->getSource().'\';
									var dateHeure = \''.$cmd->getARemarques()[$i-1]->getDateHeure().'\';
									var remarque = "'.$cmd->getARemarques()[$i-1]->getCommentaire().'";
									
									var textSource = document.createTextNode(session);
									var textDate = document.createTextNode(dateHeure);
									var textRemarque = document.createTextNode(remarque);
									
									cellSource.appendChild(textSource);
									cellDate.appendChild(textDate);
									cellRemarque.appendChild(textRemarque);

									var id = document.createElement(\'input\');
									id.type = "hidden";
									id.value = session + ";" + dateHeure + ";" + remarque;
									id.name = \'rem'.$i.'\';

									ligne.appendChild(id);
									ligne.appendChild(cellSource);
									ligne.appendChild(cellDate);
									ligne.appendChild(cellRemarque);
									
									table.appendChild(ligne);
						 </script>';
				}
				?>
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
				<input type="hidden" value=<?php echo count($cmd->getAPbQualites()); ?> name="countQualites" />
				<th style="width:auto;">Source</th>
				<th style="width:auto;">Date/Heure</th>
				<th style="width:auto;">Problème</th>
				<th style="width:auto;">Commentaire</th>
				<?php
				for($i = 1; $i <= count($cmd->getAPbQualites()); $i++)
				{
					echo '<script type="text/javascript">
									var table = document.getElementById(\'listQualites\');
									var ligne = document.createElement(\'tr\');
									
									var cellSource = document.createElement(\'td\');
									var cellDate = document.createElement(\'td\');
									var cellQualite = document.createElement(\'td\');
									var cellCommentaire = document.createElement(\'td\');
									
									var session = \''.$cmd->getAPbQualites()[$i-1]->getSource().'\';
									var dateHeure = \''.$cmd->getAPbQualites()[$i-1]->getDateHeure().'\';
									var pbQualite = \''.$cmd->getAPbQualites()[$i-1]->getQualite()->getType().'\';
									var remarque = "'.$cmd->getAPbQualites()[$i-1]->getCommentaire().'";
									
									var textSource = document.createTextNode(session);
									var textDate = document.createTextNode(dateHeure);
									var textQualite = document.createTextNode(pbQualite);
									var textRemarque = document.createTextNode(remarque);
									
									cellSource.appendChild(textSource);
									cellDate.appendChild(textDate);
									cellQualite.appendChild(textQualite);
									cellCommentaire.appendChild(textRemarque);

									var id = document.createElement(\'input\');
									id.type = "hidden";
									id.value = session + ";" + dateHeure + ";" + pbQualite + ";" + remarque;
									id.name = \'qlt'.$i.'\';

									ligne.appendChild(id);
									ligne.appendChild(cellSource);
									ligne.appendChild(cellDate);
									ligne.appendChild(cellQualite);
									ligne.appendChild(cellCommentaire);
									
									table.appendChild(ligne);
						 </script>';
				}
				?>
			</table>
		</div>
	</div>
</div>