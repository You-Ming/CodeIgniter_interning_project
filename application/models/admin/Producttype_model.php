<?php //admin product type model

class Producttype_model extends MY_Model{

  public function __construct(){
      //$this->load->database();
      parent::__construct();
      $this->set_table('productType','typeID');
  }

  public function read_productType($name)
  {
    $array = array('typeName' => $name);
    return $this->read_by_key($array);
  }

  /*public function get_productType($name=NULL)//取得產品分類
  {
      if($name==NULL){
      //SELECT * FROM productType WHERE typeState = '1' ORDER BY typeID ASC;
        $query = $this->db->order_by('typeID','ASC')->get_where('productType',array('typeState' => '1'));
        return $query->result_array();
      }else{
        $query = $this->db->get_where('productType',array('typeState' => '1','typeName' => $name));
        return $query->row_array();
      }
  }*/

  /*public function del_productType($name)//刪除產品分類，分類底下的產品也要刪除
  {
      $data_type = array('typeState' => '0');
      $data_product = array('productState' => '0');
      //UPDATE productType SET typeState = '0' WHERE typeName = $name;
      $this->db->update('productType',$data_type,array('typeName' => $name));
      //UPDATE product SET productType = '0' WHERE productType = $name;
      $this->db->update('product',$data_product,array('productType' => $name));
  }*/

  /*public function update_productType($oldname,$newname)
  {
      $data = array(
          'typeName' => $newname,
      );
      $this->db->update('productType',$data,array('typeName' => $oldname,'typeState' => '1'));
  }*/


}
