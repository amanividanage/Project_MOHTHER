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
        public function getEventsforDoctor() {
       
            $this->db->query("SELECT * 
            FROM  calendar r 
            INNER JOIN clinics c  ON r.gnd = c.gnd 
            INNER JOIN doctor_clinic m ON m.clinic = c.id
            WHERE  m.nic = :doctor_nic ");
           //   $this->db->bindParam(':id', $id); 
              $this->db->bindParam(':doctor_nic', $_SESSION['doctor_nic']);
              
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
            $this->db->query('SELECT calendar.clinic_id, calendar.title, calendar.clinic_date, calendar.start_event, calendar.end_event,registration.nic
                              FROM calendar INNER JOIN registration ON calendar.gnd=registration.gnd 
                              WHERE registration.nic=:nic');
            $this->db->bindParam('nic', $nic);
            $rows = $this->db->resultSet();
            $data = array();
            foreach ($rows as $row) {
                $data[] = array(
                    'id' => $row->clinic_id,
                    'title' => $row->title,
                    'start' => $row->clinic_date,
                    'end' => $row->clinic_date,
                    'start_time' => $row->start_event,
                    'end_time' => $row->end_event,
                    'nic' => $row->nic
                    // 'phm' => $row['phm']
                );
            }
            return $data;
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

        // public function changeTimeSlot($clinic_timeslot_id){
        //     $this->db->query("UPDATE time_slots  SET nic= '0' WHERE clinic_timeslot_id = :clinic_timeslot_id AND nic=:nic ");
    
        //     $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
        //     $this->db->bindParam(':nic',  $_SESSION['clinicattendee_nic']);
        //         // $row = $this->db->single();
        
        //         // return $row;
                
        //          //Execute
        //          if($this->db->execute()){
        //             return true;
        //         } else {
        //             return false;
        //         }
        // }
        // public function changeTimeSlot($clinic_timeslot_id){
        //     $nic = $_SESSION['clinicattendee_nic'];
        //     $this->db->query("UPDATE time_slots SET nic = '0' WHERE clinic_timeslot_id = :clinic_timeslot_id AND nic = :nic");
            
        //     $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
        //     $this->db->bindParam(':nic', $nic);
            
        //     if ($this->db->execute()) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
        

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
        // public function bookTimeslotWithNICC($calendar_id, $clinic_timeslot_id ) {
        //     $this->db->query("UPDATE time_slots SET nic = :nic WHERE clinic_timeslot_id = :clinic_timeslot_id AND calendar_id = :calendar_id LIMIT 1");
        //     $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
        //     $this->db->bindParam(':clinic_timeslot_id',$clinic_timeslot_id );
        //     $this->db->bindParam(':calendar_id', $calendar_id);
        
        //     if($this->db->execute()){
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }
        public function bookTimeslotWithNIC($calendar_id,$clinic_timeslot_id) {
            $nic = $_SESSION['clinicattendee_nic'];
        
            // Check if the user has already booked a timeslot for the given calendar_id
            $this->db->query("SELECT COUNT(*) FROM time_slots WHERE nic = :nic AND calendar_id = :calendar_id");
            $this->db->bindParam(':nic', $nic);
            $this->db->bindParam(':calendar_id', $calendar_id);
            $this->db->execute();
        
            $rowCount = $this->db->fetchColumn();// fetchColumn is defined in the database. this is a new method I added
        
            if ($rowCount > 0) {
                // User has already booked a timeslot for the given calendar_id
                return false;
            } else {
                // Update the timeslot with the user's NIC
                $this->db->query("UPDATE time_slots SET nic = :nic WHERE clinic_timeslot_id = :clinic_timeslot_id");
                $this->db->bindParam(':nic', $nic);
                $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
        
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        public function bookTimeslotWithNICInitial($nic,$clinic_timeslot_id) {
            
        
            // Check if the user has already booked a timeslot for the given calendar_id
            $this->db->query("SELECT COUNT(*) FROM time_slots WHERE nic = :nic");
            $this->db->bindParam(':nic', $nic);
           
            $this->db->execute();
        
            $rowCount = $this->db->fetchColumn();// fetchColumn is defined in the database. this is a new method I added
        
            if ($rowCount > 0) {
                // User has already booked a timeslot for the given calendar_id
                return false;
            } else {
                // Update the timeslot with the user's NIC
                $this->db->query("UPDATE time_slots SET nic = :nic WHERE clinic_timeslot_id = :clinic_timeslot_id");
                $this->db->bindParam(':nic', $nic);
                $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
        
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }
        
        // public function bookTimeslotWithNIC($calendar_id, $clinic_timeslot_id) {
        //     $nic = $_SESSION['clinicattendee_nic'];
            
        //     // Check if the user has already booked a timeslot for the given calendar_id
        //     $this->db->query("SELECT COUNT(*) FROM time_slots WHERE nic = :nic AND calendar_id = :calendar_id");
        //     $this->db->bindParam(':nic', $nic);
        //     $this->db->bindParam(':calendar_id', $calendar_id);
        //     $this->db->execute();
            
        //     $rowCount = $this->db->fetchColumn();
            
        //     if ($rowCount > 0) {
        //         // User has already booked a timeslot for the given calendar_id
        //         return false;
        //     } else {
        //         // Update the timeslot with the user's NIC
        //         $this->db->query("UPDATE time_slots SET nic = :nic WHERE clinic_timeslot_id = :clinic_timeslot_id AND calendar_id = :calendar_id LIMIT 1");
        //         $this->db->bindParam(':nic', $nic);
        //         $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
                
        //         if ($this->db->execute()) {
        //             return true;
        //         } else {
        //             return false;
        //         }
        //     }
        // }
        
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
        public function displayTimeslotdetailss($clinic_timeslot_id) {

            
            // Prepare the SQL query
            $this->db->query('SELECT * FROM time_slots WHERE clinic_timeslot_id = :clinic_timeslot_id');
        
            // Bind the parameters to the query
            $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
           
            // Execute the query and return the results
            // $rows = $this->db->resultSet();

            // return $rows;
            $rows = $this->db->resultSet();

            return $rows;
        }

        
        // public function onetimeslot($calendar_id,$clinic_timeslot_id) {

            
        //     $nic = $_SESSION['clinicattendee_nic'];
        
        //     // Check if the user has already booked a timeslot for the given calendar_id
        //     $this->db->query("SELECT COUNT(*) FROM time_slots WHERE nic = :nic AND calendar_id = :calendar_id");
        //     $this->db->bindParam(':nic', $nic);
        //     $this->db->bindParam(':calendar_id', $calendar_id);
        //     $this->db->execute();
        
        //     $rowCount = $this->db->fetchColumn();// fetchColumn is defined in the database. this is a new method I added
        
        //     if ($rowCount > 0) {
        //         // User has already booked a timeslot for the given calendar_id
        //         $this->db->query("UPDATE time_slots SET nic = '0' WHERE clinic_timeslot_id = :clinic_timeslot_id AND nic = :nic");

        //           // Update the timeslot with the user's NIC
        //           $this->db->bindParam(':nic', $nic);
        //           $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);
          
        //           if ($this->db->execute()) {
        //               return true;
        //           } else {
        //               return false;
        //           }
        //     } else {
        //          return false;
        //     }}
        public function onetimeslot($calendar_id, $clinic_timeslot_id) {
            $nic = $_SESSION['clinicattendee_nic'];
            
            // Update the timeslot with an empty nic value
            
            $this->db->query("UPDATE time_slots SET nic = '' WHERE clinic_timeslot_id = :clinic_timeslot_id AND nic = :nic");
            $this->db->bindParam(':nic', $nic);
            $this->db->bindParam(':clinic_timeslot_id', $clinic_timeslot_id);

            // Execute the query
            if ($this->db->execute()) {
              return true;
            } else {
             return false;
        }
        }

        // public function selectthebookedTimeslot($calendar_id, $clinic_timeslot_id) {
         
        // }

        public function selectThebookedTimeslot($calendar_id){
            $this->db->query('SELECT time_slots.clinic_timeslot_id  FROM time_slots WHERE time_slots.nic= :nic  AND calendar_id = :calendar_id ');
            $this->db->bindParam(':nic', $_SESSION['clinicattendee_nic']);
            
            $this->db->bindParam(':calendar_id', $calendar_id);
            $row = $this->db->single();
    
            return $row;
         
        }
        public function selectThebookedTimeslotInitial($nic,$calendar_id){
            $this->db->query('SELECT time_slots.clinic_timeslot_id  FROM time_slots WHERE time_slots.nic= :nic  AND calendar_id = :calendar_id ');
            $this->db->bindParam(':nic', $nic);
            
            $this->db->bindParam(':calendar_id', $calendar_id);
            $row = $this->db->single();
    
            return $row;
         
        }
        

        
        // public function delete(){
        //     $this->db->query("DELETE from events WHERE id=:id
        //     ");

        //     $results = $this->db->resultSet();

        //     return $results;
        // }






    }
    ?>
