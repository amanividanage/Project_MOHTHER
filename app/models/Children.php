<?php
class Children{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    //get parent list
    public function getParentList(){
        $this->db->query("SELECT parent.nic, parent.relationship, parent.name, parent.occupation, parent.contactno, parent.email FROM parent, midwife_clinic WHERE midwife_clinic.phm = parent.phm AND midwife_clinic.nic = :midwife_nic");

        $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getChildren(){
        $this->db->query("SELECT * FROM children, midwife_clinic WHERE midwife_clinic.phm = children.phm AND midwife_clinic.nic = :midwife_nic");

        $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);

        $results = $this->db->resultSet();

        return $results;
    }

    public function findPHM(){
        $this->db->query('SELECT * FROM midwife_clinic WHERE nic= :nic');

        $this->db->bindParam('nic', $_SESSION['midwife_nic']);
    
        $row = $this->db->single();
    
        return $row;
    }

    //register user
    public function parent($data){

        //$sessionId = $_SESSION['midwife_id'];
        $this->db->query("INSERT INTO parent (phm, relationship, name, nic, age, nochildren, levelofeducation, occupation, contactno, address, email, password) VALUES (:phm, :relationship, :name, :nic, :age, :nochildren, :levelofeducation, :occupation, :contactno, :address, :email, :password)");

        //bind values
        $this->db->bindParam(':phm',$data['phm']);
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

        // $this->db->bindParam(':gnd',$data['gnd']);
        // $this->db->bindParam(':phm',$data['phm']);
        $this->db->bindParam(':password',$data['password']);
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addUser($data){
        $this->db->query('INSERT INTO users (nic, name, password) VALUES (:nic, :name, :password)');
        

        //Bind values
        $this->db->bindParam(':nic', $data['nic']);
        $this->db->bindParam(':name', $data['name']);
        $this->db->bindParam(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
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
        $this->db->query("INSERT INTO childrecords (child_id, date, skin, eye, temp, umbilicus, weight, other) VALUES (:child_id, :date, :skin, :eye, :temp, :umbilicus, :weight, :other)");

        //bind values
        $this->db->bindParam(':child_id',$data['child_id']);
        $this->db->bindParam(':date',$data['date']);
        // $this->db->bindParam(':reportno',$data['reportno']);
        $this->db->bindParam(':skin',$data['skin']);
        $this->db->bindParam(':eye',$data['eye']);
        $this->db->bindParam(':temp',$data['temp']);
        $this->db->bindParam(':umbilicus',$data['umbilicus']);
        $this->db->bindParam(':weight',$data['weight']);
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

        // $child = new stdClass();
        // $child->name = $row->name;
        // $child->birthday = $row->dob;

        // return $child;
        return $row;
    }

    public function calculateAge($birthday) {
        $now = time();
        $age = strtotime($birthday);

        $diff = $now - $age;

        $years = floor($diff / (365 * 60 * 60 * 24));
        $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
        $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

        return array(
            'years' => $years,
            'months' => $months,
            'days' => $days
        );
    }
    
    public function calculateMonths($birthday) {
        $now = time();
        $age = strtotime($birthday);
    
        $diff = $now - $age;
    
        $months = floor($diff / (30 * 60 * 60 * 24));
    
        return $months;
        // return array(
        //     'months' => $months
        // );
    }
    
    public function checkvaccine($months){
        $this->db->query('SELECT * FROM vaccination WHERE months <= :months AND :months < term');
        $this->db->bindParam(':months', $months);
        // $this->db->bindParam(':term', $data['term']);

        $row = $this->db->resultSet();
        
        // $child = new stdClass();
        // $child->name = $row->name;
        // $child->birthday = $row->dob;

        // return $child;
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

    public function findGndByClinic($id){
        $this->db->query('SELECT * FROM clinics WHERE id = :id');
        $this->db->bindParam(':id', $id);

        $row = $this->db->single();

        return $row;
    }
    
    public function findPhmByMidwife($nic){
        $this->db->query('SELECT * FROM midwifes WHERE nic = :nic');
        $this->db->bindParam(':nic', $nic);

        $row = $this->db->single();

        return $row;
    }
    
    public function getChartByChild($id){
        $this->db->query("SELECT * FROM children_age_weight WHERE child_id = :child_id");

        $this->db->bindParam(':child_id', $id);

        $results = $this->db->resultSet();

        // $chart = [];

        // foreach ($results as $row) {
        //     $age = intval($row->age);
        //     $weight = floatval($row->weight);
        //     $chart[] = [$age, $weight];
        // }

        // return $chart;
        return $results;
    }
    
    public function addChildren_age_weight($data){


        $this->db->query("INSERT INTO children_age_weight (child_id, age, weight) 
                      SELECT :child_id, DATEDIFF(NOW(), :dob) AS age, :weight");

        //bind values
        $this->db->bindParam(':child_id', $data['child_id']);
        $this->db->bindParam(':dob', $data['child']->dob);
        $this->db->bindParam(':weight', $data['weight']);
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getVaccine(){
        $this->db->query("SELECT * FROM vaccination");

        // $this->db->bindParam(':child_id', $id);

        $results = $this->db->resultSet();

        // $chart = [];

        // foreach ($results as $row) {
        //     $age = intval($row->age);
        //     $weight = floatval($row->weight);
        //     $chart[] = [$age, $weight];
        // }

        // return $chart;
        return $results;
    }
    
    public function activateButton($months, $id){
        
        $this->db->query('SELECT vaccination.id, vaccination.vaccine, vaccination.months, vaccination.term 
                      FROM vaccination 
                      LEFT JOIN children_vaccination ON vaccination.id = children_vaccination.vaccination_id AND children_vaccination.child_id = :child_id
                      WHERE vaccination.months <= :months 
                        AND :months < vaccination.term 
                        AND (children_vaccination.vaccination_id IS NULL OR children_vaccination.vaccination_id != vaccination.id)');
        $this->db->bindParam(':months', $months);
        $this->db->bindParam(':child_id', $id);
        
        // $this->db->bindParam(':term', $data['term']);

        $row = $this->db->resultSet();
        
        // $child = new stdClass();
        // $child->name = $row->name;
        // $child->birthday = $row->dob;

        // return $child;
        return $row;
    }   
    
    public function deactivateButton($id){
        $this->db->query('SELECT * FROM children_vaccination WHERE child_id = :child_id');
        $this->db->bindParam(':child_id', $id);
        // $this->db->bindParam(':term', $data['term']);

        $row = $this->db->resultSet();
        
        // $child = new stdClass();
        // $child->name = $row->name;
        // $child->birthday = $row->dob;

        // return $child;
        return $row;
    }
    
    public function addChildVaccination($data){


        $this->db->query("INSERT INTO children_vaccination (child_id, vaccination_id, date, batch) VALUES (:child_id, :vaccination_id, :date, :batch)");

        //bind values
        $this->db->bindParam(':child_id', $data['child_id']);
        $this->db->bindParam(':vaccination_id', $data['vaccination_id']);
        $this->db->bindParam(':date', $data['date']);
        $this->db->bindParam(':batch', $data['batch']);
         
        //execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function getVaccineById($vaccination_id){
        $this->db->query('SELECT * FROM vaccination WHERE id = :vaccination_id');
        $this->db->bindParam(':vaccination_id', $vaccination_id);

        $row = $this->db->single();

        return $row;
    }

    public function getMidwifeRecordsByChildAndDate($id, $date){

        $this->db->query("SELECT * FROM childrecords WHERE child_id=:child_id AND date=:date" ) ;
 
        $this->db->bindParam(':child_id', $id);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }
    
    public function getDoctorRecordsByChildAndDate($id, $date){

        $this->db->query("SELECT * FROM doctor_child_records WHERE child_id=:child_id AND date=:date" ) ;
 
        $this->db->bindParam(':child_id', $id);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }


}
