<?php
class Children{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    //get parent list
    public function getParentList(){
        $this->db->query("SELECT * FROM parent WHERE midwife_id = ".$_SESSION['midwife_id']);

        $results = $this->db->resultSet();

        return $results;
    }

    //register user
    public function parent($data){

        //$sessionId = $_SESSION['midwife_id'];
        $this->db->query("INSERT INTO parent (midwife_id, relationship, name, nic, age, nochildren, levelofeducation, occupation, contactno, address, email, gnd, phm, password) VALUES (:midwife_id, :relationship, :name, :nic, :age, :nochildren, :levelofeducation, :occupation, :contactno, :address, :email, :gnd, :phm, :password)");

        //bind values
        $this->db->bindParam(':midwife_id',$data['midwife_id']);
        $this->db->bindParam(':relationship',$data['relationship']);

        $this->db->bindParam(':name',$data['name']);
        $this->db->bindParam(':nic',$data['nic']);
        $this->db->bindParam(':age',$data['age']);
        $this->db->bindParam(':nochildren',$data['nochildren']);
        $this->db->bindParam(':levelofeducation',$data['levelofeducation']);
        $this->db->bindParam(':occupation',$data['occupation']);
        $this->db->bindParam(':contactno',$data['contactno']);
        $this->db->bindParam(':address',$data['address']);
        $this->db->bindParam(':email',$data['email']);

       /* $this->db->bindParam(':fname',$data['fname']);
        $this->db->bindParam(':fnic',$data['fnic']);
        $this->db->bindParam(':fage',$data['fage']);
        $this->db->bindParam(':fnochildren',$data['fnochildren']);
        $this->db->bindParam(':flevelofeducation',$data['flevelofeducation']);
        $this->db->bindParam(':foccupation',$data['foccupation']);
        $this->db->bindParam(':fcontactno',$data['fcontactno']);
        $this->db->bindParam(':faddress',$data['faddress']);
        $this->db->bindParam(':femail',$data['femail']);

        $this->db->bindParam(':gname',$data['gname']);
        $this->db->bindParam(':gnic',$data['gnic']);
        $this->db->bindParam(':gage',$data['gage']);
        $this->db->bindParam(':gnochildren',$data['gnochildren']);
        $this->db->bindParam(':glevelofeducation',$data['glevelofeducation']);
        $this->db->bindParam(':goccupation',$data['goccupation']);
        $this->db->bindParam(':gcontactno',$data['gcontactno']);
        $this->db->bindParam(':gaddress',$data['gaddress']);
        $this->db->bindParam(':gemail',$data['gemail']);*/

        $this->db->bindParam(':gnd',$data['gnd']);
        $this->db->bindParam(':phm',$data['phm']);
        $this->db->bindParam(':password',$data['password']);
         
        //execute
        if($this->db->execute()){
        return true;
        }else{
        return false;
        }
    }

    
    //find clinic attendee by nic
    public function findParentByNic($nic){
        $this->db->query('SELECT * FROM parent WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        //check row
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getParentById($nic){
        $this->db->query('SELECT * FROM parent WHERE nic = :nic');
        $this->db->bindParam(':mnic', $nic);

        $row = $this->db->single();

        return $row;
    }
}
