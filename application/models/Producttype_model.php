<?php
class Producttype_model extends MY_Model {

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('productType','typeID');
    }

    public function read_productType($name = NULL)
    {
        $name = urldecode($name);
        $array = array('typeName' => $name);
        return $this->read_by_where($array);
    }

    /*public function get_product_type($name = NULL)
    {
        $name = urldecode($name);
        if($name == NULL)//若name=null,取得全部分類
        {//SELECT * FROM productType WHERE typeState='1';
          $query = $this->db->get_where('productType',array('typeState' => '1'));
          return $query->result_array();
        }
        else{
          $query = $this->db->get_where('productType',array('typeState' => '1','typeName' => $name));
          return $query->result_array();
        }
    }*/


}
