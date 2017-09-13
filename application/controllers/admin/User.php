<?php //admin user controller
class User extends Admin_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('admin/user_model');
          $this->load->helper('form');
          $this->load->library('form_validation');
    }

    public function index()
    {
        $data['navbar'] = $this->breadcrumb();
        $data['admin_user'] = $this->user_model->read();//取得管理者資料
        $data['title'] = 'Admin - User';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/user/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function create()
    {
        $data['navbar'] = $this->breadcrumb('create');
        $data['title'] = 'Admin - User Create';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/user/create');
        $this->load->view('admin/templates/footer');

    }

    public function update($username = NULL)
    {
        $data['navbar'] = $this->breadcrumb('update');
        $data['title'] = 'Admin - User Update';
        $data['admin_user'] = $this->user_model->read_username($username);
        if(empty($data['admin_user'])){
          show_404();
        }

          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');

        if($this->session->username != $username && $this->session->username != 'admin'){
          $this->load->view('admin/user/modal');
        }else{
          $this->load->view('admin/user/update',$data);
        }

          $this->load->view('admin/templates/footer');
    }


}
