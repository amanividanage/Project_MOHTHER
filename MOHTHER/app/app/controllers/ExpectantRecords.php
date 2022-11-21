<?php
    class ExpectantRecords extends Controller {
        public function __construct(){


        }

        public function index(){

            $data = [

            ];

            $this->view('expectantRecords/index', $data);
        }




    }