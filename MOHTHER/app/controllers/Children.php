<?php
    class Children extends Controller{
        public function __construct(){
            
        }

        public function index(){
            

            $data = [
                
            ];

            $this->view('children/index', $data);
        }
    }