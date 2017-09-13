<?php //admin contact controller
class Contact extends Admin_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('admin/contact_model');
    }

    public function index($set = NULL)
    {
        $data['navbar'] = $this->breadcrumb();
        $base_url = 'https://interning-project1-xxx4830.c9users.io/admin/contact/page/';
        $total_rows = $this->contact_model->contact_rows();//取得留言總筆數
        $per_page = 10;
        $data['link'] = $this->page_link($base_url,$total_rows,$per_page);
        $data['admin_contact'] = $this->contact_model->read_contact($per_page,$set);//每頁顯示的留言資料
        $data['title'] = 'Admin - Contact';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/contact/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function view($id = NULL)
    {
        $data['navbar'] = $this->breadcrumb('view');
        $data['title'] = 'Admin - Contact Content';
        $data['contact_content'] = $this->contact_model->read_by_id($id);
        if(empty($data['contact_content'])){
          show_404();
        }

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/contact/view',$data);
        $this->load->view('admin/templates/footer');
    }

    public function search($set = NULL)
    {
        $data['navbar'] = $this->breadcrumb('search');
        $data['title'] = 'Admin - Contact Search';
        $q = $this->input->get('q');
        $base_url = 'https://interning-project1-xxx4830.c9users.io/admin/contact/search/page/';
        $total_rows = $this->contact_model->contact_search_rows($q);
        $per_page = 10;
        $data['link'] = $this->page_link($base_url,$total_rows,$per_page,'?q='.$q);
        $data['admin_contact'] = $this->contact_model->read_contact_search($per_page,$set,$q);

        if(!isset($q)){
          show_404();
        }

        if($q != '' && $total_rows>0){
          $data['search'] = $q;
          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/contact/search',$data);
          $this->load->view('admin/templates/footer');
        }else{
          $data['notfound'] = $q;
          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/contact/notfound',$data);
          $this->load->view('admin/templates/footer');
        }
    }



}
