<?php
  class ExpectantRecords extends Controller {
    public function __construct(){
       // if(!isLoggedInExpectant()){ // we use this to say that only the logged in midwife can see this page and add records
            //redirect('users/register');
       // }
       $this->expectantRecordModel = $this->model('ExpectantRecord');
     $this->clinicattendeeModel = $this->model('Clinicattendee');
       
       
     
    }


    public function index(){

      //get records
      $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 
      $newexpectantRecords =  $this->expectantRecordModel-> getNewExpectantRecords(); 

        $data = [
          'expectantRecords' => $expectantRecords ,
          'newexpectantRecords'=> $newexpectantRecords
          ];
         
      
        $this->view('expectantRecords/index', $data);
      }
      public function info($nic){
        $info =  $this->expectantRecordModel->displayExpectantRecords($nic);
       $report=  $this->expectantRecordModel->showExpectantMonthlyRecords($nic);
       $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords(); 

        $data = [
            'info' => $info,
            'report'=> $report
        ];

        $this->view('expectantRecords/info', $data);
    }

    public function expectant($nic, $reportNo){
     
     $singlereport=  $this->expectantRecordModel->displayExpectantReports($nic, $reportNo);

      $data = [
          
          'singlereport'=> $singlereport
      ];

      $this->view('expectantRecords/expectant', $data);
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

      public function add($nic){
         

        if($_SERVER['REQUEST_METHOD']=='POST'){
            //Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
              'nic' => trim($_POST['nic']),
              'nic_err'=>'',
              'reportNo' => trim($_POST['reportNo']),
              'reportNo_err'=>'',
              'date'=> trim($_POST['date']),
              'date_err'=>'',
              'weight'=> trim($_POST['weight']),
              'weight_err'=>'',
              'vaccination'=> trim($_POST['vaccination']),
              'vitaminC'=> trim($_POST['vitaminC']),
              'ironorForlate'=> trim($_POST['ironorForlate']),
              'antimarialDrugs'=> trim($_POST['antimarialDrugs']),
              'calcium'=> trim($_POST['calcium']),
              'triposha'=> trim($_POST['triposha']),

            //  'info'=> $info
            
              
                    
              ];
           //validate data
             if(empty($data['reportNo'])){
              $data['reportNo_err'] = 'Please enter the report Number';
             }
             if(empty($data['date'])){
              $data['date_err'] = 'Please enter the date';
            }
             
             if(empty($data['weight'])){
              $data['weight_err'] = 'Please enter the weight';
             }

            //make sure that there are no errors
             if(empty($data['reportNo_err']) && empty($data['date_err']) && empty($data['weight_err']) && empty($data['nic_err']))
             {
               //validated
                //die('Successfull');

                //add expectant mother's records
                if($this->expectantRecordModel->addRecords($data)){
                  //print_r($_POST);
                 redirect('expectantRecords');
              }else{
                  die('Something went wrong');
              }
          } else{
              //load view with errors
             
              $this->view('expectantRecords/add', $data);
            
          }
          
           } else{

            $info =  $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
            $expectantRecords =  $this->expectantRecordModel-> getExpectantRecords();
        $data = [
          'nic' =>'',
          'nic_err' =>'',
          'reportNo' =>'',
          'reportNo_err'=>'',
          'date'=>'',
          'date_err'=>'',
          'weight'=>'',
          'weight_err'=>'',
          'vaccination'=>'',
          'vitaminC'=>'',
          'ironorForlate'=>'',
          'antimarialDrugs'=>'',
          'calcium'=>'',
          'triposha'=>'',
          'info' => $info,
          'expectantRecords'=>$expectantRecords,

        
          
          
                
          ];
         
      
        $this->view('expectantRecords/add', $data);

        }
      }

      public function password_expectant($nic){
     
       
   
        if($_SERVER['REQUEST_METHOD']=='POST'){
          //Sanitize POST array
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'username' => trim($_POST['username']),
             'username_err'=>'',
            'password' => trim($_POST['password']),
            'password_err'=>'',

            
          ];

          //make sure that there are no errors
           if(empty($data['password_err']))
           {
             //validated
              //die('Successfull');

              //add expectant mother's records
              if($this->expectantRecordModel->password_expectant($data)){
               
                redirectto('pages/about');
 
                        
            }else{
                die('Something went wrong');
            }
        } else{
            //load view with errors
            $this->view('expectantRecords/password_expectant', $data);
        }
        
         } else{

          $sendingPassword =  $this->clinicattendeeModel->getClinicAttendeeByNic($nic);
      $data = [
        'password'=>'',
        'password_err'=>'',
        'username'=>'',
        'username_err'=>'',
        'sendingPassword' => $sendingPassword
      
        
        
              
        ];
       
    
      $this->view('expectantRecords/password_expectant', $data);

      }
    }
     }
    
  

  
  