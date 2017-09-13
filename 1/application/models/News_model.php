<?php
class News_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_news($newsID = FALSE)
    {
            if ($newsID === FALSE)//SELECT * FROM news WHERE newsState ='1' ORDER BY newsTime DESC LIMIT 0,5;
            {
                    $query = $this->db->order_by('newsTime','DESC')->get_where('news',array('newsState' => '1'),5,0);
                    return $query->result_array();
            }

            $query = $this->db->get_where('news', array('newsID' => $newsID));//SELECT * FROM news WHERE newsTitle = $newsTitle;
            return $query->row_array();
    }

    public function get_news_rows()//取得新聞總筆數
    {
        $query = $this->db->get_where('news',array('newsState' => '1'));
        return $query->num_rows();
    }

    public function page_news($offset)//每頁顯示的新聞列表
    {//SELECT * FROM news WHERE newsState = '1' LIMIT $offset,5;
        $query = $this->db->order_by('newsTime','DESC')->get_where('news',array('newsState' => '1'),5,$offset);
        return $query->result_array();
    }

}
