<?php
    require_once (dirname( __FILE__ ) . '/php/database.class.php');

    $db = new Database();

    $db->TableSelect(DB_TBL_NAME);

    $query = sprintf("SELECT * FROM %s", TOURNAMENT_TBL_NAME);
                        
    $result = mysql_query($query)
        OR die ("Could not perform query : " . mysql_error());
                
    echo "  <table>
                <tr>
                    <td>Register No.</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Gender</td>
                    <td>Membership No.</td>
                    <td>Singles</td>
                    <td>Mixed</td>
                    <td>Mixed Partner</td>
                    <td>Doubles</td>
                    <td>Doubles Partner</td>
                </tr>";

    while ( $row= mysql_fetch_array($result) ) {
        $registerNo     = $row["RegisterNo"];
        $fullName       = $row["Name"];
        $email          = $row["Email"];
        $phone          = $row["Phone"];
        $gender         = $row["Gender"];
        $membershipNo   = $row["MembershipNo"];
        $singles        = $row["Singles"];
        $mixed          = $row["Mixed"];
        $mixedPartner   = $row["MixedPartner"];
        $doubles        = $row["Doubles"];
        $doublesPartner = $row["DoublesPartner"]; 
        
        echo "  <tr>
                    <td>$registerNo</td>
                    <td>$fullName</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$gender</td>
                    <td>$membershipNo</td>
                    <td>$singles</td>
                    <td>$mixed</td>
                    <td>$mixedPartner</td>
                    <td>$doubles</td>
                    <td>$doublesPartner</td>
                </tr>";       
    }
    
    echo "</table></p>";
            
?>
