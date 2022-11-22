<?php
    class Clinicattendees extends Controller {
        public function __construct(){

            $this->childrenModel = $this->model('Children');

        }

        

        

         public function vaccination(){
        //     $children =  $this->childrenModel->getVaccination();

             $data = [
                 //'vaccination' => vaccination
            ];

             $this->view('children/vaccination', $data);
         }
        }