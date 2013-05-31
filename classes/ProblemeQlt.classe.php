<?php
class ProblemeQlt
{
// Attributs
	private $_Identifier;
	private $_Source;
	private $_DateHeure;
	private $_Qualite;
	private $_Commentaire;
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
	
	function getSource()
	{
		return $this->_Source;
	}
	function setSource($source)
	{
		$this->_Source = $source;
	}
	
	function getDateHeure()
	{
		return $this->_DateHeure;
	}
	function setDateHeure($dateHeure)
	{
		$this->_DateHeure = $dateHeure;
	}
	
	function getQualite()
	{
		return $this->_Qualite;
	}
	function setQualite($qualite)
	{
		$this->_Qualite = $qualite;
	}
	
	function getCommentaire()
	{
		return $this->_Commentaire;
	}
	function setCommentaire($commentaire)
	{
		$this->_Commentaire = $commentaire;
	}
// Properties

// Constructor
	function __construct($identifier = 0, $source = '', $dateHeure = '', $qualite = null, $commentaire = '')
	{
		$this->setIdentifier($identifier);
		$this->setSource($source);
		$this->setDateHeure($dateHeure);
		$this->setQualite($qualite);
		$this->setCommentaire($commentaire);
	}
// Constructor

// M�thodes
	function insert($idCommande)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('INSERT INTO Commande_Qualite (Identifier_Commande, Identifier_Qualite, Source, DateProbleme, Remarque) VALUES (?,?,?,?,?)');
		$q = $this->getQualite();
		$reponse->execute(array($idCommande, $q->getIdentifier(), $this->getSource(), $this->getDateHeure(), $this->getCommentaire()));
		$reponse->closeCursor();
	}
// M�thodes
}
?>