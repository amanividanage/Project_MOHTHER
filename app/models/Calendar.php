<?php
    class Calendar{
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }


        public function insert($data){
            $this->db->query('INSERT INTO calendar (midwife_id,title,start_event,end_event) VALUES(:midwife_id,:title,:start_event,:end_event)');
       
      
        
            //bind values
            $this->db->bindParam(':midwife_id', $data['midwife_id']);
            $this->db->bindParam(':title', $data['title']);
            $this->db->bindParam(':start_event', $data['start_event']);
            $this->db->bindParam(':end_event', $data['end_event']);
            
               //execute for update/delete
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
      
        }

        public function update(){
            $this->db->query("UPDATE events SET title=:title
            WHERE id=:id
            ");

            

            $results = $this->db->resultSet();

            return $results;
        }

        public function delete(){
            $this->db->query("DELETE from events WHERE id=:id
            ");

            $results = $this->db->resultSet();

            return $results;
        }






    }
