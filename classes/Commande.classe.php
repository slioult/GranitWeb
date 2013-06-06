<?php
class Commande
{
// Attributs
	private $_Identifier;
	private $_NumeroCommande;
	private $_Montant;
	private $_Arrhes;
	private $_DateCommande;
	private $_AdresseChantier;
	private $_TpsDebit;
	private $_TpsCmdNumerique;
	private $_TpsFinition;
	private $_TpsAutres;
	private $_DelaiPrevu;
	private $_Etat;
	private $_Client;
	private $_Contremarque;
	private $_Mesure;
	private $_DateMesure;
	private $_AMateriaux;
	private $_ANatures;
	private $_APrestations;
	private $_DatePrestations;
	private $_ARemarques;
	private $_APbQualites;
	private $_Tstamp;
// Attributs
	
// Properties
	function getIdentifier()
	{
		return $this->_Identifier;
	}
	function setIdentifier($identifier)
	{
		$this->_Identifier = $identifier;
	}
	
	public function getNumeroCommande()
	{
		return $this->_NumeroCommande;
	}
	public function setNumeroCommande($numeroCommande)
	{
		$this->_NumeroCommande = $numeroCommande;
	}
	
	function getMontant()
	{
		return $this->_Montant;
	}
	function setMontant($montant)
	{
		$this->_Montant = $montant;
	}
	
	function getArrhes()
	{
		return $this->_Arrhes;
	}
	function setArrhes($arrhes)
	{
		$this->_Arrhes = $arrhes;
	}
	
	function getDateCommande()
	{
		return $this->_DateCommande;
	}
	function setDateCommande($dateCommande)
	{
		$this->_DateCommande = $dateCommande;
	}
	
	function getAdresseChantier()
	{
		return $this->_AdresseChantier;
	}
	function setAdresseChantier($adresseChantier)
	{
		$this->_AdresseChantier = $adresseChantier;
	}
	
	function getTpsDebit()
	{
		return $this->_TpsDebit;
	}
	function setTpsDebit($tpsDebit)
	{
		$this->_TpsDebit = $tpsDebit;
	}
	
	function getTpsCmdNumerique()
	{
		return $this->_TpsCmdNumerique;
	}
	function setTpsCmdNumerique($tpsCmdNumerique)
	{
		$this->_TpsCmdNumerique = $tpsCmdNumerique;
	}
	
	function getTpsFinition()
	{
		return $this->_TpsFinition;
	}
	function setTpsFinition($tpsFinition)
	{
		$this->_TpsFinition = $tpsFinition;
	}
	
	function getTpsAutres()
	{
		return $this->_TpsAutres;
	}
	function setTpsAutres($tpsAutres)
	{
		$this->_TpsAutres = $tpsAutres;
	}
	
	function getDelaiPrevu()
	{
		return $this->_DelaiPrevu;
	}
	function setDelaiPrevu($delaiPrevu)
	{
		$this->_DelaiPrevu = $delaiPrevu;
	}
	
	function getEtat()
	{
		return $this->_Etat;
	}
	function setEtat($etat)
	{
		$this->_Etat = $etat;
	}
	
	function getClient()
	{
		return $this->_Client;
	}
	function setClient($client)
	{
		$this->_Client = $client;
	}
	
	function getContremarque()
	{
		return $this->_Contremarque;
	}
	function setContremarque($contremarque)
	{
		$this->_Contremarque = $contremarque;
	}
	
	function getMesure()
	{
		return $this->_Mesure;
	}
	function setMesure($mesure)
	{
		$this->_Mesure = $mesure;
	}
	
	function getDateMesure()
	{
		if($this->_DateMesure != null)
		{
		return $this->_DateMesure;
		}
		else
		{
			return null;
		}
	}
	function setDateMesure($dateMesure)
	{
		$this->_DateMesure = $dateMesure;
	}
	
	function getAMateriaux()
	{
		return $this->_AMateriaux;
	}
	function setAMateriaux($aMateriaux)
	{
		$this->_AMateriaux = $aMateriaux;
	}
	
	function getANatures()
	{
		return $this->_ANatures;
	}
	function setANatures($aNatures)
	{
		$this->_ANatures = $aNatures;
	}
	
	function getAPrestations()
	{
		return $this->_APrestations;
	}
	function setAPrestations($aPrestations)
	{
		$this->_APrestations = $aPrestations;
	}
	
	function getDatePrestations()
	{
		return $this->_DatePrestations;
	}
	function setDatePrestations($datePrestations)
	{
		$this->_DatePrestations = $datePrestations;
	}
	
	function getARemarques()
	{
		return $this->_ARemarques;
	}
	function setARemarques($remarques)
	{
		$this->_ARemarques = $remarques;
	}
	
	function getAPbQualites()
	{
		return $this->_APbQualites;
	}
	function setAPbQualites($pbQualites)
	{
		$this->_APbQualites = $pbQualites;
	}
	
	function getTstamp()
	{
		return $this->_Tstamp;
	}
	function setTstamp($tstamp)
	{
		$this->_Tstamp = $tstamp;
	}
// Properties

// Constructor
	function __construct($identifier = 0, $numCmd = 0, $montant = 0, $arrhes = 0, $dateCommande = null, $adresseChantier = '', $tpsDebit = 0, $tpsCmdNumerique = 0, $tpsFinition = 0, $tpsAutres = 0,
						 $delaiPrevu = null, $etat = null, $client = null, $contremarque = null, $mesure = null, $dateMesure = null, $datePrestations = null,  $aMateriaux = null, $aNatures = null, $aPrestations = null,
						 $remarques = null, $pbQualites = null, $tstamp = null)
	{
	
		$this->setIdentifier($identifier);
		$this->setNumeroCommande($numCmd);
		$this->setMontant($montant);
		$this->setArrhes($arrhes);
		$this->setDateCommande($dateCommande);
		$this->setAdresseChantier($adresseChantier);
		$this->setTpsDebit($tpsDebit);
		$this->setTpsCmdNumerique($tpsCmdNumerique);
		$this->setTpsFinition($tpsFinition);
		$this->setTpsAutres($tpsAutres);
		$this->setDelaiPrevu($delaiPrevu);
		$this->setEtat($etat);
		$this->setClient($client);
		$this->setContremarque($contremarque);
		$this->setMesure($mesure);
		$this->setDateMesure($dateMesure);
		$this->setDatePrestations($datePrestations);
		$this->setAMateriaux($aMateriaux);
		$this->setANatures($aNatures);
		$this->setAPrestations($aPrestations);
		$this->setARemarques($remarques);
		$this->setAPbQualites($pbQualites);
		$this->setTstamp($tstamp);
	}
// Constructor

// Méthodes
	//Retourne un booléen indiquant si la commande existe
	function isExisteCommande()
	{
		$isExists = 0;
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('SELECT count(NumCmd) as count FROM Commande Where NumCmd=?');
		$reponse->execute(array($this->getNumeroCommande()));
		
		while($donnees = $reponse->fetch())
		{
			if($donnees['count'] > 0)
			{
				$isExists = 1;
			}
		}
		
		$reponse->closeCursor();
		return $isExists;
	}

	//Ajoute une commande et ses éléments dans la BDD
	function ajoute()
	{
		if(!$this->isExisteCommande())
		{
			//Récupère l'id du client s'il existe déjà
			$this->getClient()->getId();
			
			//Crée le client et récupère son id s'il n'existe pas
			if($this->getClient()->getIdentifier() == 0)
			{
				$this->getClient()->insert();
				$this->getClient()->getId();
			}
			
			//Récupère l'id de la contremarque si elle existe déjà
			$this->getContremarque()->getId();
			
			//Crée la contremarque et récupère son id si elle n'existe pas
			if($this->getContremarque()->getIdentifier() == 0 AND $this->getContremarque()->getNom() != '')
			{
				$this->getContremarque()->insert();
				$this->getContremarque()->getId();
			}
			
			//Insert la commande en base de données et récupère son identifier
			$this->insert();
			
			//Insert les prestations dans la BDD
			foreach($this->getAPrestations() as $prest)
			{
				$prest->insertLien($this->getIdentifier());
			}
			
			//Insert les matériaux dans la BDD
			foreach($this->getAMateriaux() as $mat)
			{
				$mat->insertLien($this->getIdentifier());
			}
			
			//Insert les natures dans la BDD
			foreach($this->getANatures() as $nat)
			{
				$nat->insertLien($this->getIdentifier());
			}
			
			//Insert les problèmes de qualité dans la BDD
			foreach($this->getAPbQualites() as $pb)
			{
				$pb->insert($this->getIdentifier());
			}
			
			//Insert les remarques dans la BDD
			foreach($this->getARemarques() as $rem)
			{
				$rem->insert($this->getIdentifier());
			}
		}
	}
	
	//Insert une commande dans la BDD
	function insert()
	{
		try
		{
			if($this->getMontant() == ''){$this->setMontant(0);}
			if($this->getArrhes() == ''){$this->setArrhes(0);}
			$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			
			$reponse = $bdd->prepare('INSERT INTO Commande '.
												'(NumCmd, Montant, Arrhes, DateCommande, AdresseChantier, TpsDebit, TpsCmdNumerique, TpsFinition, TpsAutres, DelaiPrevu, '.
												'IdentifierEtat, IdentifierClient, IdentifierContremarque, IdentifierMesure, DateMesure, DateFinalisations) '.
									 'VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
			
			if($this->getDateMesure() == null){ $this->setDateMesure(new MyTime()); }
			
			$reponse->execute(array($this->getNumeroCommande(), str_replace(",", ".", $this->getMontant()), str_replace(",", ".", $this->getArrhes()), $this->getDateCommande()->FTBDD(), $this->getAdresseChantier(), $this->getTpsDebit(),
									$this->getTpsCmdNumerique(), $this->getTpsFinition(), $this->getTpsAutres(), $this->getDelaiPrevu()->FTBDD(), $this->getEtat()->getIdentifier(),
									$this->getClient()->getIdentifier(), $this->getContremarque()->getIdentifier(), $this->getMesure()->getIdentifier(), $this->getDateMesure()->FTBDD(),
									$this->getDatePrestations()->FTBDD()));
						
			$reponse->closeCursor();
			
			$reponse = $bdd->prepare('SELECT Identifier FROM Commande WHERE NumCmd=?');
			$reponse->execute(array($this->getNumeroCommande()));
			
			while($donnees = $reponse->fetch())
			{
				$this->setIdentifier($donnees['Identifier']);
			}
			
			$reponse->closeCursor();
		}
		catch(PDOException $e)
		{
			exit($e->getMessage());
		}
	}

	//Récupère toutes les informations d'une commande à partir de son identifier
	function getCommande()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('SELECT c.Identifier, c.NumCmd, c.Montant, c.Arrhes, c.DateCommande, c.AdresseChantier, c.TpsDebit, c.TpsCmdNumerique, c.TpsFinition, c.TpsAutres, c.DelaiPrevu, c.IdentifierEtat, e.Label, '.
								'c.IdentifierClient, cl.Nom, c.IdentifierContremarque, c.IdentifierMesure, m.Label, c.DateMesure, c.DateFinalisations, c.Tstamp '.
								'FROM Commande as c '.
								'INNER JOIN Etat as e ON e.Identifier = c.IdentifierEtat '.
								'INNER JOIN Client as cl ON cl.Identifier = c.IdentifierClient '.
								'INNER JOIN Mesure as m ON m.Identifier = c.IdentifierMesure '.
								'WHERE NumCmd=?');
		
		$reponse->execute(array($this->getNumeroCommande()));
		
		while($donnees = $reponse->fetch())
		{
			$dCommande = new MyTime();
			$dCommande->DBDate($donnees[4]);
			
			$dDelai = new MyTime();
			$dDelai->DBDate($donnees[10]);
			
			$dReleve = new MyTime();
			$dReleve->DBDate($donnees[18]);
			
			$dPrestations = new MyTime();
			$dPrestations->DBDate($donnees[19]);
			
			$dTstamp = new MyTime();
			$dTstamp->DBDate($donnees[20]);
			
			$this->setIdentifier($donnees[0]);
			$this->setNumeroCommande($donnees[1]);
			$this->setMontant($donnees[2]);
			$this->setArrhes($donnees[3]);
			$this->setDateCommande($dCommande);
			$this->setAdresseChantier($donnees[5]);
			$this->setTpsDebit($donnees[6]);
			$this->setTpsCmdNumerique($donnees[7]);
			$this->setTpsFinition($donnees[8]);
			$this->setTpsAutres($donnees[9]);
			$this->setDelaiPrevu($dDelai);
			$this->setEtat(new Etat($donnees[11], $donnees[12]));
			$this->setClient(new Client($donnees[13], $donnees[14]));
			$this->setContremarque(new Contremarque($donnees[15]));
			$this->setMesure(new Mesure($donnees[16], $donnees[17]));
			$this->setDateMesure($dReleve);
			$this->setDatePrestations($dPrestations);
			$this->setTstamp($dTstamp);
		}
		
		$reponse->closeCursor();
		
		// Récupère la contremarque
		if($this->getContremarque()->getIdentifier() != 0)
		{
			$this->getContremarque()->getContremarque();
		}
		
		// Récupère les matériaux
		$reponse = $bdd->prepare('SELECT cm.Identifier_Materiau, cm.Epaisseur, m.Label '.
								'FROM Commande_Materiau as cm '.
								'INNER JOIN Materiau as m ON m.Identifier = cm.Identifier_Materiau '.
								'WHERE cm.Identifier_Commande=?');
		$reponse->execute(array($this->getIdentifier()));
		
		$materiaux = array();
		
		while($donnees = $reponse->fetch())
		{
			$mat = new Materiau($donnees[0], $donnees[2], $donnees[1]);
			array_push($materiaux, $mat);
		}
		
		$reponse->closeCursor();
		
		// Récupère les natures
		$reponse = $bdd->prepare('SELECT cn.Identifier_Nature, n.Label '.
								'FROM Commande_Nature as cn '.
								'INNER JOIN Nature as n ON n.Identifier = cn.Identifier_Nature '.
								'WHERE cn.Identifier_Commande=?');
		$reponse->execute(array($this->getIdentifier()));
		
		$natures = array();
		
		while($donnees = $reponse->fetch())
		{
			$nat = new Nature($donnees[0], $donnees[1]);
			array_push($natures, $nat);
		}
		
		$reponse->closeCursor();
		
		// Récupère les prestations
		$reponse = $bdd->prepare('SELECT cf.Identifier_Finalisation, f.Label '.
								'FROM Commande_Finalisation as cf '.
								'INNER JOIN Finalisation as f ON f.Identifier = cf.Identifier_Finalisation '.
								'WHERE cf.Identifier_Commande=?');
		$reponse->execute(array($this->getIdentifier()));
		
		$prestations = array();
		
		while($donnees = $reponse->fetch())
		{
			$prest = new Prestation($donnees[0], $donnees[1]);
			array_push($prestations, $prest);
		}
		
		$reponse->closeCursor();
		
		// Récupère les remarques
		$reponse = $bdd->prepare('SELECT Identifier, Source, Date, Commentaire '.
								'FROM Remarque '.
								'WHERE IdentifierCommande=?');
		$reponse->execute(array($this->getIdentifier()));
		
		$remarques = array();
		
		while($donnees = $reponse->fetch())
		{
			$rem = new Remarque($donnees[0], $donnees[1], $donnees[2], $donnees[3]);
			array_push($remarques, $rem);
		}
		
		$reponse->closeCursor();
		
		// Récupère les problèmes de qualité
		$reponse = $bdd->prepare('SELECT cq.Source, cq.DateProbleme, q.Identifier, q.Type, cq.Remarque '.
								'FROM Commande_Qualite as cq '.
								'INNER JOIN Qualite as q ON q.Identifier = cq.Identifier_Qualite '.
								'WHERE Identifier_Commande=?');
		$reponse->execute(array($this->getIdentifier()));
		
		$pbQualites = array();
		
		while($donnees = $reponse->fetch())
		{
			$pb = new ProblemeQlt($donnees[0], $donnees[1], new Qualite($donnees[2], $donnees[3]), $donnees[4]);
			array_push($pbQualites, $pb);
		}
		
		$reponse->closeCursor();
		
		//Mise à jour des paramètres de la commande
		$this->setAMateriaux($materiaux);
		$this->setANatures($natures);
		$this->setAPrestations($prestations);
		$this->setARemarques($remarques);
		$this->setAPbQualites($pbQualites);
	}
	
	//Récupère le time stamp du dernier update
	function getTimeStamp()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('SELECT Tstamp FROM Commande WHERE Identifier=?');
		$reponse->execute(array($this->getIdentifier()));
		
		$tstamp = new MyTime();
		
		while($donnees = $reponse->fetch())
		{
			$tstamp->DBDate($donnees[0]);
		}
		
		return $tstamp;
	}
	
	// Mise à jour d'une commande
	function update()
	{
		//Récupère l'id du client s'il existe déjà
		$this->getClient()->getId();
			
		//Crée le client et récupère son id s'il n'existe pas
		if($this->getClient()->getIdentifier() == 0)
		{
			$this->getClient()->insert();
			$this->getClient()->getId();
		}
		
		//Récupère l'id de la contremarque si elle existe déjà
		$this->getContremarque()->getId();
		
		//Crée la contremarque et récupère son id si elle n'existe pas
		if($this->getContremarque()->getIdentifier() == 0)
		{
			$this->getContremarque()->insert();
			$this->getContremarque()->getId();
		}

		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		
		$reponse = $bdd->prepare('UPDATE Commande SET NumCmd=?, Montant=?, Arrhes=?, DateCommande=?, AdresseChantier=?, TpsDebit=?, TpsCmdNumerique=?, TpsFinition=?, TpsAutres=?, '.
													 'DelaiPrevu=?, IdentifierEtat=?, IdentifierClient=?, IdentifierContremarque=?, IdentifierMesure=?, DateMesure=?, DateFinalisations=? '.
								 'WHERE Identifier=?');
								 
		$reponse->execute(array($this->getNumeroCommande(), str_replace(",", ".", $this->getMontant()), str_replace(",", ".", $this->getArrhes()), $this->getDateCommande()->FTBDD(),
								$this->getAdresseChantier(), $this->getTpsDebit(), $this->getTpsCmdNumerique(), $this->getTpsFinition(), $this->getTpsAutres(), $this->getDelaiPrevu()->FTBDD(),
								$this->getEtat()->getIdentifier(), $this->getClient()->getIdentifier(), $this->getContremarque()->getIdentifier(), $this->getMesure()->getIdentifier(),
								$this->getDateMesure()->FTBDD(), $this->getDatePrestations()->FTBDD(), $this->getIdentifier()));
		$reponse->closeCursor();
		
		//Met à jour les prestations dans la BDD
		$tempPrest = new Prestation();
		$tempPrest->supprimeLiens($this->getIdentifier());
		$tempPrest = null;
		foreach($this->getAPrestations() as $prest)
		{
			$prest->insertLien($this->getIdentifier());
		}
		
		//Met à jour les matériaux dans la BDD
		$tempMat = new Materiau();
		$tempMat->supprimeLiens($this->getIdentifier());
		$tempMat = null;
		foreach($this->getAMateriaux() as $mat)
		{
			$mat->insertLien($this->getIdentifier());
		}
		
		//Met à jour les natures dans la BDD
		$tempNat = new Nature();
		$tempNat->supprimeLiens($this->getIdentifier());
		$tempNat = null;
		foreach($this->getANatures() as $nat)
		{
			$nat->insertLien($this->getIdentifier());
		}
		
		//Met à jour les problèmes de qualité dans la BDD
		$tempPb = new ProblemeQlt();
		$tempPb->supprimeLiens($this->getIdentifier());
		$tempPb = null;
		foreach($this->getAPbQualites() as $pb)
		{
			$pb->insert($this->getIdentifier());
		}
		
		//Met à jour les remarques dans la BDD
		$tempRem = new Remarque();
		$tempRem->supprimeLiens($this->getIdentifier());
		$tempRem = null;
		foreach($this->getARemarques() as $rem)
		{
			$rem->insert($this->getIdentifier());
		}
	}
	
	// Mise à jour d'une commande limitée --> Seulement temps de prod, état, remarques et pb de qualité
	function limitUpdate()
	{
		//Récupère l'id du client s'il existe déjà
		$this->getClient()->getId();
		
		//Récupère l'id de la contremarque si elle existe déjà
		$this->getContremarque()->getId();
	
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('UPDATE Commande SET TpsDebit=?, TpsCmdNumerique=?, TpsFinition=?, TpsAutres=?, IdentifierEtat=? '.
								 'WHERE Identifier=?');
		$reponse->execute(array($this->getTpsDebit(), $this->getTpsCmdNumerique(), $this->getTpsFinition(), $this->getTpsAutres(), $this->getEtat()->getIdentifier(), $this->getIdentifier()));
		$reponse->closeCursor();
		
		//Met à jour les problèmes de qualité dans la BDD
		$tempPb = new ProblemeQlt();
		$tempPb->supprimeLiens($this->getIdentifier());
		$tempPb = null;
		foreach($this->getAPbQualites() as $pb)
		{
			$pb->insert($this->getIdentifier());
		}
		
		//Met à jour les remarques dans la BDD
		$tempRem = new Remarque();
		$tempRem->supprimeLiens($this->getIdentifier());
		$tempRem = null;
		foreach($this->getARemarques() as $rem)
		{
			$rem->insert($this->getIdentifier());
		}
	}
// Méthodes
}
?>