<?php //Admin about controller
class About extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/about_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['navbar'] = $this->breadcrumb();
        $data['title'] = 'Admin - About';
        $data['admin_about'] = $this->about_model->read();//取得關於我們資料

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/about/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function create()
    {
        $data['navbar'] = $this->breadcrumb('create');
        $data['title'] = 'Admin - About Create';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/about/create');
        $this->load->view('admin/templates/footer');
    }

    public function update($title = NULL)
    {
      $data['navbar'] = $this->breadcrumb('update');
      $data['title'] = 'Admin - About Update';
      $data['admin_about'] = $this->about_model->read_about_title(urldecode($title));
      if(empty($data['admin_about'])){
        show_404();
      }

      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/nav');
      $this->load->view('admin/about/update',$data);
      $this->load->view('admin/templates/footer');
    }

}
