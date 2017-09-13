<?php //admin home controller
class Admin extends Admin_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('signin_model');
          $this->load->model('admin/banner_model');
          $this->load->helper('form');
    }

    public function index($page='index')
    {
        if ( ! file_exists(APPPATH.'/views/admin/home/'.$page.'.php'))
            {
                    // Whoops, we don't have a page for that!
                    show_404();
            }
        if ($page=='index') {
          $data['title'] = 'Admin';
        }
        else {
          $data['navbar'] = $this->breadcrumb();
          $data['title'] = 'Admin - Home';
        }
        $data['admin_banner'] = $this->banner_model->read_banner();//取得banner資料

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/home/'.$page,$data);
        $this->load->view('admin/templates/footer');
    }

    public function logout()
    {
        $this->load->library('session');
        $unset_user = array('name','username','password','is_logged_in');
        $this->session->unset_userdata($unset_user);//unset session

        $this->load->view('admin/templates/logout');
    }

    public function do_upload()
    {
        $config['upload_path']          = 'uploads/images/banner';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file_BannerImg'))
        {
            $data['error_string'] = '上傳失敗: '.$this->upload->display_errors('','');
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
        else
        {
            return $this->upload->data('file_name');
        }
    }

    public function create()
    {
      $data['navbar'] = $this->breadcrumb('create');
      $data['title'] = 'Admin - Banner Create';
      $data['error'] = ' ';
      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/nav');
      $this->load->view('admin/home/create',$data);
      $this->load->view('admin/templates/footer');
    }

    public function set_banner()
    {//ajax新增橫幅
      $name = $_POST['bannerName'];
      $title = $_POST['bannerTitle'];
      $data['banner'] = $this->banner_model->read_banner_name($name);

      if(empty($data['banner']) && $name != NULL){
        $filename = $this->do_upload();
        if($this->banner_model->set_banner($name,$title,$filename)){
          $data['data'] = "success";
        }else{
          $data['data'] = "error";
          unlink("uploads/images/banner/".$filename);
        }
      }
      else if($name = NULL){
        $data['data'] = "empty";
      }
      else if(!empty($data['banner'])){
        $data['data'] = "repeat";
      }
      else{
        $data['data'] = "error";
      }
      $data['status'] = TRUE;
      echo json_encode($data);
    }

    public function update_banner($id=NULL)
    {
        $data['navbar'] = $this->breadcrumb('update');
        $data['admin_banner'] = $this->banner_model->read_by_id($id);
        if(empty($data['admin_banner'])){
            show_404();
        }
        $data['title'] = 'Admin - Update banner';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/home/update',$data);
        $this->load->view('admin/templates/footer');
    }

    public function update_image($id=NULL)
    {
      $data['navbar'] = $this->breadcrumb('update');
      $data['admin_banner'] = $this->banner_model->read_by_id($id);
      if(empty($data['admin_banner'])){
          show_404();
      }
      $data['title'] = 'Admin - Banner Image Update';
      $data['error'] = ' ';

      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/nav');
      $this->load->view('admin/home/update_img',$data);
      $this->load->view('admin/templates/footer');
    }

    public function update_upload($id=NULL)
    {
        $data['bannerID'] = $this->banner_model->read_by_id($id);
        if(empty($data['bannerID'])){
            show_404();
        }

        $config['upload_path']          = 'uploads/images/banner';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file_bannerImg_update'))
        {
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Admin - Banner Image Update Upload Error";
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/home/update_img',$data);
            $this->load->view('admin/templates/footer');
        }
        else
        {
            $oldname = $data['bannerID']['bannerImgName'];
            $data['upload_data'] = $this->upload->data();
            $name = $data['upload_data']['file_name'];

            $data1 = array('bannerImgName' => $name);
            if($this->banner_model->update_by_id($data1,$id)){
              unlink("uploads/images/banner/".$oldname);//刪除舊資料
              redirect('/admin/home/update_banner/'.$id);
            }
            else{
              redirect('/admin/home/update_image/'.$id);
            }

        }
    }


}
