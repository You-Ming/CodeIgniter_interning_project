<?php //admin about model
class About_model extends MY_Model{

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('about','aboutID');
    }

    public function read_about_title($title)
    {
      $array = array('aboutTitle' => $title);
      return $this->read_by_key($array);
    }
    /*public function get_about($title=NULL)
    {//SELECT * FROM about WHERE aboutState = 1;
        if($title==NULL)
        {
          $query = $this->db->get_where('about', array('aboutState' => '1'));
          return $query->result_array();
        }
        else
        {
          $query = $this->db->get_where('about', array('aboutState' => '1','aboutTitle' => $title));
          return $query->row_array();
        }
    }*/

    /*public function del_about($title)
    {//UPDATE about SET aboutState = '0' WHERE aboutTitle = $title;
        $data = array('aboutState' => '0');
        $this->db->update('about',$data,array('aboutTitle' => $title));
    }*/

    /*public function set_about($title,$content)
    {
        $data = array(
          'aboutTitle' => $title,
          'aboutContent' => $content,
        );
        $this->db->insert('about',$data);

    }*/

    /*public function update_about($oldtitle,$title,$content)
    {
        $data = array('aboutTitle' => $title,'aboutContent' => $content);
        $this->db->update('about',$data,array('aboutTitle' => $oldtitle,'aboutState' => '1'));
    }*/

}
