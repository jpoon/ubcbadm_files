<?php

require_once (dirname( __FILE__ ) . '\..\php\registrant.class.php');
require_once (dirname( __FILE__ ) . '\..\php\event.class.php');

class formProcess
{
	private $queryString;
	public function __construct() 
	{
		$this->queryString = $_SERVER['QUERY_STRING'];
		
		if( preg_match( '/register/', $this->queryString)) {
        	$this->tournamentRegistrant();
        } else {
			header("Location: /../index.php");
			exit;
        }
	}

	private function tournamentRegistrant() {
		$name = $_POST['registrantName'];
		$email = $_POST['email'];	
		$phone = $_POST['phone'];	
		$memberNo = $_POST['membershipNo'];		
		$gender = $_POST['gender'];
		
		if (isset($_POST['singles'])) {
			if ( strcmp($_POST['singlesLevel'],"inter") == 0 ) {
				$singlesLevel = "Intermediate";
			} else {
				$singlesLevel = "Advanced";
			}
			$singles = new Event();
			$singles->Set( "Singles", $singlesLevel );
			$eventList[] = $singles;
		}
		
		if (isset($_POST['mixed'])) {
			if ( strcmp($_POST['mixedLevel'],"inter") == 0 ) {
				$mixedLevel = "Intermediate";
			} else {
				$mixedLevel = "Advanced";
			}
			$mixedPartner = $_POST['mixedPartner'];
						
			$mixed = new Event();
			$mixed->Set( "Mixed", $mixedLevel, $mixedPartner );
			$eventList[] = $mixed;			
		}
		
		if (isset($_POST['doubles'])) {
			if ( strcmp($_POST['doublesLevel'],"inter") == 0 ) {
				$doublesLevel = "Intermediate";
			} else {
				$doublesLevel = "Advanced";
			}
			$doublesPartner = $_POST['doublesPartner'];
						
			$doubles = new Event();
			$doubles->Set( "Doubles", $doublesLevel, $doublesPartner );
			$eventList[] = $doubles;	
		}
		$registrant = new Registrant();
		$registrant->Set($name, $gender, $email, $phone, $memberNo, $eventList);
		$registrant->Save();
	} 
	
}

/* Initialize process */
$process = new formProcess();

?>
