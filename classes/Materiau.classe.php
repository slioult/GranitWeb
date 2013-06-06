<?php
class Materiau
{
// Attributs
	private $_Identifier;
	private $_Label;
	private $_Epaisseur;
// Attributs

// Properties (accesseurs)
	function getIdentifier()
	{
		return $this->_Identifier;
	}
	function setIdentifier($identifier)
	{
		$this->_Identifier = $identifier;
	}
	
	function getLabel()
	{
		return $this->_Label;
	}
	function setLabel($label)
	{
		$this->_Label = $label;
	}
	
	function getEpaisseur()
	{
		return $this->_Epaisseur;
	}
	function setEpaisseur($epaisseur)
	{
		$this->_Epaisseur = $epaisseur;
	}
// Properties

// Constructor
	function __construct($identifier = 0, $label, $epaisseur = 0)
	{
		$this->setIdentifier($identifier);
		$this->setLabel($label);
		$this->setEpaisseur($epaisseur);
	}
// Constructor

// Méthodes
	function insertLien($idCommande)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('INSERT INTO Commande_Materiau (Identifier_Commande, Identifier_Materiau, Epaisseur) VALUES (?, ?, ?)');
		$reponse->execute(array($idCommande, $this->getIdentifier(), $this->getEpaisseur()));
		$reponse->closeCursor();
	}
	
	function supprimeLiens($idCommande)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('DELETE FROM Commande_Materiau WHERE Identifier_Commande=?');
		$reponse->execute(array($idCommande));
		$reponse->closeCursor();
	}
// Méthodes
}
?>