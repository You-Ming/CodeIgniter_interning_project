<?php //admin product controller
class Product extends Admin_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('admin/product_model');
          $this->load->model('admin/producttype_model');
          $this->load->helper('form');
          $this->load->library('form_validation');
    }

    public function index($set = NULL)
    {//產品管理
        $data['navbar'] = $this->breadcrumb();
        $base_url = 'https://interning-project1-xxx4830.c9users.io/admin/product/page/';
        $total_rows = $this->product_model->product_rows();//產品總數
        $per_page = 10;
        $data['link'] = $this->page_link($base_url,$total_rows,$per_page);
        $data['admin_product'] = $this->product_model->read_product($per_page,$set);//每頁顯示的產品資料

        $data['title'] = 'Admin - Product';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/index',$data);
        $this->load->view('admin/templates/footer');
    }

    public function type()
    {//產品分類管理
        $data['navbar'] = $this->breadcrumb();
        $data['admin_productType'] = $this->producttype_model->read();//取得產品分類資料
        $data['title'] = 'Admin - Product type';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/type');
        $this->load->view('admin/templates/footer');
    }

    public function do_upload()
    {
        $config['upload_path']      = 'uploads/images/product';
        $config['allowed_types']    = 'gif|jpg|png';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('file_productImg')){
          $data['error_string'] = '上傳失敗: '.$this->upload->display_errors('','');
          $data['status'] = FALSE;
          echo json_encode($data);
          exit();
        }
        else{
          return $this->upload->data('file_name');
        }
    }

    public function create()
    {
        $data['navbar'] = $this->breadcrumb('create');
        $data['title'] = 'Admin - Product Create';
        $data['admin_type'] = $this->producttype_model->read();
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/create',$data);
        $this->load->view('admin/templates/footer');
    }

    public function set_product()
    {//ajax新增產品
        $name = $_POST['productName'];
        $type = $_POST['productType'];
        $spec = $_POST['productSpecification'];
        $desc = $_POST['productDescription'];

        $data['product'] = $this->product_model->read_product_name($name);

        if(empty($data['product']) && $name!=NULL && $type!= NULL){
            $upload = $this->do_upload();
            $data = array(
              'productName' => $name,
              'productImgName' => $upload,
              'productType' => $type,
              'productSpecification' => $spec,
              'productDescription' => $desc
            );

            if($this->product_model->create($data)){
              $data['data'] = "success";
            }
            else{
              $data['data'] = "error";
              unlink("uploads/images/product/".$upload);
            }
        }else if($name == NULL){
          $data['data'] = "empty";
        }else if(!empty($data['product'])){
          $data['data'] = "repeat";
        }else if($type == NULL){
          $data['data'] = "typeEmpty";
        }else{
          $data['data'] = "error";
        }
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    public function create_type()
    {
        $data['navbar'] = $this->breadcrumb('create');
        $data['title'] = 'Admin - Product type Create';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/create_type');
        $this->load->view('admin/templates/footer');
    }

    public function update($name = NULL)
    {
        $data['navbar'] = $this->breadcrumb('update');
        $name = urldecode($name);
        $data['title'] = 'Admin - Product Update';
        $data['admin_product'] = $this->product_model->read_product_name($name);
        $data['admin_product_spec'] = json_decode($data['admin_product']['productSpecification']);
        $data['admin_type'] = $this->producttype_model->read();
        if(empty($data['admin_product'])){
          show_404();
        }

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/update',$data);
        $this->load->view('admin/templates/footer');
    }

    public function update_image($name = NULL)
    {
        $data['navbar'] = $this->breadcrumb('update');
        $name = urldecode($name);
        $data['title'] = 'Admin - Product Image Update';
        $data['admin_product'] = $this->product_model->read_product_name($name);
        $data['error'] = ' ';
        if(empty($data['admin_product'])){
          show_404();
        }

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/update_img',$data);
        $this->load->view('admin/templates/footer');

    }

    public function update_upload($name = NULL)
    {
        $name = urldecode($name);
        $data['admin_product'] = $this->product_model->read_product_name($name);
        $oldfilename = $data['admin_product']['productImgName'];
        if(empty($data['admin_product'])){
          show_404();
        }

        $config['upload_path']      = 'uploads/images/product';
        $config['allowed_types']    = 'gif|jpg|png';

        $this->load->library('upload',$config);

        if (!$this->upload->do_upload('file_productImg_update')){
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Admin - Product Image Update Upload Error";
            $this->load->view('admin/templates/header',$data);
            $this->load->view('admin/templates/nav');
            $this->load->view('admin/product/update_img',$data);
            $this->load->view('admin/templates/footer');
        }
        else{
            $data['upload_data'] = $this->upload->data();
            $data['filename'] = $data['upload_data']['file_name'];
            $data1 = array('productImgName' => $data['filename']);
            $where = array('productName' => $name);
            if($this->product_model->update($data1,$where)){
              unlink('uploads/images/product/'.$oldfilename);
              redirect('/admin/product/update/'.$name);
            }
            else{
              redirect('/admin/product/update_image/'.$name);
            }
        }
    }

    public function update_type($name = NULL)
    {
        $data['navbar'] = $this->breadcrumb('update');
        $name = urldecode($name);
        $data['title'] = 'Admin - Product type Update';
        $data['admin_productType'] = $this->producttype_model->read_productType($name);
        if(empty($data['admin_productType'])){
          show_404();
        }

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/templates/nav');
        $this->load->view('admin/product/update_type',$data);
        $this->load->view('admin/templates/footer');
    }

    public function search($set = NULL)
    {
        $data['navbar'] = $this->breadcrumb('search');
        $data['title'] = 'Admin - Product Search';
        $q = $this->input->get('q');
        $base_url = 'https://interning-project1-xxx4830.c9users.io/admin/product/search/page/';
        $total_rows = $this->product_model->product_search_rows($q);//產品搜尋總數
        $per_page = 10;
        $data['link'] = $this->page_link($base_url,$total_rows,$per_page,'?q='.$q);
        $data['admin_product'] = $this->product_model->read_product_search($per_page,$set,$q);//取得產品列表($set:第幾筆新聞)

        if(!isset($q)){
            show_404();
        }

        if($q != '' && $total_rows>0){
          $data['search'] = $q;
          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/product/search',$data);
          $this->load->view('admin/templates/footer');
        }
        else{
          $data['notfound'] = $q;
          $this->load->view('admin/templates/header',$data);
          $this->load->view('admin/templates/nav');
          $this->load->view('admin/product/notfound',$data);
          $this->load->view('admin/templates/footer');
        }
    }
    public function test()
    {
      $data['title'] = 'Admin - Product test';

      $this->load->view('admin/templates/header',$data);
      $this->load->view('admin/templates/nav');
      $this->load->view('admin/product/test');
      $this->load->view('admin/templates/footer');
    }

    public function test2()
    {
      $data['title'] = 'Admin - Product test2';
      $keys = $this->input->post('txt_product_spec_key');
      $values = $this->input->post('txt_product_spec_value');
      $spec = array();
      foreach($keys as $key=>$value){
        $spec[$value] = $values[$key];
      }

      echo json_encode($spec);

    }


}
