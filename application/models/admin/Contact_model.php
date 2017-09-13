<?php //admin contact model
class Contact_model extends MY_Model{

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('contact','guestID');
    }

    public function contact_rows()
    {
      $this->read();
      return $this->num_rows;
    }

    public function read_contact($limit = NULL,$offset = NULL)
    {
      $this->db->order_by('contactTime','DESC');
      return $this->read($limit,$offset);
    }

    public function contact_search_rows($like = NULL)
    {
        $this->db->or_like(array('guestTitle' => $like));
        return $this->contact_rows();
    }

    public function read_contact_search($limit = NULL,$offset = NULL,$like = NULL)
    {
        $this->db->or_like(array('guestTitle' => $like));
        return $this->read_contact($limit,$offset);
    }

    /*public function get_contact($offset)
    {//SELECT * FROM contact WHERE contactState = '1' ORDER BY contactTime DESC LIMIT $offset,10;
        $query = $this->db->order_by('contactTime','DESC')->get_where('contact',array('contactState' => '1'),10,$offset);
        return $query->result_array();
    }*/

    /*public function get_contact_row()//取得聯絡我們總筆數
    {//SELECT * FROM contact WHERE contactState = '1';
        $query = $this->db->get_where('contact',array('contactState' => '1'));
        return $query->num_rows();
    }*/

    /*public function del_contact($id)
    {//UPDATE contact SET contactState = '0' WHERE guestID = $id;
        $data = array('contactState' => '0');
        $this->db->update('contact',$data,array('guestID' => $id));
    }*/

    /*public function get_contact_content($id)
    {
        $query = $this->db->get_where('contact',array('contactState' => '1','guestID' => $id));
        return $query->row_array();
    }*/
}
