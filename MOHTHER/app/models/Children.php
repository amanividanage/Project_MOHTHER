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

    public function getChildren(){
        $this->db->query("SELECT * FROM children WHERE midwife_id = ".$_SESSION['midwife_id']);

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

    //register child
    public function add($data){

        //$sessionId = $_SESSION['midwife_id'];
        $this->db->query("INSERT INTO children (midwife_id, parent, name, dob, date, hospital, weight, circumference, length, special) VALUES (:midwife_id, :parent, :name, :dob, :date, :hospital, :weight, :circumference, :length, :special)");

        //bind values
        $this->db->bindParam(':midwife_id',$data['midwife_id']);
        $this->db->bindParam(':parent',$data['parent']);

        $this->db->bindParam(':name',$data['name']);
        $this->db->bindParam(':dob',$data['dob']);
        $this->db->bindParam(':date',$data['date']);
        $this->db->bindParam(':hospital',$data['hospital']);
        $this->db->bindParam(':weight',$data['weight']);
        $this->db->bindParam(':circumference',$data['circumference']);
        $this->db->bindParam(':length',$data['length']);
        $this->db->bindParam(':special',$data['special']);
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    //add report
    public function addReport($data){
        $this->db->query("INSERT INTO childrecords (child_id, date, reportno, skin, eye, temp, umbilicus, other) VALUES (:child_id, :date, :reportno, :skin, :eye, :temp, :umbilicus, :other)");

        //bind values
        $this->db->bindParam(':child_id',$data['child_id']);
        $this->db->bindParam(':date',$data['date']);
        $this->db->bindParam(':reportno',$data['reportno']);
        $this->db->bindParam(':skin',$data['skin']);
        $this->db->bindParam(':eye',$data['eye']);
        $this->db->bindParam(':temp',$data['temp']);
        $this->db->bindParam(':umbilicus',$data['umbilicus']);
        $this->db->bindParam(':other',$data['other']);
         
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
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        return $row;
    }

    public function getChildrenByParent($nic){
        $this->db->query('SELECT * FROM children WHERE parent = :parent');
        $this->db->bindParam(':parent', $nic);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getChildById($id){
        $this->db->query('SELECT * FROM children WHERE child_id = :child_id');
        $this->db->bindParam(':child_id', $id);

        $row = $this->db->single();

        return $row;
    }
    
    public function getReportListByChild($id){
        $this->db->query('SELECT * FROM childrecords WHERE child_id = :child_id');
        $this->db->bindParam(':child_id', $id);

        $row = $this->db->resultSet();

        return $row;
    }
    
    // public function getAgeByChild($id){
    //     //$this->db->query('SELECT *, DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), dob)))  + 0 AS age FROM children WHERE child_id = :child_id');
        
    //     $this->db->bindParam(':child_id', $id);

        

    //     $row = $this->db->single();

    //     return $row;
    // }
}
