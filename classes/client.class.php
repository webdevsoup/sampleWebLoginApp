<?php

class Clients {

    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * @return array $clients - associative array of all clients.
     */

    public function getAllClients() {
        $sql = "SELECT * FROM clients";
        $this->db->query($sql);
        $clients = $this->db->resultset();

        if(!empty($clients)) {
            return $clients;
        }
        return array();
    }
}

?>