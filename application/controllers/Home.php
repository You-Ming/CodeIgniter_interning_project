<?php //home controller
class Home extends Public_Controller {

    public function __construct() {
          parent::__construct();
          $this->load->model('home_model');
          $this->load->model('news_model');
          $this->load->model('product_model');
    }

    public function view($page = 'home')
    {
      if ( ! file_exists(APPPATH.'views/'.$page.'/index.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Home'; // Capitalize the first letter
        $data['homenews'] = $this->news_model->read_news(3,0);//取得新消息
        $data['homebanner'] = $this->home_model->read_banner();//取得橫幅
        $data['bannernum'] = $this->home_model->banner_rows();//取得banner數量
        $data['homeproduct'] = $this->product_model->read_product(4,0);//取得最新產品

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function banner($bannerID = NULL) //取得banner圖片
    {
        $data['banner'] = $this->home_model->read_by_id($bannerID);

        if(empty($data['banner'])){
            show_404();
        }
        $this->load->view('home/banner',$data);
    }
}
