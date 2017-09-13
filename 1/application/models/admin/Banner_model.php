<?php //admin home model
class Banner_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function set_banner($name,$type)
    {
        $data = array(
        'bannerName' => $name,
        'bannerType' => $type,
        );

        $this->db->insert('banner', $data);
    }

    public function del_banner($id)
    {//UPDATE banner SET bannerState = '0' WHERE bannerID = $id;
        $data = array('bannerState' => '0');
        $this->db->update('banner',$data,array('bannerID' => $id));
    }
}
