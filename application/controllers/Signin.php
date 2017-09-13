<?php //sign in controller
class Signin extends Public_Controller {

    public function __construct() {
          parent::__construct();
    }

    public function index()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->view('signin/index');
    }

}
