
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
		return $this->_DateMesure;
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
// Properties

// Constructor
	function __construct($identifier = 0, $numCmd = 0, $montant = 0, $arrhes = 0, $dateCommande = null, $adresseChantier = '', $tpsDebit = 0, $tpsCmdNumerique = 0, $tpsFinition = 0, $tpsAutres = 0,
						 $delaiPrevu = null, $etat = null, $client = null, $contremarque = null, $mesure = null, $dateMesure = null, $aMateriaux = null, $aNatures = null, $aPrestations = null,
						 $datePrestations = null, $remarques = null, $pbQualites = null)
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
		$this->setAMateriaux($aMateriaux);
		$this->setANatures($aNatures);
		$this->setAPrestations($aPrestations);
		$this->setDatePrestations($datePrestations);
		$this->setARemarques($remarques);
		$this->setAPbQualites($pbQualites);
	}
// Constructor

// Méthodes
	//Retourne un booléen indiquant si la commande existe
	function isExisteCommande()
	{
		$isExists = false;
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('SELECT count(NumCmd) as count FROM Commande Where NumCmd=?');
		$reponse->execute(array($this->getNumeroCommande()));
		
		while($donnees = $reponse->fetch())
		{
			if($donnees['count'] > 0)
			{
				$isExists = true;
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
			if($this->getContremarque()->getIdentifier() == 0)
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
// Méthodes
}
?>