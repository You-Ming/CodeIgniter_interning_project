<?php //admin product model
class Product_model extends MY_Model{

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('product','productID');
    }

    public function product_rows()
    {
      $this->read();
      return $this->num_rows();
    }

    public function read_product_name($name)
    {
      $array = array('productName' => $name);
      return $this->read_by_key($array);
    }

    public function read_product($limit = NULL,$offset = NULL)
    {
      $this->db->order_by('productID','DESC');
      return $this->read($limit,$offset);
    }

    public function read_product_type($type)
    {
      $array = array('productType' => $type);
      return $this->read_by_where($array);
    }

    public function read_product_search($limit = NULL,$offset = NULL,$like = NULL)
    {
      $this->db->or_like(array('productName' => $like));
      $this->db->order_by('productID','DESC');
      return $this->read($limit,$offset);
    }

    public function product_search_rows($like = NULL)
    {
      $this->db->or_like(array('productName' => $like));
      return $this->product_rows();
    }

    /*public function get_product($name = NULL)
    {
        if($name == NULL) {
          $query = $this->db->get_where('product',array('productState' => '1'));
          return $query->result_array();
        }else{
          $query = $this->db->get_where('product',array('productState' => '1', 'productName' => $name));
          return $query->row_array();
        }
    }*/

    /*public function get_product_rows()//取得產品總筆數
    {
        $query = $this->db->get_where('product',array('productState' => '1'));
        return $query->num_rows();
    }*/

    /*public function page_product($offset)//每頁顯示的產品列表
    {//SELECT * FROM product WHERE productState = '1' LIMIT $offset,5 ORDER BY productID DESC;
        $query = $this->db->order_by('productID','DESC')->get_where('product',array('productState' => '1'),10,$offset);
        return $query->result_array();
    }*/

    /*public function del_product($id)//刪除產品
    {//UPDATE product SET productType = '0' WHERE productID = $id;
        $data = array('productState' => '0');
        $this->db->update('product',$data,array('productID' => $id));
    }*/

    /*public function set_product()
    {

    }

    public function update_product()
    {

    }*/

}
