<?php

/**
 * Class User
 * This class will be used for any user function, including logging in and logging out.
 */
class User
{

    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function validateUser($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $this->db->query($sql);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        $row = $this->db->single();
        if(!empty($row)) {
            $_SESSION['logged_in'] = true;
            setcookie('user_login_site', $_POST['username'], time() + (86400 * 30));
            setcookie('user_login_key', sha1($_POST['password']), time() + (86400 * 30));

            return true;
        }
        return false;
    }

    public function logout() {
        unset($_SESSION['logged_in']);
        setcookie('user_login_site', "", time() - 3600);
        setcookie('user_login_key', "", time() - 3600);
    }
}

?>