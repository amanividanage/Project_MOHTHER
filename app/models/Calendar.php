<?php
    class Calendar{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function insert($data){
            $this->db->query('INSERT INTO calendar (midwife_id,title,clinic_date,start_event,end_event,duration) VALUES(:midwife_id,:title,:clinic_date,:start_event,:end_event,:duration)');
        
            //bind values
            $this->db->bindParam(':midwife_id', $data['midwife_id']);
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
                    $this->db->query('INSERT INTO time_slots (calendar_id,midwife_id, start_time, end_time, is_booked) VALUES(:calendar_id,:midwife_id, :start_time, :end_time,:is_booked)');
                    $this->db->bindParam(':calendar_id', $calendar_id);
                    $this->db->bindParam(':midwife_id', $data['midwife_id']);
                    $this->db->bindParam(':start_time', date('Y-m-d H:i:s', $start_time));
                    $this->db->bindParam(':end_time', date('Y-m-d H:i:s', ($start_time + $duration)));
                    $this->db->bindParam(':is_booked', false);
                    $this->db->execute();
                    $start_time += $duration;
                }
        
                return true;
            }else{
                return false;
            }
        }
        

        // public function insert($data){
        //     $this->db->query('INSERT INTO calendar (midwife_id,title,clinic_date,start_event,end_event,duration) VALUES(:midwife_id,:title,:clinic_date,:start_event,:end_event,:duration)');
       
      
        
        //     //bind values
        //     $this->db->bindParam(':midwife_id', $data['midwife_id']);
        //     $this->db->bindParam(':title', $data['title']);
        //     $this->db->bindParam(':clinic_date', $data['clinic_date']);
        //     $this->db->bindParam(':start_event', $data['start_event']);
        //     $this->db->bindParam(':end_event', $data['end_event']);
        //     $this->db->bindParam(':duration', $data['duration']);
            
        //        //execute for update/delete
        // if($this->db->execute()){
        //     return true;
        // }else{
        //     return false;
        // }
      
        // }


        // function insert_time_slots($start_time, $end_time, $duration, $clinic_no, $midwife_id, $date) {
        //     // Convert the start and end times to Unix timestamps
        //     $start_timestamp = strtotime($start_time);
        //     $end_timestamp = strtotime($end_time);
        
        //     // Convert the duration to seconds
        //     $duration_seconds = strtotime($duration) - strtotime('00:00:00');
        
        //     // Loop through the timestamps in the specified duration intervals
        //     $time_slots = array();
        //     for ($i = $start_timestamp; $i <= $end_timestamp; $i += $duration_seconds) {
        //         // Add each time slot to the array
        //         $time_slot = date('h:i A', $i);
        //         $time_slots[] = $time_slot;
        
        //         // Insert each time slot into the database table with additional details using PDO
        //         $stmt = $pdo->prepare("INSERT INTO appointments (clinic_no, midwife_id, date, time_slot) VALUES (?, ?, ?, ?)");
        //         $stmt->execute([$clinic_no, $midwife_id, $date, $time_slot]);
        //     }
        
        //     // Return the array of time slots
        //     return $time_slots;
        // }}
        
        // public function update(){
        //     $this->db->query("UPDATE events SET title=:title
        //     WHERE id=:id
        //     ");

            

        //     $results = $this->db->resultSet();

        //     return $results;
        // }

        public function getEvents() {

            $this->db->query('SELECT * FROM `calendar` WHERE `midwife_id` = :midwife_id');
            $this->db->bindParam(':midwife_id', $_SESSION['midwife_id']);
       
            $results =  $this->db->resultSet();
            return $results;

        }

        // public function delete(){
        //     $this->db->query("DELETE from events WHERE id=:id
        //     ");

        //     $results = $this->db->resultSet();

        //     return $results;
        // }






    }
