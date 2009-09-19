<?php

require_once (dirname( __FILE__ ) . '\..\php\config.php');

class Event {
    private $eventType;
    private $eventLevel;
    private $partnerName;

	public function __construct() {
		$this->eventType = "";
		$this->eventLevel = "";
		$this->partnerName = "";
	}

    public function Set( $type, $level, $name = null ) {
    	$this->eventType = $type;
        $this->eventLevel = $level;
        $this->partnerName = $name;
    }
    
    public function Get( ) {
    	if ( $this->eventType == "Singles" ) {
    		return array($this->eventType, $this->eventLevel);
    	} else {
	    	return array($this->eventType, $this->eventLevel, $this->partnerName);	
    	}
    }
        
	public function __toString() {
        return 	(string) 
				"<table cellpadding=\"6px\">
            		<tr><td width=\"60px\">". $this->eventType ."</td><td width=\"75px\">". $this->eventLevel ."</td><td width=\"100px\">". $this->partnerName ."</td></tr>
				</table>";
    }
}
?>

