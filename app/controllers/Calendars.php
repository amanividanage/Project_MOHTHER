<?php
  class Calendars extends Controller {
    public function __construct(){
        $this->calendarModel = $this->model('Calendar');
        $this->midwifeModel = $this->model('Midwife');
       $this->timeSlotModel = $this->model('TimeSlot');
       
     
    }

    public function calendarEvents () {
        $calendarEvents =  $this->calendarModel->getEvents();


        $data = [
            'clinic_dates' => $calendarEvents,
            ];

        echo json_encode($data['clinic_dates']);
    }

    public function getGnd(){

        //$calendarEvents =  $this->calendarModel->getEvents();


        $data = [
          //  'clinic_dates' => $calendarEvents,
            ];

      //  echo json_encode($data['clinic_dates']);
       // $id = 
    }
    

    public function maternitycalendar(){
        $clinic =  $this->midwifeModel->getPHMByMidwife();
        //$calendarEvents =  $this->calendarModel->getEvents();


        $data = [
            'clinic' => $clinic,
            //'calendarEvents'=>$calendarEvents
            ];

        

        $this->view('calendars/maternitycalendar', $data);
    }
    public function timeslot($calendar_id) {
        
    
        // Get the time slots for the given date and midwife
        $timeSlots = $this->calendarModel->displayTimeSlots($calendar_id);
        $clinicdetails = $this->calendarModel->displayclinicdetails($calendar_id);
    
        $data = [
            'timeSlots' => $timeSlots,
            'clinicdetails'=>$clinicdetails,
            
        ];
    
        $this->view('calendars/timeslot', $data);
    }
    



  public function createclinic(){
    $clinic =  $this->midwifeModel->getPHMByMidwife();
    // check for post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        // PROCESS FORM
        // sanitizing the POST data
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        // init data 
        $data = [
            'clinic'=>$clinic,
            'midwife_nic' => $_SESSION['midwife_nic'],
            'gnd' => trim($_POST['gnd']),
            'title' => trim($_POST['title']),
           
            'start_event' => trim($_POST['start_event']),
            'end_event' => trim($_POST['end_event']),
            'clinic_date' => trim($_POST['clinic_date']),
            'duration' => trim($_POST['duration']),
            'title_err' => '',
            'start_event_err' => '',
            'end_event_err' => '',
            'clinic_date_err' => '',
            'duration_err' => '',
        ];

        // validate variables
        if (empty($data['title'])) {
            $data['title_err'] = '*Please enter the type of clinic';
        }
        if (empty($data['start_event'])) {
            $data['start_event_err'] = '*Please enter the starting time';
        }
        if (empty($data['end_event'])) {
            $data['end_event_err'] = '*Please enter the ending time';
        }
        if (empty($data['clinic_date'])) {
            $data['clinic_date_err'] = '*Please enter the date';
        }
        if (empty($data['duration'])) {
            $data['duration_err'] = '*Please enter the duration';
        }

        // make sure all the necessary data are filled by midwife
        if (empty($data['title_err']) && empty($data['start_event_err']) && empty($data['end_event_err']) && empty($data['clinic_date_err']) && empty($data['duration_err'])) {
            
            // calculate time slots
            $start_time = strtotime($data['start_event']);
            $end_time = strtotime($data['end_event']);
            $duration = intval($data['duration']);
            $time_slots = [];

            while ($start_time < $end_time) {
                $time_slots[] = date('H:i:s', $start_time) . ' - ' . date('H:i:s', ($start_time + $duration * 60));
                $start_time += $duration * 60;
            }

            $data['time_slots'] = $time_slots;

            // validated $data['time_slots'])
            if ($this->calendarModel->insert($data)  && $this->timeSlotModel->getSlots() && $this->timeSlotModel->saveSlots($data)) {
                redirect('calendars/maternitycalendar');
            } else {
                redirect('calendars/maternitycalendar');
            }
        } else {
            // load view with errors
            $this->view('calendars/createclinic', $data);
        }

    } else {
        // init data
        $clinic =  $this->midwifeModel->getPHMByMidwife();
        $data = [
            'clinic'=>$clinic,
            'gnd' => '',
            'title' => '',
            'title_err' => '',
            'clinic_id'=>'',
            'start_event' => '',
            'end_event' => '',
            'clinic_date' => '',
            'start_event_err' => '',
            'end_event_err' => '',
            'clinic_date_err' => '',
            'duration' => '',
            'duration_err' => '',
            'gnd_err' => '',
        ];

        // load view
        $this->view('calendars/createclinic', $data);
    }
}


 
}
?>


