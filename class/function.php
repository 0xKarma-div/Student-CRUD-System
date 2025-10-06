<?php
class UserAuth {
    private $dbh;
    
    function __construct() {
        require_once 'DBController.php';
        $db_handle = new DBController();
        $this->dbh = $db_handle->connectDB();
    }
    
    // For username availability
    public function usernameavailblty($uname) {
        $result = mysqli_query($this->dbh, "SELECT Username FROM tblusers WHERE Username='$uname'");
        return $result;
    }
    
    // Function for registration
    public function registration($fname, $uname, $uemail, $pasword) {
        $ret = mysqli_query($this->dbh, "INSERT INTO tblusers(FullName, Username, UserEmail, Password, UserRole) VALUES('$fname','$uname','$uemail','$pasword','viewer')");
        return $ret;
    }
    
    // Function for signin
    public function signin($uname, $pasword) {
        $result = mysqli_query($this->dbh, "SELECT id, FullName, UserRole FROM tblusers WHERE Username='$uname' AND Password='$pasword'");
        return $result;
    }
}
?>