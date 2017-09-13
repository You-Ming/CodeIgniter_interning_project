<?php
class Product_model extends MY_Model {

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('product','productID');
    }

    public function read_product($limit = NULL,$offset = NULL)
    {
      $this->db->order_by('productID','DESC');
      return $this->read($limit,$offset);
    }

    public function read_product_by_type($type = NULL)
    {
      $this->db->order_by('productID','DESC');
      if($type == NULL){
        return $this->read();
      }
      else{
        $array = array('productType' => $type);
        return $this->read_by_where($array);
      }
    }

    public function read_product_by_name($name = NULL)
    {
      $array = array('productName' => $name);
      return $this->read_by_key($array);
    }

    /*public function get_product_img($productID)
    {//SELECT * FROM product WHERE productState='1' AND produtID=$productID;
        $query = $this->db->get_where('product',array('productState' => '1','productID' => $productID));
        return $query->row_array();
    }*/

    /*public function get_product_name($name)//產品資訊
    {//SELECT * FROM product WHERE productState='1' AND productName=$name;
        $name = urldecode($name);
        $query = $this->db->get_where('product',array('productState' => '1','productName' => $name));
        return $query->result_array();
    }*/

    /*public function get_product($type)//產品清單
    {
        $type = urldecode($type);
        if($type == NULL)
        {//SELECT * FROM product WHERE productState = '1';
            $query = $this->db->get_where('product',array('productState' => '1'));
            return $query->result_array();
        }
        else{//SELECT * FROM product WHERE productState='1' AND productType=$type;
          $query = $this->db->get_where('product',array('productState' => '1','productType' => $type));
          return $query->result_array();
        }
    }*/

}
