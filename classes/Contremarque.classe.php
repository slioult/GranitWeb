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
		$this->_Identifier = setIdentifier($identifier);
		$this->_Nom = setNom($nom);
	}
// Constructor
}
?>