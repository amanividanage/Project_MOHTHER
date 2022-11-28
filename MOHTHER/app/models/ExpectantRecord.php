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

    public function filterExpectantRecords(){
        $this->db->query ("SELECT * 
        FROM expectant
        WHERE nic LIKE '%".$valueToSearch."%'");
        $results =  $this->db->resultSet();
        return $results;
    }

    public function add($data){
        $this->db->query('INSERT INTO detailrecords_Expectant (nic,reportNo,date,weight, vaccination,ironorForlate,vitaminC, calcium, antimarialDrugs, triposha) VALUES(:nic,:reportNo,:date,:weight,:vaccination,:ironorForlate,:vitaminC,:calcium,:antimarialDrugs,:triposha)');
        
        //bind values
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':reportNo', $data['reportNo']);
        $this->db->bindParam(':date', $data['date']);
        $this->db->bindParam(':weight', $data['weight']);
        $this->db->bindParam(':vaccination', $data['vaccination']);
        $this->db->bindParam(':ironorForlate', $data['ironorForlate']);
        $this->db->bindParam(':vitaminC', $data['vitaminC']);
        $this->db->bindParam(':calcium', $data['calcium']);
        $this->db->bindParam(':antimarialDrugs', $data['antimarialDrugs']);
        $this->db->bindParam(':triposha', $data['triposha']);
      
        //execute for update/delete
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    
}
}