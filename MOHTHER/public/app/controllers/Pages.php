<?php
    class Pages extends Controller{
        public function __construct(){
        
        } 
        
        public function index(){

            $data = [
                'title' => 'Home',
            ];

            $this->view('pages/index', $data);
        }

        public function about(){
            $data = [
                'title' => 'About Us'
            ];

            $this->view('pages/about', $data);
        }

        public function facilities(){
            $data = [
                'title' => 'Facilities'
            ];

            $this->view('pages/facilities', $data);
        }

        public function contact(){
            $data = [
                'title' => 'Contact Us'
            ];

            $this->view('pages/contact', $data);
        }
        
    }