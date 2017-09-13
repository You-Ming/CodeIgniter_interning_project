<?php //admin user model
class User_model extends MY_Model{

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('admin','adminID');
    }

    public function read_username($username)
    {
      $array = array('adminUsername' => $username);
      return $this->read_by_key($array);
    }

    /*public function get_user($username = NULL)
    {
        if ($username == NULL) {//SELECT * FROM admin WHERE adminState = '1';
          $query = $this->db->get_where('admin',array('adminState' => '1'));
          return $query->result_array();
        }
        else {//SELECT * FROM admin WHERE adminState = '1' AND adminUsername = $username;
          $query = $this->db->get_where('admin',array('adminState' => '1','adminUsername' => $username));
          return $query->row_array();
        }
    }*/

    /*public function del_user($username)
    {//UPDATE admin SET adminState = '0' WHERE adminUsername = $username;
        $data = array('adminState' => '0');
        $this->db->update('admin',$data,array('adminUsername' => $username));
    }*/

    /*public function set_user($name,$username,$password)
    {
        $data = array(
          'adminName' => $name,
          'adminUsername' => $username,
          'adminPassword' => $password,
        );
        $this->db->insert('admin',$data);
    }*/

    /*public function update_user($username,$name,$password)
    {
        $data = array(
          'adminName' => $name,
          'adminPassword' => $password,
        );
        $this->db->update('admin',$data,array('adminUsername' => $username));
    }*/

}
