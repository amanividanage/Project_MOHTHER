<?php
class Clinicattendee{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    public function getProfile(){
        $this->db->query("SELECT * FROM registration WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        return $row;
    }

    

    //register user
    // public function register($data){
    //     $this->db->query("INSERT INTO registration (mname, nic, mage, gravidity, mlevelofeducation, moccupation, mcontactno, address, memail, hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail, gnd, phm, password) VALUES (:mname, :nic, :mage, :gravidity, :mlevelofeducation, :moccupation, :mcontactno, :address, :memail, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail, :gnd, :phm, :password)");

    //      //bind values
    //      $this->db->bindParam(':mname',$data['mname']);
    //      $this->db->bindParam(':nic',$data['nic']);
    //      $this->db->bindParam(':mage',$data['mage']);
    //      $this->db->bindParam(':gravidity',$data['gravidity']);
    //      $this->db->bindParam(':mlevelofeducation',$data['mlevelofeducation']);
    //      $this->db->bindParam(':moccupation',$data['moccupation']);
    //      $this->db->bindParam(':mcontactno',$data['mcontactno']);
    //      $this->db->bindParam(':address',$data['address']);
    //      $this->db->bindParam(':memail',$data['memail']);
    //      $this->db->bindParam(':hname',$data['hname']);
    //      $this->db->bindParam(':hage',$data['hage']);
    //      $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
    //      $this->db->bindParam(':hoccupation',$data['hoccupation']);
    //      $this->db->bindParam(':hcontactno',$data['hcontactno']);
    //      $this->db->bindParam(':hemail',$data['hemail']);
    //      $this->db->bindParam(':gnd',$data['gnd']);
    //      $this->db->bindParam(':phm',$data['phm']);
    //      $this->db->bindParam(':password',$data['password']);
         
    //      //execute
    //      if($this->db->execute()){
    //         return true;
    //      }else{
    //         return false;
    //      }
    // }

    //register user
    public function register($data){
        $this->db->query("INSERT INTO registration (mname, nic, mage, gravidity, mlevelofeducation, moccupation, mcontactno, address, memail, hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail, gnd) VALUES (:mname, :nic, :mage, :gravidity, :mlevelofeducation, :moccupation, :mcontactno, :address, :memail, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail, :gnd)");

         //bind values
         $this->db->bindParam(':mname',$data['mname']);
         $this->db->bindParam(':nic',$data['nic']);
         $this->db->bindParam(':mage',$data['mage']);
         $this->db->bindParam(':gravidity',$data['gravidity']);
         $this->db->bindParam(':mlevelofeducation',$data['mlevelofeducation']);
         $this->db->bindParam(':moccupation',$data['moccupation']);
         $this->db->bindParam(':mcontactno',$data['mcontactno']);
         $this->db->bindParam(':address',$data['address']);
         $this->db->bindParam(':memail',$data['memail']);
         $this->db->bindParam(':hname',$data['hname']);
         $this->db->bindParam(':hage',$data['hage']);
         $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
         $this->db->bindParam(':hoccupation',$data['hoccupation']);
         $this->db->bindParam(':hcontactno',$data['hcontactno']);
         $this->db->bindParam(':hemail',$data['hemail']);
         $this->db->bindParam(':gnd',$data['gnd']);
        
         
         //execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user
    public function login($nic, $password){
        $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
        $this->db->bindparam(':nic', $nic);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }

    //Login User
    /*public function login($nic, $password){
        $this->db->query('SELECT * FROM registration WHERE nic = :nic');
        $this->db->bindparam(':nic', $nic);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }*/


    //find clinic attendee by nic
    public function findClinicAttendeeByNic($nic){
        $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    //get clinic attendee by nic
    public function getClinicAttendeeByNic($nic){
        $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        return $row;
    }

    public function getchild_list(){
        
        $this->db->query("SELECT * FROM children WHERE parent = :parent");
        $this->db->bindParam(':parent', $_SESSION['clinicattendee_nic']);
        
        $results = $this->db->resultSet();

        return $results;
    }
    // $this->db->query("SELECT * FROM children WHERE parent = ".$_SESSION['clinicattendee_nic']);
    // $this->db->query("SELECT * FROM registration WHERE nic = :nic");
    //     $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
    //     $row = $this->db->single();
    
}