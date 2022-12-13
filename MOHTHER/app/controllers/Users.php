<?php
class Users extends Controller{
   public function __construct(){
        $this->userModel = $this->model('User');
        $this->clinicattendeeModel = $this->model('Clinicattendee');
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
            $this->view('users/password_expectant', $data);
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
       
    
      $this->view('users/password_expectant', $data);

      }
    }

public function expectant(){
 //get records
 $expectantemail =  $this->userModel-> getExpectantemail(); 
 $expectantnic =  $this->userModel-> getExpectantnic(); 
 //check for post
 if($_SERVER['REQUEST_METHOD'] == 'GET'){
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
             if($this->userModel->getExpectantemail($data['expectantemail'])){
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
                 if($this->userModel->email($data)){
                     redirect('expectantRecords/expectant');
                 } else {
                     die('Someting went wrong');
                 }
     
             }
           $this->view('expectantRecords/expectant', $data);
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
      $this->view('expectantRecords/expectant', $data);
  
 }
}
  
    
  

   
  public function risky(){
    $data = [];
  
    $this->view('users/risky', $data);
  }

  public function email(){

    //get records
    $expectantemail =  $this->userModel-> getExpectantemail(); 
    $expectantnic =  $this->userModel-> getExpectantnic(); 
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
                if($this->userModel->getExpectantemail($data['expectantemail'])){
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
                    if($this->userModel->email($data)){
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
    
 // public function index(){
    //Get clinics 
 //   $display = $this->userModel->getUsers();

   // $data = [
        //'nic' => $display
   // ];

   /// $this->view('users/index', $data);
//}


   public function register(){
    //check for post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //PROCESS FORM
        //die('Submitted');
        //sanitizing the POST data
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


        //init data 
        $data =[

            'nic' => trim($_POST['nic']),
          //  'midwife_id'=>$_SESSION['midwife_id'],
            'height' => trim($_POST['height']),
            'weight' => trim($_POST['weight']),
            'bloodPressure' => trim($_POST['bloodPressure']),
            'allergies' => trim($_POST['allergies']),
            'consanguinity'=> trim($_POST['consanguinity']),
            'rubellaImmunization'=> trim($_POST['rubellaImmunization']),
            'prePregnancyScreening'=> trim($_POST['prePregnancyScreening']),
            'preconceptionalFolicAcid'=> trim($_POST['preconceptionalFolicAcid']),
            'subfertility' =>  trim($_POST['subfertility']),
            'gravidity' =>  trim($_POST['gravidity']),
            'noofChildren' =>  trim($_POST['noofChildren']),
            'ageofYoungest'=> trim($_POST['ageofYoungest']),
            'lastMenstrualDate' => trim($_POST['lastMenstrualDate']),
            'registrationDate' =>  trim($_POST['registrationDate']),
            'expectedDateofDelivery' =>  trim($_POST['expectedDateofDelivery']),
            'password'=> trim($_POST['password']),
          // 'bmi' => trim($_POST['bmi']),
           //'output' => trim($_POST['output']),
            'nic_err' => '',
            'height_err' => '',
            'weight_err' => '',
            'bloodPressure_err' => '',
            'allergies_err' => '',
            'consanguinity_err'=> '',
            'rubellaImmunization_err'=>'',
            'prePregnancyScreening_err'=>'',
            'preconceptionalFolicAcid_err'=>'',
            'subfertility_err' => '',
            'gravidity_err' => '',
            'noofChildren_err' => '',
            'ageofYoungest_err'=>'',
            'lastMenstrualDate_err' => '',
            'registrationDate_err' => '',
            'expectedDateofDelivery_err' => '',
            'bmi_err'=>'',
            'output_err'=>'',
            'password_err'=>'',
            
            
            ];

            //validate variables
            if(empty($data['nic'])){
                $data['nic_err']='*Please enter the NIC';
            }else{
               // check nic
                if($this->userModel->findUserByNIC($data['nic'])){
                    $data['nic_err'] = 'This user is already registered';
                }



            }
            if(empty($data['height'])){
                $data['height_err']='*Please enter the height';
            }

            if(empty($data['weight'])){
                $data['weight_err']='*Please enter the weight';
            }

            if(empty($data['bloodPressure'])){
                $data['bloodPressure_err']='*Please enter the Blood Pressure';
            }

            if(empty($data['allergies'])){
                $data['allergies_err']='*Please enter any allergies that the patient is having';
            }

            if(empty($data['subfertility'])){
                $data['subfertility_err']='*Please enter the histroy of subfertility';
            }

            if(empty($data['gravidity'])){
                $data['gravidity_err']='*Please enter the gradivity details';
            }

            if(empty($data['noofChildren'])){
                $data['noofChildren_err']='*Please enter the No of Children the expectant mother has';
            }

           
            if(empty($data['lastMenstrualDate'])){
                $data['lastMenstrualDate_err']='*Please enter the Last Menstrual Date';
            }

            if(empty($data['registrationDate'])){
                $data['registrationDate_err']='*Please enter the Registration Date';
            }

            if(empty($data['expectedDateofDelivery'])){
                $data['expectedDateofDelivery_err']='Please enter the Expected date of delivery';
            }
            if(empty($data['password'])){
                $data['password_err']='Please enter the user password';
            }

            //validate the date of registration and expected date of delivery
            //if($data['registrationDate'] == $data['expectedDateofDeliver'] ){
                //$data['expectedDateofDelivery_err'] ='Expecetd date cannot be the registration date';
            //}

            //make sure all the necessary data are filled by midwife
            if(empty($data[ 'nic_err']) && empty($data[ 'height_err'])&& empty($data[ 'weight_err']) && empty($data[ 'bloodPressure_err']) && empty($data[  'allergies_err']) && empty($data[  'subfertility_err']) && empty($data[  'gravidity_err']) && empty($data[ 'noofChildren_err'] )  && empty($data[ 'password_err'] ))
            {
                //validated
                //die('Successfull');
                  //Hash password
                  $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //register user
                if($this->userModel->register($data)){
                    //displaying the message using sessions- sessions_helpersA.php
                //   flash('register_success', 'You have successfully completed the 2nd phase of registration of clinic attendee with the NIC number ' .'   ' . $data['nic'] . ' ' . 'with the expected date of delivery on ' .'   ' . $data['expectedDateofDelivery']);
                   
                   redirect('pages/about');
                }else{
                    die('Something went wrong');
                }


            } else{
                //load view with errors
                $this->view('users/register', $data);
            }

    }else{
        //init data
        $data =[

        'nic' => '',
       // 'midwife_id'=>'',
        'height' => '',
        'weight' => '',
        'bloodPressure' => '',
        'allergies' => '',
        'consanguinity' =>'',
        'rubellaImmunization' => '',
        'prePregnancyScreening' => '',
        'preconceptionalFolicAcid'=>'',
        'subfertility' => '',
        'gravidity' => '',
        'noofChildren' => '',
        'ageofYoungest'=>'',
        'lastMenstrualDate' => '',
        'registrationDate' => '',
        'expectedDateofDelivery' => '',
        'password'=>'',
        'nic_err' => '',
        'height_err' => '',
        'weight_err' => '',
        'bloodPressure_err' => '',
        'allergies_err' => '',
        'consanguinity_err'=>'',
        'rubellaImmunization_err'=>'',
        'prePregnancyScreening_err'=>'',
        'preconceptionalFolicAcid_err'=>'',
        'subfertility_err' => '',
        'gravidity_err' => '',
        'noofChildren_err' => '',
        'ageofYoungest_err'=>'',
        'lastMenstrualDate_err' => '',
        'registrationDate_err' => '',
        'expectedDateofDelivery_err' => '',
        'date'=>'',
        'calculatedBMI'=> '',
        'year' => '',
        'password_err'=> '',
        
        
        ];

         //load view
         $this->view('users/register', $data);
     
    }
  }

  public function info($nic){
    $display = $this->userModel->getUserByNIC($nic);
    

    $data = [
        'display' => $display
    ];

    $this->view('users/risky', $data);
}
}