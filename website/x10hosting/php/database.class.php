<?php

require_once (dirname( __FILE__ ) . '\..\php\config.php');

class Database {
    private $dbConnection;

    public function __construct() {
        $this->dbConnect();
    }

	public function TableSelect( $table ) {
        mysql_select_db($table);		
	}
    
	public function clean($input) {
        return mysql_real_escape_string($input);
    }
        	
    public function __destruct() {
        mysql_close($this->dbConnection);
    }
        
    private function dbConnect() {;
        $this->dbConnection = sqlite_open(DB_HOST, DB_USER, DB_PASS);
        if ( !$this->dbConnection ) {
            echo mysql_error();
    	}
    }    
}

?>

