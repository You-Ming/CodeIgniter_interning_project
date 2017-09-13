<?php //ajax controller
class Ajax extends Public_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('contact_model');
                $this->load->model('signin_model');

        }

        public function contact()
        {//聯絡我們
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('recaptcha');
            $this->form_validation->set_rules('guestName', 'guestName', 'required');
            $this->form_validation->set_rules('guestEmail', 'guestEmail', 'required');
            $this->form_validation->set_rules('guestTitle', 'guestTitle', 'required');
            $this->form_validation->set_rules('guestContent', 'guestContent', 'required');

            $captcha_answer = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($captcha_answer);

            if($response['success']){
              if($_POST['guestEmail']!=null  && $_POST['guestName']!=null && $_POST['guestContent']!=null){
                $data = array(
                    'guestName' => $this->input->post('guestName'),
                    'guestEmail' => $this->input->post('guestEmail'),
                    'guestTitle' => $this->input->post('guestTitle'),
                    'guestContent' => $this->input->post('guestContent'),
                    'contactTime' => date("Y:m:d H:i:s",time())
                );
                  if($this->contact_model->create($data)){
                    echo "感謝您的留言!";
                  }
                  else{
                    echo "留言失敗!";
                  }
              }
              else {
                  echo"請輸入姓名、Email及內容!";
              }
            }
            else{
              var_dump($response);
              echo "驗證失敗";
            }


        }

        public function signin()
        {//登入
            $this->load->library('session');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('password', 'password', 'required');

            $data['username'] = $this->signin_model->read_username($_POST['username']);
            foreach ($data['username'] as $user){
              $state = $user['adminState'];
              $name = $user['adminName'];
              $username = $user['adminUsername'];
              $password = $user['adminPassword'];
            }

            if($state != 1 || $state==null){
                echo "notfound";
            }
            else{
                if($_POST['username']!=null && $_POST['password']!=null && $password == $_POST['password']){
                    $user = array('name' => $name,'username' => $username,'password' => $password,'is_logged_in' => TRUE);
                    $this->session->set_userdata($user);
                    echo "success";
                }
                else if($_POST['username']==null || $_POST['password']==null) {
                    echo "請輸入帳號及密碼";
                }
                else if ($_POST['username']!=null && $_POST['password']!=null && $password!= $_POST['password']) {
                    echo "passwordError";
                }
                else {
                    echo "error";
                }
            }
        }
}
