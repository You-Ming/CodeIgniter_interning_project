<?php //admin home model
class Banner_model extends MY_Model{

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('banner','bannerID');
    }

    public function read_banner_name($name)
    {
      $array = array('bannerName' => $name);
      return $this->read_by_key($array);
    }

    public function read_banner()
    {
      $this->db->order_by('bannerID','DESC');
      return $this->read();
    }

    public function set_banner($name,$title,$filename)
    {
        $data = array(
          'bannerName' => $name,
          'bannerTitle' => $this->escape_string($title),
          'bannerImgName' => $filename
        );

        return $this->create($data);
    }



    /*public function get_banner_name_row($name)
    {
        $query = $this->db->get_where('banner',array('bannerState' => '1','bannerName' => $name));
        return $query->row_array();
    }*/

    /*public function del_banner($id,$name)
    {//UPDATE banner SET bannerState = '0' WHERE bannerID = $id;
        $data = array('bannerState' => '0');
        unlink("uploads/images/banner/".$name);//刪除uploads資料
        $this->db->update('banner',$data,array('bannerID' => $id));
    }*/

    /*public function update_banner($id,$newName,$type=NULL)
    {
        if(!isset($type)){
            $data = array('bannerName' => $newName);
            $this->db->update('banner',$data,array('bannerID' => $id));
        }
        else{
        $data = array('bannerName' => $newName,'bannerType' => $type);
        $this->db->update('banner',$data,array('bannerID' => $id));
      }
    }*/
}
