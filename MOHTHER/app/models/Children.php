</ /?php class Children{ private $db; public function __construct(){ $this->db=new Database;
}
}
?>


</?php class Clinicattendee{ private $db; public function __construct(){ $this->db=new Database;
}


// public function getchild_report(){
// $this->db->query("SELECT * FROM child_records WHERE nic = ".$_SESSION['clinicattendee_nic']);

// $row = $this->db->single();

// return $row;
// }


}