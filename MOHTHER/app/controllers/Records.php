<?php
  class Records extends Controller {
    public function __construct(){
       // if(!isLoggedIn()){
            //redirect('users/register');
       // }
     
    }


    public function index(){
        $data = [
            'title' => 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy'
           
          ];
      
        $this->view('records/index', $data);
      }
}