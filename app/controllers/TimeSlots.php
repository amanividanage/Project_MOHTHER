<?php
  class Calendars extends Controller {
    public function __construct(){
        $this->calendarModel = $this->model('Calendar');
        $this->midwifeModel = $this->model('Midwife');
        $this->timeSlotModel = $this->model('TimeSlot');
       
     
    }

    public function displayTimeSlots () {
      //  $saveslots =  $this->timeSlotModel->saveSlots();
       // $insertData =  $this->calendarModel->insert();


        $data = [
           // 'saveslots' => $saveslots
            ];

        
    }
}