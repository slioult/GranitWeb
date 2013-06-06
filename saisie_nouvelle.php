<div class="contenu_onglet" id="contenu_onglet_general" style="display:none;">
	<div class="ligne">
		<div class="element">
			<p class="labelElement">Date :</p>
			<select name="commandeJour" class="valueElement">
				<?php
				for($i = 1; $i <= 31; $i++)
				{
					if($i < 10){$i = '0'.$i;}
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
					if($i < 10){$i = '0'.$i;}
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
					if($i < 10){$i = '0'.$i;}
					echo '<option value='.$i.'>'.$i.'</option><br/>';
				}
				?>
			</select>
			<select name="delaiMois" class="valueElement">
				<?php
				echo '<option value=0 selected></option><br/>';
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
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
					if($i < 10){$i = '0'.$i;}
					echo '<option value='.$i.'>'.$i.'</option><br/>';
				}
				?>
			</select>
			<select name="achevMois" class="valueElement">
				<?php
				echo '<option value=0 selected></option><br/>';
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
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
					if($i < 10){$i = '0'.$i;}
					echo '<option value='.$i.'>'.$i.'</option><br/>';
				}
				?>
			</select>
			<label class="labelElement">h</label>
			<select name="achevMinute" class="valueElement">
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i < 10){$i = '0'.$i;}
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
			<select id="releve" name="releve" class="valueElement">
				<?php
				echo '<option value=\'0\' display="0" selected>Choisir</option><br/>';
				
				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
					
					$reponse = $bdd->query('SELECT Identifier, Label, Display FROM Mesure');
					
					while($donnees = $reponse->fetch())
					{
						echo '<option value='.$donnees['Identifier'].' display="'.$donnees['Display'].'" >'.$donnees['Label'].'</option><br/>';
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
					if($i < 10){$i = '0'.$i;}
					echo '<option value='.$i.'>'.$i.'</option><br/>';
				}
				?>
			</select>
			<select name="releveMois" class="valueElement">
				<?php
				echo '<option value=0 selected></option><br/>';
				for($i = 1; $i <= 12; $i++)
				{
					if($i < 10){$i = '0'.$i;}
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
					if($i < 10){$i = '0'.$i;}
					echo '<option value='.$i.'>'.$i.'</option><br/>';
				}
				?>
			</select>
			<label class="labelElement">h</label>
			<select name="releveMinute" class="valueElement">
				<?php
				for($i = 0; $i <= 59; $i++)
				{
					if($i < 10){$i = '0'.$i;}
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
	if($_SESSION['IsDispCA'] == 1)
	{
		echo '<hr class="interligne" />
				<div class="ligne">
					<div class="element">
						<p class="labelElement">Montant HT en € :</p>
						<input class="valueElement" type="text" name="montant" />
					</div>
					<div class="element">
						<p class="labelElement">Arrhes en € :</p>
						<input class="valueElement" type="text" name="arrhes" />
					</div>
				</div>';
	}
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
<div class="contenu_onglet" id="contenu_onglet_composants" style="display:none;">
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
<div class="contenu_onglet" id="contenu_onglet_remarque" style="display:none;">
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
<div class="contenu_onglet" id="contenu_onglet_qualite" style="display:none;">
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