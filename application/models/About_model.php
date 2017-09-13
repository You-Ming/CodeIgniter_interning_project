<?php
class About_model extends MY_Model {

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('about','aboutID');
    }

    /*public function get_about()//關於我們清單
    {//SELECT * FROM about WHERE aboutState = '1';
        $query = $this->db->get_where('about', array('aboutState' => '1'));
        return $query->result_array();
    }*/

    public function get_about_content($title)//關於我們內容
    {
        if($title == NULL)//若URL無title,顯示第一筆about內容
        {//SELECT * FROM about WHERE aboutState LIMIT 0,1;
            return $this->read(1,0);
        }
        else{//SELECT * FROM about WHERE aboutState = '1' AND aboutTitle = $title;
            $array = array('aboutTitle' => $title);
            return $this->read_by_where($array);
        }
    }

}
