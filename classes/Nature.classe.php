<?php
class Nature
{
// Attributs
	private $_Identifier;
	private $_Label;
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
// Properties

// Constructor
	function __construct($identifier = 0, $label = '')
	{
		$this->setIdentifier($identifier);
		$this->setLabel($label);
	}
// Constructor

// Méthodes
	function insertLien($idCommande)
	{print_r('idCommande : '.$idCommande.'<br/>idNature : '.$this->getIdentifier());
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('INSERT INTO Commande_Nature (Identifier_Commande, Identifier_Nature) VALUES (?, ?)');
		$reponse->execute(array($idCommande, $this->getIdentifier()));
		$reponse->closeCursor();
	}
	
	function supprimeLiens($idCommande)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('DELETE FROM Commande_Nature WHERE Identifier_Commande=?');
		$reponse->execute(array($idCommande));
		$reponse->closeCursor();
	}
// Méthodes
}
?>