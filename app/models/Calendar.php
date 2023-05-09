<?php
    class Calendar{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO calendar (midwife_nic,gnd,title,clinic_date,start_event,end_event,duration) VALUES(:midwife_nic,:gnd,:title,:clinic_date,:start_event,:end_event,:duration)');
        
            //bind values
            $this->db->bindParam(':midwife_nic', $data['midwife_nic']);
            $this->db->bindParam(':gnd', $data['gnd']);
            $this->db->bindParam(':title', $data['title']);
            $this->db->bindParam(':clinic_date', $data['clinic_date']);
            $this->db->bindParam(':start_event', $data['start_event']);
            $this->db->bindParam(':end_event', $data['end_event']);
            $this->db->bindParam(':duration', $data['duration']);
        
            //execute for insert
            if($this->db->execute()){
                $calendar_id = $this->db->lastInsertId();
        
                // Insert time slots into time_slots table
                $start_time = strtotime($data['start_event']);
                $end_time = strtotime($data['end_event']);
                $duration = $data['duration'] * 60;
        
                while ($start_time < $end_time) {

                    $this->db->query('UPDATE calendar SET calendar_id=:calendar_id WHERE title=:title');
                    $this->db->bindParam(':calendar_id', $calendar_id);
                    $this->db->bindParam(':title', $data['title']);
                    $this->db->execute();


                    $this->db->query('INSERT INTO time_slots (calendar_id,midwife_nic,clinic_date, start_time, end_time, is_booked) VALUES(:calendar_id,:midwife_nic,:clinic_date, :start_time, :end_time,:is_booked)');
                    $this->db->bindParam(':calendar_id', $calendar_id);
                    $this->db->bindParam(':midwife_nic', $data['midwife_nic']);
                    $this->db->bindParam(':clinic_date', $data['clinic_date']);
                    $this->db->bindParam(':start_time', date('Y-m-d H:i:s', $start_time));
                    $this->db->bindParam(':end_time', date('Y-m-d H:i:s', ($start_time + $duration)));
                    $this->db->bindParam(':is_booked', false);
                    $this->db->execute();

                    // $this->db->query('UPDATE calendar SET calendar_id=:calendar_id WHERE midwife_id=:midwife_id ');
                    // $this->db->bindParam(':calendar_id', $calendar_id);
                    // $this->db->bindParam(':midwife_id', $data['midwife_id']);
                   
                    // $this->db->execute();
                    $start_time += $duration;
                }

                
                // $this->db->query('UPDATE calendar SET calendar_id=:calendar_id WHERE midwife_id=:midwife_id ');
                // $this->db->bindParam(':calendar_id', $calendar_id);
                // $this->db->bindParam(':midwife_id', $data['midwife_id']);
               
                // $this->db->execute();
        
                return true;
            }else{
                return false;
            }
        }
        

      

        public function getEvents() {
        //  $this->db->query('SELECT * FROM calendar INNER JOIN clinics ON calendar.gnd=clinics.gnd WHERE clinics.id=:id ');
          // $this->db->query('SELECT * FROM calendar WHERE midwife_nic = :midwife_nic ');
        //   $this->db->query('SELECT * FROM calendar INNER JOIN midwife_clinic ON calendar.midwife_nic=midwife_clinic.nic INNER JOIN clinics ON midwife_clinic.clinic= clinics.id WHERE midwife_clinic.nic =:midwife_nic ');
        $this->db->query("SELECT * 
        FROM  calendar r 
        INNER JOIN clinics c  ON r.gnd = c.gnd 
        INNER JOIN midwife_clinic m ON m.clinic = c.id
        WHERE  m.nic = :midwife_nic ");
       //   $this->db->bindParam(':id', $id); 
          $this->db->bindParam(':midwife_nic', $_SESSION['midwife_nic']);
          
            $results =  $this->db->resultSet();
            return $results;

        }
        public function updatethetimeslot($data){
            $this->db->query("UPDATE time_slots  SET is_booked ='1' WHERE clinic_timeslot_id = :clinic_timeslot_id");
    
            $this->db->bindParam(':clinic_timeslot_id', $data['clinic_timeslot_id']);
                // $row = $this->db->single();
        
                // return $row;
                
                 //Execute
                 if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
        }

        public function getEventsforGND() {
            //  $this->db->query('SELECT * FROM calendar INNER JOIN clinics ON calendar.gnd=clinics.gnd WHERE clinics.id=:id ');
               $this->db->query('SELECT * FROM calendar WHERE midwife_id = :midwife_id ');
           //   $this->db->bindParam(':id', $id); 
              $this->db->bindParam(':midwife_id', $_SESSION['midwife_id']);
              
                $results =  $this->db->resultSet();
                return $results;
    
            }
        // public function getEventsforinitialregistration() {
        //     $this->db->query('SELECT * FROM calendar INNER JOIN clinics ON calendar.gnd=clinics.gnd ');
        //     // $this->db->bindParam(':id', $id); 
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
        

        public function getEventsforClinicAttendee($nic) {
             $this->db->query('SELECT calendar.clinic_id, calendar.title, calendar.clinic_date, calendar.start_event, calendar.end_event
             FROM calendar INNER JOIN registration ON calendar.gnd=registration.gnd WHERE registration.nic=:nic ');
            // $this->db->query('SELECT * FROM calendar  ');
            $this->db->bindParam('nic', $nic);
            // $this->db->bindParam(':calendar_id', $calendar_id); 
          //  $this->db->bindParam(':midwife_id', $_SESSION['midwife_id']);
            
              $results =  $this->db->resultSet();
              return $results;
  
          }
  

        public function displayTimeSlots($calendar_id) {

            
            // Prepare the SQL query
            $this->db->query('SELECT * FROM time_slots WHERE is_booked = "0" AND calendar_id = :calendar_id ');
        
            // Bind the parameters to the query
            $this->db->bindParam(':calendar_id', $calendar_id);
           
            // Execute the query and return the results
            $results = $this->db->resultSet();
            return $results;
        }

        // public function bookTimeslotWithNIC($clinic_timeslot_id){
        //     $this->db->query("UPDATE time_slots  SET nic =:nic  WHERE time_slots.nic = :clinicattendee_nic AND clinic_timeslot_id = :clinic_timeslot_id");
        //     $this->db->bindParam(':clinicattendee_nic',  $_SESSION['clinicattendee_nic']);
        //     $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
      
        //      //Execute
        //      if($this->db->execute()){
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        // public function bookTimeslotWithNIC($clinic_timeslot_id) {
        //     $this->db->query("UPDATE time_slots SET nic = :nic WHERE nic = :clinicattendee_nic AND clinic_timeslot_id = :clinic_timeslot_id");
        //     $this->db->bind(':nic', $_SESSION['clinicattendee_nic']);
        //     $this->db->bind(':clinicattendee_nic', $_SESSION['clinicattendee_nic']);
        //     $this->db->bind(':clinic_timeslot_id', $clinic_timeslot_id);
        
        //     return $this->db->execute();
        // }
        // public function bookTimeslotWithNIC($clinic_timeslot_id) {
        //     $this->db->query("UPDATE time_slots SET nic = :nic WHERE nic = :nic AND clinic_timeslot_id = :clinic_timeslot_id");
        //     $this->db->bind(':nic', $_SESSION['clinicattendee_nic']);
        //     $this->db->bind(':clinic_timeslot_id', $clinic_timeslot_id);
        
        //     // return $this->db->execute();

        //     if($this->db->execute()){
        //                 return true;
        //             } else {
        //                 return false;
        //             }
        // }
        public function bookTimeslotWithNIC($clinic_timeslot_id) {
            $this->db->query("UPDATE time_slots SET nic = :nic WHERE clinic_timeslot_id = :clinic_timeslot_id");
            $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
            $this->db->bindParam(':clinic_timeslot_id',$clinic_timeslot_id );
        
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        // public function bookTimeslotWithNIC($clinic_timeslot_id, $nic) {
        //     $this->db->query("UPDATE time_slots SET nic = :nic WHERE clinic_timeslot_id = :clinic_timeslot_id");
        //     $this->db->bind(':nic', $nic);
        //     $this->db->bind(':clinic_timeslot_id', $clinic_timeslot_id);
            
        //     return $this->db->execute();
        // }
        
        



        public function displayTimeslotdetails($clinic_timeslot_id) {

            
            // Prepare the SQL query
            $this->db->query('SELECT * FROM time_slots WHERE clinic_timeslot_id = :clinic_timeslot_id');
        
            // Bind the parameters to the query
            $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
           
            // Execute the query and return the results
            $rows = $this->db->resultSet();

    return $rows;
        }

        
        // public function delete(){
        //     $this->db->query("DELETE from events WHERE id=:id
        //     ");

        //     $results = $this->db->resultSet();

        //     return $results;
        // }






    }
    ?>
