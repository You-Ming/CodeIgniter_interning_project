<?php //about controller
class About extends Public_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('about_model');
        }

        public function index($title = NULL)//about index
        {
                $title = urldecode($title);
                $data['about'] = $this->about_model->read();//取得關於我們title
                $data['content'] = $this->about_model->get_about_content($title);//關於我們內容
                $data['title'] = 'About';
                $data['nav_about'] = $title;

                if(empty($data['content'])){
                  show_404();
                }

                if($title != NULL){
                  $data['title'] = 'About - '.$title;
                }

                $this->load->view('templates/header', $data);
                $this->load->view('about/index', $data);
                $this->load->view('templates/footer');
        }

}
