
<?php
class TimeSlot {
    private $db;
    private $startTime;
    private $endTime;
    private $duration;
    private $slots = array();
    
    public function __construct() {
        $this->db = new Database;
      
        // $this->startTime = $startTime;
        // $this->endTime = $endTime;
        // $this->duration = $duration;
        // $this->divideTimeSlots();
    }
    
    // public function divideTimeSlots() {
    //     $start = strtotime($this->startTime);
    //     $end = strtotime($this->endTime);
        
    //     while ($start <= $end) {
    //         $slotStart = date('H:i', $start);
    //         $slotEnd = date('H:i', $start + $this->duration*60);
    //         $this->slots[] = array(
    //             'start_time' => $slotStart,
    //             'end_time' => $slotEnd,
    //             'is_booked' => false
    //         );
    //         $start += $this->duration*60;
    //     }
    // }
    
    public function getSlots() {
       return $time_slots;
    }
    
    // public function saveSlots($data) {
    //         $this->db->query("INSERT INTO time_slots (midwife_id, start_time, end_time, time_slot, is_booked) VALUES (:start_time, :end_time,time_slot, :is_booked)"); 
    //     //    $sql = "INSERT INTO time_slots (time_slot) VALUES ('$time_slot')";
           
    //         foreach ($this->$time_slots as $data) {
    //         $this->db->bindParam(':midwife_id', $data['midwife_id']);
    //         $this->db->bindParam(':start_time', $data['start_time']);
    //         $this->db->bindParam(':end_time', $data['end_time']);
    //         $this->db->bindParam(':time_slot', $data['time_slot']);
    //         $this->db->bindParam(':is_booked', $data['is_booked']);
            
    //         if($this->db->execute()){
    //             return true;
    //         }else{
    //             return false;
    //         }
    //     }
    }
    
