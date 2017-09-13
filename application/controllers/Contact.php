<?php //contact controller
class Contact extends Public_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('contact_model');
        }

        public function index()//contact index
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('recaptcha');
            $data['title'] = 'Contact';

            $data['recaptcha'] = $this->recaptcha->render();

            $this->load->view('templates/header',$data);
            $this->load->view('contact/index',$data);
            $this->load->view('templates/footer');

        }

        public function create()
        {

        }
}
