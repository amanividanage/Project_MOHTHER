<?php
    class Clinics extends Controller{
        public function __construct(){

            if(!isLoggedIn()){
                redirect('admins/login');
            }
            

            $this->clinicModel = $this->model('Clinic');
            $this->doctorModel = $this->model('Doctor');
            $this->midwifeModel = $this->model('Midwife');
        }



        public function index(){
            //Get clinics 
            $clinics = $this->clinicModel->getClinics();

            $data = [
                'clinics' => $clinics
            ];

            $this->view('clinics/index', $data);
        }


        public function add(){
            if($_SERVER["REQUEST_METHOD"] == 'POST'){
                //Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'clinic_name' => trim($_POST['clinic_name']),
                    'gnd' => trim($_POST['gnd']),
                    'phm' => trim($_POST['phm']),
                    'location' => trim($_POST['location']),
                    'clinic_name_err' => '',
                    'gnd_err' => '',
                    'phm_err' => '',
                    'location_err' => '',
                    
                ];

                //validate data
                if(empty($data['clinic_name'])){
                    $data['clinic_name_err'] = 'Please enter the name';
                }

                if(empty($data['gnd'])){
                    $data['gnd_err'] = 'Please select the Grama Niladhari Division';
                }

                if(empty($data['phm'])){
                    $data['phm_err'] = 'Please select the PHM Area';
                }

                if(empty($data['location'])){
                    $data['loacation_err'] = 'Please enter your location';
                }


                //Make sure no errors
                if(empty($data['clinic_name_err']) && empty($data['gnd_err']) && empty($data['phm_err']) && empty($data['location_err'])){
                    if($this->clinicModel->addClinic($data)){
                        //flash('clinic_added', 'Clinic Added');
                        redirect('clinics');
                        //header("Location: http://localhost/moh/clinics");
                        //exit();
                    } else {
                        die('Someting went wrong');
                    }
                } else {
                    //Load view with errors
                    $this->view('clinics/add', $data);
                }

            } else {
                $data = [
                    'clinic_name' => '',
                    'gnd' => '',
                    'phm' => '',
                    'location' => '',
                    'clinic_name_err' => '',
                    'gnd_err' => '',
                    'phm_err' => '',
                    'location_err' => '',
                ];
    
                $this->view('clinics/add', $data);
            }
        }

        public function info($id){
            $clinic = $this->clinicModel->getClinicById($id);
            
            $doctor = $this->doctorModel->findDoctorByClinic($id);

            $midwife = $this->midwifeModel->findMidwifeByClinic($id);

            $data = [
                'clinic' => $clinic,
                'doctor' => $doctor,
                'midwife' => $midwife
            ];

            $this->view('clinics/info', $data);
        }


             
            
    

        
        


    }