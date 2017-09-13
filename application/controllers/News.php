<?php //news controller
class News extends Public_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->model('news_model');
        }

        public function index($set = NULL)//news index
        {
            $total_rows = $this->news_model->news_rows();//新聞總數
            $base_url = 'https://interning-project1-xxx4830.c9users.io/news/page/';
            $per_page = 5;
            $data['link'] = $this->page_link($base_url,$total_rows,$per_page);
            $data['news'] = $this->news_model->read_news($per_page,$set);//取得新聞列表($set:第幾筆新聞)
            $data['title'] = 'News';

            $this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
            $this->load->view('templates/footer');
        }

        public function view($newsID = NULL)//news content
        {
            $data['news_item'] = $this->news_model->read_by_id($newsID);//取得新聞內容

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
