<?php
class ExpectantRecord {

    private $db;

    public function __construct(){

        $this->db =new Database;
    }
   /* public function getExpectantRecords(){
        $this->db->query('SELECT nic, height, weight FROM expectant');
        $results =  $this->db->resultSet();
        return $results;
    }*/

      public function getExpectantRecords(){
        $this->db->query('SELECT registration.nic, mfirstName, memail, mcontactno,registrationDate,expectedDateofDelivery
                         FROM expectant
                         INNER JOIN registration
                         ON registration.nic = expectant.nic
                         
                         ');
        $results =  $this->db->resultSet();
        return $results;
    }
}
