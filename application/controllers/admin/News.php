<?php //admin news controller
class News extends Admin_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('admin/news_model');
          $this->load->helper('form');
          $this->load->library('form_validation');
    }

    public function index($set = NULL)
    {
        $data['navbar'] = $this->breadcrumb();
        $base_url = 'https://interning-project1-xxx4830.c9users.io/admin/news/page/';
        $total_rows = $this->news_model->news_rows();//新聞總數
        $per_page = 10;
        $data['link'] = $this->page_link($base_url,$total_rows,$per_page);
        $data['admin_news'] = $this->news_model->read_news($per_page,$set);//取得新聞列表($set:第幾筆新聞)

        $data['title'] = 'Admin - News';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/news/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function create()
    {
        $data['navbar'] = $this->breadcrumb('create');
        $data['title'] = 'Admin - News Create';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/news/create');
        $this->load->view('admin/templates/footer');
    }

    public function update($id = NULL)
    {
        $data['navbar'] = $this->breadcrumb('update');
        $data['title'] = 'Admin - News Update';
        $data['admin_news'] = $this->news_model->read_by_id($id);
        if(empty($data['admin_news'])){
          show_404();
        }

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/news/update',$data);
        $this->load->view('admin/templates/footer');
    }

    public function search($set = NULL)
    {
        $data['navbar'] = $this->breadcrumb('search');
        $data['title'] = 'Admin - News Search';
        $q = $this->input->get('q');
        $base_url = 'https://interning-project1-xxx4830.c9users.io/admin/news/search/page/';
        $total_rows = $this->news_model->news_search_rows($q);//新聞搜尋總數
        $per_page = 10;
        $data['link'] = $this->page_link($base_url,$total_rows,$per_page,'?q='.$q);
        $data['admin_news'] = $this->news_model->read_news_search($per_page,$set,$q);//取得新聞列表($set:第幾筆新聞)

        if(!isset($q)){
            show_404();
        }

        if($q != '' && $total_rows>0){
          $data['search'] = $q;
          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/news/search',$data);
          $this->load->view('admin/templates/footer');
        }
        else{
          $data['notfound'] = $q;
          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/news/notfound',$data);
          $this->load->view('admin/templates/footer');
        }

    }


}
