<?php //product controller
class Product extends Public_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('product_model');
          $this->load->model('producttype_model');
    }

    public function index($type = NULL)//產品清單
    {
        $type = urldecode($type);
        $data['product_type'] = $this->producttype_model->read();//product nav
        $data['product'] = $this->product_model->read_product_by_type($type);//分類的產品
        $data['type'] = $this->producttype_model->read_productType($type);//取得產品分類，檢查該分類是否存在
        $data['nav_type'] = $type;
        $data['nav_product'] = '';
        $data['title'] = 'Product';
        $data['listname'] = '產品清單';

        if($type != NULL){
          $data['title'] = 'Product - '.$type;
          $data['listname'] = $type;
        }

        if($type != NULL && empty($data['type'])){
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('product/list', $data);
        $this->load->view('templates/footer', $data);
    }

    /*public function product_img($productID = NULL) //取得product圖片
    {
        $data['product'] = $this->product_model->read_by_id($productID);

        if(empty($data['product'])){
            show_404();
        }
        $this->load->view('product/imgview',$data);
    }*/

    public function view($type = NULL,$name = NULL)//產品資訊
    {
        $type = urldecode($type);
        $name = urldecode($name);
        $data['product_type'] = $this->producttype_model->read();
        $data['product'] = $this->product_model->read_product_by_name($name);//取得產品
        $productType = $data['product']['productType'];

        if($type != $productType){
            show_404();
        }

        $data['nav_type'] =$type;
        $data['nav_product'] = $name;

        $data['product_spec'] = json_decode($data['product']['productSpecification']);

        $data['title'] = $type.' - '.$name;
        $this->load->view('templates/header', $data);
        $this->load->view('product/index', $data);
        $this->load->view('product/view', $data);
        $this->load->view('templates/footer', $data);

    }


}
