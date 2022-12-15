<?php
class User{

    private $db;
    

    public function __construct(){
        $this->db = new Database;
    }
    public function getUsers(){
        $this->db->query("SELECT * FROM expectant");

        $results = $this->db->resultSet();

        return $results;
    }
    public function getExpectantemail(){
        $this->db->query('SELECT  memail FROM registration');
        $results = $this->db->single();
        return $results;
    }
    public function getExpectantnic(){
        $this->db->query('SELECT  nic FROM registration');
        $results =  $this->db->single();
        return $results;
    }


    public function getExpectantRecords(){
        $this->db->query('SELECT nic, height, weight FROM expectant');
        $results =  $this->db->resultSet();
        return $results;
    }
    public function displayExpectantRecords($nic){
        $this->db->query("SELECT *
                         FROM registration
                         WHERE nic= :nic"
                         
                         );
                         $this->db->bindParam(':nic', $nic); 
        $results =  $this->db->single();
        return $results;
    }


     
     public function email($data){
        $this->db->query('INSERT INTO logincredentials (expectantnic,expectantemail,password) VALUES (:expectantnic,:expectantemail,:password');
        
        //bind values
        $this->db->bindParam(':expectantnic', $data['expectantnic']);
        $this->db->bindParam(':expectantemail', $data['expectantemail']);
        $this->db->bindParam(':password', $data['password']);
       

        //execute for update/delete
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }
    //register user
    public function register($data){
        $this->db->query('INSERT INTO expectant (midwife_id,nic,name,height,weight, bloodPressure,allergies, consanguinity, rubellaImmunization, prePregnancyScreening, preconceptionalFolicAcid, subfertility,gravidity,noofChildren,ageofYoungest,lastMenstrualDate,registrationDate,expectedDateofDelivery,password) VALUES(:midwife_id,:nic,:name,:height,:weight,:bloodPressure,:allergies,:consanguinity,:rubellaImmunization,:prePregnancyScreening,:preconceptionalFolicAcid,:subfertility,:gravidity,:noofChildren,:ageofYoungest,:lastMenstrualDate,:registrationDate,:expectedDateofDelivery,:password)');
        
        //bind values
        $this->db->bindParam(':midwife_id', $data['midwife_id']);
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':name', $data['name']);
        $this->db->bindParam(':height', $data['height']);
        $this->db->bindParam(':weight', $data['weight']);
        $this->db->bindParam(':bloodPressure', $data['bloodPressure']);
        $this->db->bindParam(':allergies', $data['allergies']);
        $this->db->bindParam(':consanguinity', $data['consanguinity']);
        $this->db->bindParam(':rubellaImmunization', $data['rubellaImmunization']);
        $this->db->bindParam(':prePregnancyScreening', $data['prePregnancyScreening']);
        $this->db->bindParam(':preconceptionalFolicAcid', $data['preconceptionalFolicAcid']);
        $this->db->bindParam(':subfertility', $data['subfertility']);
        $this->db->bindParam(':gravidity', $data['gravidity']);
        $this->db->bindParam(':noofChildren', $data['noofChildren']);
        $this->db->bindParam(':ageofYoungest', $data['ageofYoungest']);
        $this->db->bindParam(':lastMenstrualDate', $data['lastMenstrualDate']);
        $this->db->bindParam(':registrationDate', $data['registrationDate']);
        $this->db->bindParam(':expectedDateofDelivery', $data['expectedDateofDelivery']);
        $this->db->bindParam(':password', $data['password']);
       // $this->db->bind(':bmi', $data['bmi']);
       // $this->db->bind(':output', $data['output']);

        //execute for update/delete
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }


    }


    //find user by NIC

   public function findUserByNIC($nic){
       $this->db->query('SELECT * FROM expectant WHERE nic= :nic');
        $this->db->bindParam('nic', $nic);

         $row = $this->db->single();

         //check row
         if( $this->db->rowCount()>0){
            return true;
         }else{
            return false;
        }
    }
    public function getUserByNIC($nic){
        $this->db->query('SELECT * FROM expectant WHERE nic= :nic');
        $this->db->bindParam('nic', $nic);
    
        $row = $this->db->single();
    
        return $row;
}
}

   

    
