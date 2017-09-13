<?php
class Contact_model extends MY_Model {

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('contact','guestID');
    }

    /*public function set_contact()
    {
        $data = array(
            'guestName' => $this->input->post('guestName'),
            'guestEmail' => $this->input->post('guestEmail'),
            'guestTitle' => $this->input->post('guestTitle'),
            'guestContent' => $this->input->post('guestContent'),
            'contactTime' => date("Y:m:d H:i:s",time())
        );

        return $this->db->insert('contact', $data);
    }*/
}
