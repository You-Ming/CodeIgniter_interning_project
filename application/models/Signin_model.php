<?php
class Signin_model extends MY_Model {

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('admin','adminID');
    }

    public function read_username($username)
    {
      $array = array('adminUsername' => $username);
      return $this->read_by_where($array);
    }

    /*public function get_username($username)
    {//SELECT * FROM admin WHERE adminUsername=$username;
        $query = $this->db->get_where('admin',array('adminUsername' => $username));
        return $query->row_array();
    }*/

    /*public function check_admin($username,$password)
    {
        $query = $this->db->get_where('admin',array('adminState' => '1','adminUsername' => $username,'adminPassword' => $password));
        return $query->row_array();
    }*/

}
