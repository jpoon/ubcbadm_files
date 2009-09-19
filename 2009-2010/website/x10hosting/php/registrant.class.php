<?php
require_once (dirname(__FILE__) . '\..\php\config.php');
require_once (dirname(__FILE__) . '\..\php\database.class.php');

class Registrant {
	private $database;
	private $name;
	private $gender;
	private $email;
	private $phone;
	private $memberNum;
	private $events;

	public function __construct() {
		$this->database = new Database();
		$this->name = "";
		$this->gender = "";
		$this->email = "";
		$this->phone = "";
		$this->events = "";
	}

	public function __destruct() {
	}

	public function Set($name, $gender, $email, $phone, $memberNum, $events) {
		$this->name = $name;
		$this->gender = $gender;
		$this->email = $email;
		$this->phone = $phone;
		$this->memberNum = $memberNum;
		$this->events = $events;
	}

	public function Save() {
		echo "save";
		$this->database->TableSelect(DB_TBL_NAME);

		$singles = "Null";
		$mixed = "Null";
		$mixedPartner = "";
		$doubles = "Null";
		$doublesPartner = "";

		foreach ($this->events as & $event) {
			$eventDetails = $event->Get();

			$eventType = $eventDetails[0];
			$eventLevel = $eventDetails[1];

			switch ($eventType) {
				case "Singles" :
					$singles = $eventLevel;
					break;
				case "Mixed" :
					$mixed = $eventLevel;
					$mixedPartner = $eventDetails[2];
					break;
				case "Doubles" :
					$doubles = $eventLevel;
					$doublesPartner = $eventDetails[2];
					break;
			}
		}

		$query = sprintf("INSERT INTO %s (Name, Email, Phone, Gender, MembershipNo, Singles, Mixed, MixedPartner, Doubles, DoublePartner)
			                    VALUES ( '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", TOURNAMENT_TBL_NAME, $this->database->clean($this->name), $this->database->clean($this->email), $this->database->clean($this->phone), $this->database->clean($this->gender), $this->database->clean($this->memberNum), $this->database->clean($singles), $this->database->clean($mixed), $this->database->clean($mixedPartner), $this->database->clean($doubles), $this->database->clean($doublesPartner));

		$result = mysql_query($query);
		if (!$result) {
    		echo mysql_error();
		}
	}

	public function __toString() {
		$echo = "";
		foreach ($this->events as & $event) {
			$echo .= $event;
		}
		return (string) "<table border=\"1\" cellpadding=\"6px\">
			            		<tr>
									<td width=\"100px\">Full Name:</td><td>" . $this->name . "</td>
								</tr>
								<tr>
									<td>Email:</td><td>" . $this->email . "</td>
								</tr>
								<tr>
									<td>Phone:</td><td>" . $this->phone . "</td>
								</tr>
								<tr>
									<td>Membership ID:</td><td>" . $this->memberNum . "</td>
								</tr>
								<tr>
									<td>Gender:</td><td>" . $this->gender . "</td>
								</tr>
								<tr>
									<td>Events:</td><td>" . $echo . "</td>
								</tr>
							</table>";
	}
}
?>
