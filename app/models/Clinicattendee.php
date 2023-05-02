<?php
class Clinicattendee{
    private $db;

    public function __construct(){
        $this->db=new Database;
    }

    
    public function clarifyMotherOrParent(){
        $this->db->query("SELECT * FROM parent WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        // if($row<1){
        //     $this->db->query('SELECT * FROM parent WHERE nic = :nic');
        //     $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        //     $row = $this->db->single();

        //     return $row;
            
        // } else {
            return $row;
        // }

       
    }

    public function getProfile_expectant(){
        $this->db->query('SELECT * FROM registration WHERE nic = :nic');
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();
        return $row;
    }
    
    public function getProfile_parent(){
        $this->db->query('SELECT * FROM parent WHERE nic = :nic');
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();
        return $row;
    }

    public function getProfile(){
        $this->db->query("SELECT * FROM registration WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        if($row<1){
            $this->db->query('SELECT * FROM parent WHERE nic = :nic');
            $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

            $row = $this->db->single();

            return $row;
            
        } else {
            return $row;
        }

       
    }

    //edit profile
    public function updateExpectantInfo($data){
        $this->db->query("UPDATE registration SET mcontactno=:mcontactno, hcontactno=:hcontactno WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':mcontactno',  $data['edit-mcontact']);
        $this->db->bindParam(':hcontactno',  $data['edit-hcontact']);
        // $this->db->bindParam(':password',  $data['password']);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    public function updateParentInfo($data){
        $this->db->query("UPDATE parent SET contactno=:contactno WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':contactno',  $data['edit-contact']);
        // $this->db->bindParam(':password',  $data['password']);
        
        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getExpectantPassword() {
        $this->db->query("SELECT password FROM expectant WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
    
        $row = $this->db->single();
    
        return $row->password;
    }

    public function getParentPassword() {
        $this->db->query("SELECT password FROM parent WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
    
        $row = $this->db->single();
    
        return $row->password;
    }

    public function editExpectantPassword($data){
        $this->db->query("UPDATE expectant SET password = :password WHERE nic = :nic");

        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':password',  $data['new-password']);
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function editParentPassword($data){
        $this->db->query("UPDATE parent SET password = :password WHERE nic = :nic");

        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':password',  $data['new-password']);
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function editUserPassword($data){
        $this->db->query("UPDATE users SET password = :password WHERE nic = :nic");

        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':password',  $data['new-password']);
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function update_expectant_info($data){
        $this->db->query("UPDATE registration  SET gravidity=:gravidity, mcontactno=:mcontactno, moccupation=:moccupation,  memail=:memail,  hname=:hname, hage=:hage, hlevelofeducation=:hlevelofeducation;  hcontactno=:hcontactno, hoccupation=:hoccupation; hemail=:hemail WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':gravidity',  $data['gravidity']);
        $this->db->bindParam(':mcontactno',  $data['mcontactno']);
        $this->db->bindParam(':moccupation',  $data['moccupation']);
        $this->db->bindParam(':memail',  $data['memail']);
        $this->db->bindParam(':hname',  $data['hname']);
        $this->db->bindParam(':hage',  $data['hage']);
        $this->db->bindParam(':hlevelofeducation',  $data['hlevelofeducation']);
        $this->db->bindParam(':hcontactno',  $data['hcontactno']);
        $this->db->bindParam(':hoccupation',  $data['hoccupation']);
        $this->db->bindParam(':hemail',  $data['hemail']);

        
        $row = $this->db->single();

        return $row;
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function getreq_expectant(){
        $this->db->query("SELECT * FROM registration WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        return $row;
    }


    //register user
    public function register($data){
        $this->db->query("INSERT INTO registration (mname, nic, mage, gravidity, mlevelofeducation, moccupation, mcontactno, address, memail, hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail, gnd, active) VALUES (:mname, :nic, :mage, :gravidity, :mlevelofeducation, :moccupation, :mcontactno, :address, :memail, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail, :gnd, :active)");

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
         $this->db->bindParam(':active',$data['active']);
        
         
         //execute
         if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //Login user - previous
    // public function login($nic, $password){
    //     $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
    //     $this->db->bindparam(':nic', $nic);

    //     $row = $this->db->single();

    //     $hashed_password = $row->password;
    //     if(password_verify($password, $hashed_password)){
    //         return $row;
    //     } else {
    //         return false;
    //     }
    // }

    public function getparent_request(){
        $this->db->query("SELECT * FROM parent WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        $row = $this->db->single();

        return $row;
    }

    // public function parent_request($data){
    //     $this->db->query("INSERT INTO parent(name,age,nochildren,levelofeducation,occupation,contactno,address,email,gnd,hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail) VALUES ( :name, :age, :nochildren, :levelofeducation, :occupation, :contactno,:address, :email, :gnd, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail)");
   
    //     //bind values
    //     $this->db->bindParam(':name',$data['name']);
    //     $this->db->bindParam(':age',$data['age']);
    //     $this->db->bindParam(':nochildren',$data['nochildren']);
    //     $this->db->bindParam(':levelofeducation',$data['levelofeducation']);
    //     $this->db->bindParam(':occupation',$data['occupation']);
    //     $this->db->bindParam(':contactno',$data['contactno']);
    //     $this->db->bindParam(':address',$data['address']);
    //     $this->db->bindParam(':email',$data['email']);
    //     $this->db->bindParam(':gnd',$data['gnd']);
        
    //     $this->db->bindParam(':hname',$data['hname']);
    //     $this->db->bindParam(':hage',$data['hage']);
    //     $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
    //     $this->db->bindParam(':hoccupation',$data['hoccupation']);
    //     $this->db->bindParam(':hcontactno',$data['hcontactno']);
    //     $this->db->bindParam(':hemail',$data['hemail']);
       
        
    //     //execute
    //     if($this->db->execute()){
    //        return true;
    //     }else{
    //        return false;
    //     }
    // }
    
    
    //insert_husband_details


    public function insert_all_details($data){
        $this->db->query("INSERT INTO registration(mname,  mage,  mlevelofeducation,  moccupation,  mcontactno,  address,  memail,  gnd, hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail) VALUES ( :name,  :age,  :levelofeducation,  :occupation,  :contactno,  :address,  :email,  gnd, :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail)");
   
        //bind values
       
        $this->db->bindParam(':name',$data['name']);
        $this->db->bindParam(':age',$data['age']);
        // $this->db->bindParam(':nochildren',$data['nochildren']);
        $this->db->bindParam(':levelofeducation',$data['levelofeducation']);
        $this->db->bindParam(':occupation',$data['occupation']);
        $this->db->bindParam(':contactno',$data['contactno']);
        $this->db->bindParam(':address',$data['address']);
        $this->db->bindParam(':email',$data['email']);
        $this->db->bindParam(':gnd',$data['gnd']);
        $this->db->bindParam(':hname',$data['hname']);
        $this->db->bindParam(':hage',$data['hage']);
        $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
        $this->db->bindParam(':hoccupation',$data['hoccupation']);
        $this->db->bindParam(':hcontactno',$data['hcontactno']);
        $this->db->bindParam(':hemail',$data['hemail']);
        
       
        
        //execute
        if($this->db->execute()){
           return true;
        }else{
           return false;
        }
    }

    public function update_parent_info($data){
        // $this->db->query("UPDATE parent  SET name=:name,  age=:age,  nochildren=:nochildren,  levelofeducation=:levelofeducation,  occupation=:occupation,  contactno=:contactno,  address=:address,  email=:email,  gnd=:gnd,  hname=:hname, hage=:hage, hlevelofeducation=:hlevelofeducation;  hcontactno=:hcontactno, hoccupation=:hoccupation; hemail=:hemail WHERE nic = :nic");
        $this->db->query("UPDATE parent  SET name=:name,  age=:age,  nochildren=:nochildren,  levelofeducation=:levelofeducation,  occupation=:occupation,  contactno=:contactno,  address=:address,  email=:email,  gnd=:gnd WHERE nic = :nic");
        $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        $this->db->bindParam(':name',$data['name']);
        $this->db->bindParam(':age',$data['age']);
        $this->db->bindParam(':nochildren',$data['nochildren']);
        $this->db->bindParam(':levelofeducation',$data['levelofeducation']);
        $this->db->bindParam(':occupation',$data['occupation']);
        $this->db->bindParam(':contactno',$data['contactno']);
        $this->db->bindParam(':address',$data['address']);
        $this->db->bindParam(':email',$data['email']);
        $this->db->bindParam(':gnd',$data['gnd']);
        
        // $this->db->bindParam(':hname',$data['hname']);
        // $this->db->bindParam(':hage',$data['hage']);
        // $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
        // $this->db->bindParam(':hoccupation',$data['hoccupation']);
        // $this->db->bindParam(':hcontactno',$data['hcontactno']);
        // $this->db->bindParam(':hemail',$data['hemail']);

        
        $row = $this->db->single();

        return $row;
        
         //Execute
         if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }




    //request user
    // public function request($data){
    //     $this->db->query("INSERT INTO parent(hname, hage, hlevelofeducation, hoccupation, hcontactno, hemail) VALUES ( :hname, :hage, :hlevelofeducation, :hoccupation, :hcontactno, :hemail)");
   
    //     //bind values
        
    //     $this->db->bindParam(':hname',$data['hname']);
    //     $this->db->bindParam(':hage',$data['hage']);
    //     $this->db->bindParam(':hlevelofeducation',$data['hlevelofeducation']);
    //     $this->db->bindParam(':hoccupation',$data['hoccupation']);
    //     $this->db->bindParam(':hcontactno',$data['hcontactno']);
    //     $this->db->bindParam(':hemail',$data['hemail']);
       
        
    //     //execute
    //     if($this->db->execute()){
    //        return true;
    //     }else{
    //        return false;
    //     }
    // }

    //Login user
    public function login($nic, $password){
        $this->db->query('SELECT * FROM expectant WHERE nic = :nic');
        $this->db->bindparam(':nic', $nic);

        $row = $this->db->single();

        if($row<1){
            $this->db->query('SELECT * FROM parent WHERE nic = :nic');
            $this->db->bindparam(':nic', $nic);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        } else {

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
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


    //find parent by nic
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
    

    public function getReport(){
        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getDetailReport(){
        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }
    
    public function getChildrenList(){
        $this->db->query("SELECT * FROM children WHERE parent = :parent");
        $this->db->bindParam(':parent', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();

        return $row;
    }
    
    public function getChildById($id){
        $this->db->query("SELECT * FROM children WHERE child_id = :child_id");
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
    
    public function getReportByChild($id,$reportno){
        $this->db->query("SELECT * FROM childrecords WHERE child_id = :child_id AND reportno = :reportno");
        $this->db->bindParam(':child_id', $id);
        $this->db->bindParam(':reportno', $reportno);

        $row = $this->db->single();

        return $row;
    }

    
    public function getMother(){
        $this->db->query("SELECT * FROM expectant WHERE nic = :nic");
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->single();

        return $row;
    }

    public function activateButton(){
        
        $this->db->query('SELECT mother_vaccination.id, mother_vaccination.vaccine, mother_vaccination.gravidity
                      FROM mother_vaccination, expectant WHERE mother_vaccination.gravidity=expectant.gravidity AND nic=:nic');

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $row = $this->db->resultSet();
        
        return $row;
    }

    public function deactivateButton(){
        $this->db->query('SELECT * FROM expectant_vaccination WHERE nic = :nic');

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        // $this->db->bindParam(':term', $data['term']);

        $row = $this->db->resultSet();

        return $row;
    }

    public function getChartByMother(){
        $this->db->query("SELECT * FROM mother_age_weight WHERE nic = :nic");

        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);

        $results = $this->db->resultSet();

        return $results;
    }

    public function calculatePOA($weeks, $date) {
        $now = time();
        $registered = strtotime($date);
    
        $diff = $now - $registered;
    
        $weeks_diff = floor($diff / (7 * 24 * 60 * 60));
        $days_diff = floor($diff / (24 * 60 * 60) % 7);
    
        return array(
            'weeks' => $weeks_diff + $weeks,
            'days' => $days_diff
        );
    }
    
    public function getMidwifeRecordsByMotherAndDate($date){

        $this->db->query("SELECT * FROM detailrecords_expectant WHERE nic=:nic AND date=:date" ) ;
 
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }

    public function getDoctorRecordsByMotherAndDate($date){

        $this->db->query("SELECT * FROM doctor_mother_records WHERE nic=:nic AND date=:date" ) ;
 
        $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);  
        $this->db->bindParam(':date', $date);      
                                         
        $row =  $this->db->single();

        return $row;
    }
    
}