<?php
    //Simple page redirect
    function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }
    function redirectto($page, $data){
        header('location: ' . URLROOT . '/' . $page . '/' . $data['nic'] );
    }
   
  