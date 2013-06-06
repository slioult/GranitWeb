<?php
class Remarque
{
// Attributs
	private $_Identifier;
	private $_Source;
	private $_DateHeure;
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
	function __construct($identifier = 0, $source = '', $dateHeure = '', $commentaire = '')
	{
		$this->setIdentifier($identifier);
		$this->setSource($source);
		$this->setDateHeure($dateHeure);
		$this->setCommentaire($commentaire);
	}
// Constructor

// Méthodes
	function isRemarqueExiste()
	{
		$isExists = false;
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('SELECT count(Identifier) as count FROM Remarque WHERE Identifier=?');
		$reponse->execute(array($this->getIdentifier()));
		
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
	
	function insert($idCommande)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('INSERT INTO Remarque (Commentaire, Source, Date, IdentifierCommande) VALUES (?, ?, ?, ?)');
		$reponse->execute(array($this->getCommentaire(), $this->getSource(), $this->getDateHeure(), $idCommande));
		$reponse->closeCursor();
	}
	
	function supprimeLiens($idCommande)
	{
		$bdd = new PDO('mysql:host=localhost;dbname=production', 'granit', 'granit');
		$reponse = $bdd->prepare('DELETE FROM Remarque WHERE IdentifierCommande=?');
		$reponse->execute(array($idCommande));
		$reponse->closeCursor();
	}
// Méthodes
}
?>