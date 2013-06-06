<?php
class MyTime
{
	// Attributs
	private $_Jour;
	private $_Mois;
	private $_Annee;
	private $_Heure;
	private $_Minute;
	private $_Seconde;
	// Attributs
	
	// Properties
	function getJour()
	{
		return $this->_Jour;
	}
	function setJour($jour)
	{
		$this->_Jour = $jour;
	}
	
	function getMois()
	{
		return $this->_Mois;
	}
	function setMois($mois)
	{
		$this->_Mois = $mois;
	}
	
	function getAnnee()
	{
		return $this->_Annee;
	}
	function setAnnee($annee)
	{
		$this->_Annee = $annee;
	}
	
	function getHeure()
	{
		return $this->_Heure;
	}
	function setHeure($heure)
	{
		$this->_Heure = $heure;
	}
	
	function getMinute()
	{
		return $this->_Minute;
	}
	function setMinute($minute)
	{
		$this->_Minute = $minute;
	}
	
	function getSeconde()
	{
		return $this->_Seconde;
	}
	function setSeconde($seconde)
	{
		$this->_Seconde = $seconde;
	}
	// Properties
	
	// Constructor
	function __construct($jour = 0, $mois = 0, $annee = 0, $heure = 0, $minute = 0, $seconde = 0)
	{
		$this->_Jour = $jour;
		$this->_Mois = $mois;
		$this->_Annee = $annee;
		$this->_Heure = $heure;
		$this->_Minute = $minute;
		$this->_Seconde = $seconde;
	}
	// Constructor
	
	// Méthodes	
	function formatDateAffichage()
	{
		if($this->getJour() < 10 && strlen($this->getJour()) == 1){$this->setJour('0'.$this->getJour());}
		if($this->getMois() < 10 && strlen($this->getMois()) == 1){$this->setMois('0'.$this->getMois());}
		
		return $this->getJour().'/'.$this->getMois().'/'.$this->getAnnee();
	}
	
	function formatDateTimeAffichage()
	{
		if($this->getJour() < 10 && strlen($this->getJour()) == 1){$this->setJour('0'.$this->getJour());}
		if($this->getMois() < 10 && strlen($this->getMois()) == 1){$this->setMois('0'.$this->getMois());}
		if($this->getHeure() < 10 && strlen($this->getHeure()) == 1){$this->setHeure('0'.$this->getHeure());}
		if($this->getMinute() < 10 && strlen($this->getMinute()) == 1){$this->setMinute('0'.$this->getMinute());}
		if($this->getSeconde() < 10 && strlen($this->getSeconde()) == 1){$this->setSeconde('0'.$this->getSeconde());}
		
		return $this->getJour().'/'.$this->getMois().'/'.$this->getAnnee().' '.$this->getHeure().'h'.$this->getMinute();
	}
	
	function SDate($sdate)
	{
		$array = explode(" ", $sdate);
		$date = explode("-", $array[0]);
		$time = explode(":", $array[1]);
		
		$this->setJour($date[0]);
		$this->setMois($date[1]);
		$this->setAnnee($date[2]);
		$this->setHeure($time[0]);
		$this->setMinute($time[1]);
		$this->setSeconde($time[2]);
	}
	
	function DBDate($sdate)
	{
		$array = explode(" ", $sdate);
		$date = explode("-", $array[0]);
		$time = explode(":", $array[1]);
		
		$this->setJour($date[2]);
		$this->setMois($date[1]);
		$this->setAnnee($date[0]);
		$this->setHeure($time[0]);
		$this->setMinute($time[1]);
		$this->setSeconde($time[2]);
	}
	
	function FTBDD()
	{
		if($this != new MyTime())
		{
			if($this->getJour() < 10 && strlen($this->getJour()) == 1){$this->setJour('0'.$this->getJour());}
			if($this->getMois() < 10 && strlen($this->getMois()) == 1){$this->setMois('0'.$this->getMois());}
			if($this->getHeure() < 10 && strlen($this->getHeure()) == 1){$this->setHeure('0'.$this->getHeure());}
			if($this->getMinute() < 10 && strlen($this->getMinute()) == 1){$this->setMinute('0'.$this->getMinute());}
			if($this->getSeconde() < 10 && strlen($this->getSeconde()) == 1){$this->setSeconde('0'.$this->getSeconde());}
			return $this->getAnnee().'-'.$this->getMois().'-'.$this->getJour().' '.$this->getHeure().':'.$this->getMinute().':'.$this->getSeconde();
		}
		else
		{
			return null;
		}
	}
	
	function MinToHMin()
	{
		$this->setHeure(floor($this->getMinute() / 60));
		$this->setMinute($this->getMinute() % 60);
	}
	
	function Equals($mdt)
	{
		if($this->getJour() == $mdt->getJour() AND $this->getMois() == $mdt->getMois() AND $this->getAnnee() == $mdt->getAnnee() AND $this->getHeure() == $mdt->getHeure() AND
			$this->getMinute() == $mdt->getMinute() AND $this->getSeconde() == $mdt->getSeconde())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	// Méthodes
}
?>