<?php
class Qualite
{
// Attributs
	private $_Identifier;
	private $_Type;
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
	
	function getType()
	{
		return $this->_Type;
	}
	function setType($type)
	{
		$this->_Type = $type;
	}
// Properties

// Constructor
	function __construct(, $identifier = 0, $type = '')
	{
		$this->_Identifier = setIdentifier($identifier);
		$this->_Type = setType($type);
	}
// Constructor
}
?>