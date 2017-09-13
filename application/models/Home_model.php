<?php
class Home_model extends MY_Model {

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('banner','bannerID');
    }

    public function read_banner()
    {
      $this->db->order_by('bannerID','DESC');
      return $this->read();
    }

    public function banner_rows()
    {
      $this->read();
      return $this->num_rows;
    }

    /*public function get_banner()
    {//SELECT * FROM banner WHERE bannerState='1' ORDER BY bannerID ASC
        $query = $this->db->order_by('bannerID','DESC')->get_where('banner',array('bannerState' => '1'));
        return $query->result_array();
    }*/

    /*public function get_banner_id($bannerID)
    {//SELECT * FROM banner WHERE bannerState='1' AND bannerID=$bannerID;
        $query = $this->db->get_where('banner',array('bannerState' => '1','bannerID' => $bannerID));
        return $query->row_array();
    }*/

    /*public function get_banner_num()
    {//SELECT * FROM banner WHERE bannerState='1'
        $query = $this->db->get_where('banner',array('bannerState' => '1'));
        return $query->num_rows();
    }*/

    /*public function home_get_news()
    {//SELECT * FROM news WHERE newsState='1' ORDER BY newsTime DESC
        $query = $this->db->order_by('newsTime','DESC')->get_where('news',array('newsState' => '1'),3,0);
        return $query->result_array();
    }*/

    /*public function home_get_product()
    {//SELECT * FROM product WHERE productState = '1' ORDER BY productID DESC LIMIT 0,4;
        $query = $this->db->order_by('productID','DESC')->get_where('product',array('productState' => '1'),4,0);
        return $query->result_array();
    }*/

}
