<?php
class MY_Controller extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
  }

  public function page_link($base_url,$total_rows,$per_page,$query_string=NULL)
  {
    $this->load->library('pagination');//include pagination library

    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;//每頁筆數
    $config['suffix'] = $query_string;
    $config['first_url'] = $base_url.$query_string;

    $this->pagination->initialize($config);

    return $this->pagination->create_links();
  }
  
  public function escape_string($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

}


class Admin_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->is_logged_in();
  }

  public function is_logged_in()
  {
    $is_logged_in = $this->session->userdata('is_logged_in');
    if(!isset($is_logged_in) || $is_logged_in != true){
    redirect('/sign_in');
    }
  }

  public function breadcrumb($type = NULL){//導覽列
    $all = current_full_url();
    $second = $this->uri->segment(2);
    $third = $this->uri->segment(3);
    $fourth = $this->uri->segment(4);
      switch ($second) {
        case 'home':
          $data = array('橫幅管理'=>"/admin/$second");
          if($type == 'create'){
            $data['新增橫幅'] = "$all";
          }
          if($type == 'update'){
            $data['修改橫幅'] = "/admin/$second/update_banner/$fourth";
            if($third == 'update_image'){
              $data['更新橫幅圖片'] = "$all";
            }
          }
          break;
        case 'about':
          $data = array('關於我們管理'=>"/admin/$second");
          if($type == 'create'){
            $data['新增關於我們'] = "$all";
          }
          if($type == 'update'){
            $data['修改關於我們'] = "$all";
          }
          break;
        case 'news':
          if($third == 'page'){
            $data = array('新聞管理'=>"$all");
          }else{
            $data = array('新聞管理'=>"/admin/$second");
          }
          if($type == 'create'){
            $data['新增新聞'] = "$all";
          }
          if($type == 'update'){
            $data['修改新聞'] = "$all";
          }
          if($type == 'search'){
            $data['查詢結果'] = "$all";
          }
          break;
        case 'product':
          if($third == 'page'){
            $data = array('產品管理'=>"$all");
          }else{
            $data = array('產品管理'=>"/admin/$second");
          }
          if($type == 'create'){
            $data['新增產品'] = "$all";
          }
          if($type == 'update'){
            $data['修改產品'] = "/admin/$second/update/$fourth";
            if($third == 'update_image'){
              $data['更新產品圖片'] = "$all";
            }
          }
          if($type == 'search'){
            $data['查詢結果'] = "$all";
          }
          break;
        case 'product_type':
          $data = array('產品分類管理'=>"/admin/$second");
          if($type == 'create'){
            $data['新增產品分類'] = "$all";
          }
          if($type == 'update'){
            $data['修改產品分類'] = "$all";
          }
          break;
        case 'contact':
          if($third == 'page'){
            $data = array('聯絡我們管理'=>"$all");
          }else{
            $data = array('聯絡我們管理'=>"/admin/$second");
          }
          if($type == 'view'){
            $data['查看留言'] = "$all";
          }
          if($type == 'search'){
            $data['查詢結果'] = "$all";
          }
          break;
        case 'user':
          $data = array('帳號管理'=>"/admin/$second");
          if($type == 'create'){
            $data['新增帳號'] = "$all";
          }
          if($type == 'update'){
            $data['修改帳號'] = "$all";
          }
          break;
        default:
          $data = array('其他'=>"/admin/$second",);
        break;
      }
    return $data;
  }



}


class Public_Controller extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
  }
}
