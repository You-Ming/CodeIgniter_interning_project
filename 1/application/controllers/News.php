<?php //news controller
class News extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('news_model');
        }

        public function index($set = NULL)//news index
        {
            $rows = $this->news_model->get_news_rows();//新聞總數
            $this->load->library('pagination');//include pagination library

            $config['base_url'] = 'http://project1.youming.farwin.tw/news/page/';
            $config['total_rows'] = $rows;
            $config['per_page'] = 5;//每頁筆數

            $this->pagination->initialize($config);

            $data['link'] = $this->pagination->create_links();
            $data['news'] = $this->news_model->page_news($set);//取得新聞列表($set:第幾筆新聞)
            $data['title'] = 'News';

            $this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($newsID = NULL)//news content
        {
            $data['news_item'] = $this->news_model->get_news($newsID);//取得新聞內容

            if (empty($data['news_item']))
            {
                    show_404();
            }

            $data['title'] = 'News - '.$data['news_item']['newsTitle'];

            $this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            $this->load->view('templates/footer');
        }

}
