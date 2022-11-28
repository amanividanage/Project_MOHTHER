<?php
    class Children extends Controller {
        public function __construct(){

            //$this->childrenModel = $this->model('Children');

        }

        

        public function index(){
            //Get clinic attendee
           // $clinicattendee = $this->clinicattendeeModel->getClinicAttendeeByNic($nic);

            $data = [
               // 'clinicattendee' => $clinicattendee
            ];

            $this->view('children/index', $data);
        }
        

        

         public function vaccination(){
        //     $children =  $this->childrenModel->getVaccination();

             $data = [
                 //'vaccination' => vaccination
            ];

             $this->view('children/vaccination', $data);
         }

        
        }