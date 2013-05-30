<?php
class Prestation
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
		$this->_Identifier = setIdentifier($identifier);
		$this->_Label = setLabel($label);
	}
// Constructor
}
?>