<?php
  class ExpectantRecords extends Controller {
    public function __construct(){
       // if(!isLoggedInExpectant()){ // we use this to say that only the logged in midwife can see this page and add records
            //redirect('users/register');
       // }
       $this->expectantRecordModel = $this->model('ExpectantRecord');
       
     
    }


    public function index(){

      //get records
      $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 
        $data = [
          'expectantRecords' => $expectantRecords
                
          ];
         
      
        $this->view('expectantRecords/index', $data);
      }


      public function email(){

        //get records
        $expectantemail =  $this->expectantRecordModel-> getExpectantemail(); 
        $expectantnic =  $this->expectantRecordModel-> getExpectantnic(); 
        //check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //PROCESS FORM
            //die('Submitted');
            //sanitizing the POST data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
    
            //init data 
            $data =[
                'expectantnic' =>$expectantnic ,
                'expectantemail' => $expectantemail,
                'password' => trim($_POST['password']),
                
           
                'expectantnic_err' => '',
                'expectantemail_err' => '',
                'password_err' => '',
            
                ];
    
                //validate variables
                if(empty($data['password'])){
                    $data['password_err']='*Please enter the password';
                }else{
                   // check nic with email
                    if($this->expectantRecordModel->getExpectantemail($data['expectantemail'])){
                        $data['expectantemail_err'] = 'This user is already registered';
                    }
                }
    
               
                //make sure all the necessary data are filled by midwife
                if(empty($data[ 'expectantemail_err']) && empty($data[ 'expectantnic_err'])&& empty($data[ 'password_err'] ))
                {
                    //validated
                    //die('Successfull');
                        //validated
            
                        //Hash password
                  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            
                        //Register User
                        if($this->expectantRecordModel->email($data)){
                            redirect('users/email');
                        } else {
                            die('Someting went wrong');
                        }
            
                    }
                  $this->view('users/email', $data);
                }
    
                   else{
            //init data
            $data =[
    
                'expectantnic' => '',
                'expectantemail' => '',
                'password' => '',
                
                'expectantnic_err' => '',
                'expectantemail_err' => '',
                'password_err' => '',
            
    
         ];
    
             //load view
             $this->view('users/email', $data);
         
        }
      }
        
}