<?php
class Contremarque
{
// Attributs
	private $_Identifier;
	private $_Nom;
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
	
	function getNom()
	{
		return $this->_Nom;
	}
	function setNom($nom)
	{
		$this->_Nom = $nom;
	}
// Properties

// Constructor
	function __construct($identifier = 0, $nom = '')
	{
		$this->setIdentifier($identifier);
		$this->setNom($nom);
	}
// Constructor

// Méthodes
	function getId()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('SELECT Identifier FROM Contremarque WHERE Nom=?');
		$reponse->execute(array($this->getNom()));
		while($donnees = $reponse->fetch())
		{
			$this->setIdentifier($donnees['Identifier']);
		}
		
		$reponse->closeCursor();
	}
	
	function insert()
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('INSERT INTO Contremarque (Nom) VALUES (?)');
		$reponse->execute(array($this->getNom()));
		
		$reponse->closeCursor();
	}
// Méthodes
}
?>