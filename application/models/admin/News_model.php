<?php //admin news model
class News_model extends MY_Model{

    public function __construct(){
        //$this->load->database();
        parent::__construct();
        $this->set_table('news','newsID');
    }

    public function news_rows()
    {
      $this->read();
      return $this->num_rows();
    }

    public function read_news($limit = NULL,$offset = NULL)
    {
      $this->db->order_by('newsTime','DESC');
      return $this->read($limit,$offset);
    }

    public function read_news_search($limit = NULL,$offset = NULL,$like = NULL)
    {
      $this->db->or_like(array('newsTitle' => $like));
      $this->db->order_by('newsTime','DESC');
      return $this->read($limit,$offset);
    }

    public function news_search_rows($like = NULL)
    {
      $this->db->or_like(array('newsTitle' => $like));
      return $this->news_rows();
    }

    /*public function get_news($id)
    {
        $query = $this->db->get_where('news',array('newsState' => '1','newsID' => $id));
        return $query->row_array();
    }*/

    /*public function get_news_rows()//取得新聞總筆數
    {
        $query = $this->db->get_where('news',array('newsState' => '1'));
        return $query->num_rows();
    }*/

    /*public function page_news($offset)//每頁顯示的新聞列表
    {//SELECT * FROM news WHERE newsState = '1' LIMIT $offset,5;
        $query = $this->db->order_by('newsTime','DESC')->get_where('news',array('newsState' => '1'),10,$offset);
        return $query->result_array();
    }*/

    /*public function del_news($id)
    {//UPDATE news SET newsState = '0' WHERE newsID = $id;
        $data = array('newsState' => '0');
        $this->db->update('news',$data,array('newsID' => $id));
    }*/

    /*public function set_news($title,$content,$time)
    {
        $data = array(
          'newsTitle' => $title,
          'newsContent' => $content,
          'newsTime' => date("Y:m:d H:i:s",strtotime($time)),
        );
        $this->db->insert('news',$data);
    }*/

    /*public function update_news($id,$title,$content,$time)
    {
        $data = array(
          'newsTitle' => $title,
          'newsContent' => $content,
          'newsTime' => date("Y:m:d H:i:s",strtotime($time)),
        );
        $this->db->update('news',$data,array('newsID' => $id));
    }*/

}
