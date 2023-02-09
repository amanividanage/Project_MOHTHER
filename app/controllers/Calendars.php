<?php
  class Calendars extends Controller {
    public function __construct(){
        $this->calendarModel = $this->model('Calendar');
        $this->midwifeModel = $this->model('Midwife');
       
     
    }

    public function maternitycalendar(){

        $data = [
          
            ];
        $this->view('calendars/maternitycalendar', $data);
    }

    public function createclinic(){

     //check for post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      //PROCESS FORM
      //die('Submitted');
      //sanitizing the POST data
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

     // $newexpectantRecords =  $this->expectantRecordModel-> getNewExpectantRecordsByNic($nic); 
      //init data 
      $data =[
         // 'newexpectantRecords'=> $newexpectantRecords,
          'midwife_id'=>$_SESSION['midwife_id'],
          'title' => trim($_POST['title']),
          'start_event' => trim($_POST['start_event']),
          'end_event' => trim($_POST['end_event']),
          'title_err' => '',
          'start_event_err' => '',
          'end_event_err' => ''
          ];

          //validate variables
          if(empty($data['title'])){
              $data['title_err']='*Please enter the type of clinic';
          }
          if(empty($data['start_event'])){
              $data['start_event_err']='*Please enter the starting time';
          }

          if(empty($data['end_event'])){
              $data['end_event_err']='*Please enter the ending time';
          }

          //make sure all the necessary data are filled by midwife
          if(empty($data[ 'title_err']) && empty($data[ 'start_event_err'])&& empty($data[ 'end_event_err']))
          {
              //validated
              //die('Successfull');

              if($this->calendarModel->insert($data)){
                  
                 redirect('calendars/maternitycalendar');
              }else{
                  redirect('calendars/maternitycalendar');
              }


          } else{
              //load view with errors
              $this->view('users/createclinic', $data);
          }

  }else{
     // $newexpectantRecords =  $this->expectantRecordModel-> getNewExpectantRecordsByNic($nic); 
      //init data
      $data =[
     // 'newexpectantRecords'=> $newexpectantRecords,
      'title' => '',
      'title_err' => '',
      'start_event' => '',
      'end_event' => '',
      'start_event_err' => '',
      'end_event_err' => '',
      
     
      ];

       //load view
     
   
      $this->view('calendars/createclinic', $data);
  }
}

    public function build_calendar($month, $year){
         
        // Get the number of days in the month
  $numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
  
  // Get the first day of the month as a timestamp
  $firstDay = mktime(0, 0, 0, $month, 1, $year);
  
  // Get the day of the week for the first day of the month
  $firstDayOfWeek = date("w", $firstDay);
  
  $data = [
    'month'=> $month,
    'year'=> $year,
    'numDays'=> $numDays,
    'firstDay'=> $firstDay,
    'firstDayOfWeek'=> $firstDayOfWeek
          
  ];
    

  $this->view('calendars/build_calendar', $data);  
    }
}


  