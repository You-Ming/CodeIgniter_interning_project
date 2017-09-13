<?php
class Home extends CI_Controller {

    public function __construct() {
          patent::__construct();
    }

    public function index() {
      if ( ! file_exists(APPPATH.'views/home/index.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = 'Home'; // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer', $data);
    }
}
