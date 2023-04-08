<?php
class Children_expectant{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    //register child
    public function add($data){

        //$sessionId = $_SESSION['midwife_id'];
        $this->db->query("INSERT INTO children (phm, parent, name, dob, date, hospital, weight, circumference, length, special) VALUES (:phm, :parent, :name, :dob, :date, :hospital, :weight, :circumference, :length, :special)");

        //bind values
        $this->db->bindParam(':phm',$data['phm']);
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
    
  
}
