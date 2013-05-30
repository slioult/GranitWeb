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
		$this->_Identifier = setIdentifier($identifier);
		$this->_Label = setLabel($label);
		$this->_Epaisseur = setEpaisseur($epaisseur);
	}
// Constructor
}
?>