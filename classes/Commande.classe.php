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
// Attributs
	
// Properties
	function getIdentifier()
	{
		return $this->$_Identifier;
	}
	function setIdentifier($identifier)
	{
		$this->_Identifier = $identifier;
	}
	
	function getNumeroCommande()
	{
		return $this->$_NumeroCommande;
	}
	function setNumeroCommande($numeroCommande)
	{
		$this->_NumeroCommande = $numeroCommande;
	}
	
	function getMontant()
	{
		return $this->$_Montant;
	}
	function setMontant($montant)
	{
		$this->_Montant = $montant;
	}
	
	function getArrhes()
	{
		return $this->$_Arrhes;
	}
	function setArrhes($arrhes)
	{
		$this->_Arrhes = $arrhes;
	}
	
	function getDateCommande()
	{
		return $this->$_DateCommande;
	}
	function setDateCommande($dateCommande)
	{
		$this->_DateCommande = $dateCommande;
	}
	
	function getAdresseChantier()
	{
		return $this->$_AdresseChantier;
	}
	function setAdresseChantier($adresseChantier)
	{
		$this->_AdresseChantier = $adresseChantier;
	}
	
	function getTpsDebit()
	{
		return $this->$_TpsDebit;
	}
	function setTpsDebit($tpsDebit)
	{
		$this->_TpsDebit = $tpsDebit;
	}
	
	function getTpsCmdNumerique()
	{
		return $this->$_TpsCmdNumerique;
	}
	function setTpsCmdNumerique($tpsCmdNumerique)
	{
		$this->_TpsCmdNumerique = $tpsCmdNumerique;
	}
	
	function getTpsFinition()
	{
		return $this->$_TpsFinition;
	}
	function setTpsFinition($tpsFinition)
	{
		$this->_TpsFinition = $tpsFinition;
	}
	
	function getTpsAutres()
	{
		return $this->$_TpsAutres;
	}
	function setTpsAutres($tpsAutres)
	{
		$this->_TpsAutres = $tpsAutres;
	}
	
	function getDelaiPrevu()
	{
		return $this->$_DelaiPrevu;
	}
	function setDelaiPrevu($delaiPrevu)
	{
		$this->_DelaiPrevu = $delaiPrevu;
	}
	
	function getEtat()
	{
		return $this->$_Etat;
	}
	function setEtat($etat)
	{
		$this->_Etat = $etat;
	}
	
	function getClient()
	{
		return $this->$_Client;
	}
	function setClient($client)
	{
		$this->_Client = $client;
	}
	
	function getContremarque()
	{
		return $this->$_Contremarque;
	}
	function setContremarque($contremarque)
	{
		$this->_Contremarque = $contremarque;
	}
	
	function getMesure()
	{
		return $this->$_Mesure;
	}
	function setMesure($mesure)
	{
		$this->_Mesure = $mesure;
	}
	
	function getDateMesure()
	{
		return $this->$_DateMesure;
	}
	function setDateMesure($dateMesure)
	{
		$this->_DateMesure = $dateMesure;
	}
	
	function getAMateriaux()
	{
		return $this->$_AMateriaux;
	}
	function setAMateriaux($aMateriaux)
	{
		$this->_AMateriaux = $aMateriaux;
	}
	
	function getANatures()
	{
		return $this->$_ANatures;
	}
	function setANatures($aNatures)
	{
		$this->_ANatures = $aNatures;
	}
	
	function getAPrestations()
	{
		return $this->$_APrestations;
	}
	function setAPrestations($aPrestations)
	{
		$this->_APrestations = $aPrestations;
	}
	
	function getDatePrestations()
	{
		return $this->$_DatePrestations;
	}
	function setDatePrestations($datePrestations)
	{
		$this->_DatePrestations = $datePrestations;
	}
// Properties

// Constructor
	function __construct($identifier = 0, $numCmd = 0, $montant = 0, $arrhes = 0, $dateCommande = null, $adresseChantier = '', $tpsDebit = 0, $tpsCmdNumerique = 0, $tpsFinition = 0, $tpsAutres = 0,
						 $delaiPrevu = null, $etat = null, $client = null, $contremarque = null, $mesure = null, $dateMesure = null, $aMateriaux = null, $aNatures = null, $aPrestations = null,
						 $datePrestations = null)
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
		$this->setANatures(aNatures);
		$this->setAPrestations($aPrestations);
		$this->setDatePrestations($datePrestations);
	}
// Constructor
}
?>