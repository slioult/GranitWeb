<?php
class Mesure
{
// Attributs
	private $_Identifier;
	private $_Label;
	private $_Display;
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
	
	function getDisplay()
	{
		return $this->_Display;
	}
	function setDisplay($display)
	{
		$this->_Display = $display;
	}
// Properties

// Constructor
	function __construct($identifier = 0, $label = '', $display = false)
	{
		$this->setIdentifier($identifier);
		$this->setLabel($label);
		$this->setDisplay($display);
	}
// Constructor
}
?>