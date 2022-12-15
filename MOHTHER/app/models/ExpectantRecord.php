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
        $this->db->query("SELECT * FROM expectant WHERE midwife_id = :midwife_id ");
        $this->db->bindParam(':midwife_id', $_SESSION['midwife_id']);
         

        $results =  $this->db->resultSet();
        return $results;
    }

    public function getNewExpectantRecords(){
        // $this->db->query('SELECT s.nic, s.mname
        //                   FROM registration s
        //                     INNER JOIN clinics c ON S.gnd = C.gnd
        //                     JOIN midwifes m ON C.id = m.clinic

        $this->db->query("SELECT r.nic, r.mname FROM  registration r 
                          INNER JOIN clinics c ON R.gnd = C.gnd 
                          WHERE C.id = ".$_SESSION['midwife_clinic']);
                           
                
                         
                         
        $results =  $this->db->resultSet();
        return $results;
    }

    public function getNewExpectantRecordsByNic($nic){
        // $this->db->query('SELECT s.nic, s.mname
        //                   FROM registration s
        //                     INNER JOIN clinics c ON S.gnd = C.gnd
        //                     JOIN midwifes m ON C.id = m.clinic

        $this->db->query("SELECT * FROM  registration WHERE nic=:nic" ) ;
 
        $this->db->bindParam(':nic', $nic);        
                         
                         
        $results =  $this->db->single();
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

    public function showExpectantMonthlyRecords($nic){
        $this->db->query('SELECT nic, reportNo,date, weight, triposha
                         FROM detailrecords_Expectant
                         WHERE nic= :nic'
              
                         
                         );
                         $this->db->bindParam(':nic', $nic); 
        $results =  $this->db->resultSet();
        return $results;
    }

    public function displayExpectantReports($nic, $reportNo){
        $this->db->query('SELECT *
                        FROM detailrecords_Expectant
                        WHERE nic= :nic AND reportNo = :reportNo'

        
                      );
                         $this->db->bindParam(':nic', $nic); 
                         $this->db->bindParam(':reportNo', $reportNo);
        $results =  $this->db->single();
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