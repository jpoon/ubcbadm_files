<?php

require_once (dirname( __FILE__ ) . '\..\php\config.php');
require_once (dirname( __FILE__ ) . '\..\php\database.class.php');

class User extends Database  {

    public function User() {
        parent::Database();
    }

    public function Destroy() {
        parent::dbDisconnect();
    }

    /*
     * usernameAvailable
     * Returns true if the username is available for use, false otherwise.
     */
    public function usernameAvailable($username){
        $query = sprintf("SELECT Username FROM %s WHERE Username = '%s'",
            TBL_USERS,
            $this->clean($username) );
        $result = mysql_query($query)
            OR die ("Could not perform query : " . mysql_error());

        return (mysql_num_rows($result) == 0);
    }

    /*
     * verifyLogin
     * Returns true if username and password combination are correct, returns false otherwise.
     */
    public function verifyLogin($username, $password) {
        $query = sprintf("SELECT * FROM %s WHERE Username = '%s' AND Password = '%s'",
                    TBL_USERS,
                    $this->clean($username),
                    $this->clean(md5($password)));

        $result = mysql_query($query)
            OR die ("Could not perform query : " . mysql_error());

        if( mysql_num_rows($result) == 1 ) {
            return true;
        } else {
            return false;
        }
    }

    private function clean($input) {
        return mysql_real_escape_string($input);
    }
}
?>
