<?php //admin ajax controller
class Ajax extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/about_model');
        $this->load->model('admin/banner_model');
        $this->load->model('admin/contact_model');
        $this->load->model('admin/news_model');
        $this->load->model('admin/product_model');
        $this->load->model('admin/producttype_model');
        $this->load->model('admin/user_model');
    }

    public function delete_about()
    {//刪除關於我們
        $title = $_POST['aboutTitle'];

        if($title != NULL){
          $where = array('aboutTitle' => $title);
          if($this->about_model->delete($where)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else{
          echo "error";
        }

    }

    public function delete_contact()
    {//刪除留言內容
        $id = $_POST['guestID'];

        if($id != NULL){
          if($this->contact_model->delete_by_id($id)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else{
          echo "error";
        }

    }

    public function delete_banner()
    {//刪除橫幅
        $id = $_POST['bannerID'];
        $name = $_POST['bannerImgName'];
        if($id != NULL && $name!= NULL){
          if($this->banner_model->delete_by_id($id)){
            unlink("uploads/images/banner/".$name);
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else{
          echo "error";
        }
    }

    public function delete_news()
    {//刪除新聞
        $id = $_POST['newsID'];

        if($id != NULL){
          if($this->news_model->delete_by_id($id)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else{
          echo "error";
        }
    }

    public function delete_product()
    {//刪除產品
        $id = $_POST['productID'];
        $filename = $_POST['productImgName'];

        if ($id != NULL) {
          if($this->product_model->delete_by_id($id)){
            unlink('uploads/images/product/'.$filename);
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else {
          echo "error";
        }
    }

    public function delete_productType()
    {//刪除產品分類
        $name = $_POST['typeName'];

        if ($name != NULL) {
          $where = array('typeName' => $name);
          $filename = $this->product_model->read_product_type($name);
          if($this->producttype_model->delete($where)){
            echo "success";
            if(!empty($filename))
            {
              foreach ($filename as $product) {
                unlink('uploads/images/product/'.$product['productImgName']);
              }
            }
          }
          else{
            echo "error";
          }
        }
        else {
          echo "error";
        }
    }

    public function delete_user()
    {//刪除管理者
        $username = $_POST['adminUsername'];
        $password = $_POST['adminPassword'];
        $data['admin'] = $this->user_model->read_username($username);

        if ($username != NULL && $password != NULL && $data['admin']['adminPassword'] == sha1($password)) {
            $where = array('adminUsername' => $username);
            if($this->user_model->delete($where)){
              echo "success";
            }
            else{
              echo "error";
            }
        }
        else if($username != NULL && $password != NULL && $data['admin']['adminPassword'] != sha1($password)) {
            echo "passwordError";
        }
        else if($username == NULL || $password == NULL) {
            echo "empty";
        }
        else {
            echo "error";
        }
    }

    public function update_banner()
    {//更新橫幅
      $id = $_POST['bannerID'];
      $oldname = $_POST['bannerOldname'];
      $name = $_POST['bannerName'];
      $title = $_POST['bannerTitle'];

      if($oldname != $name){
        $data['banner'] = $this->banner_model->read_banner_name($name);
      }
      if(empty($data['banner']) && $name!=NULL){
        $data = array(
          'bannerName' => $name,
          'bannerTitle' => $this->escape_string($title)
        );
        if($this->banner_model->update_by_id($data,$id)){
          echo "success";
        }
        else{
          echo "error";
        }
      }else if($name == NULL){
        echo "empty";
      }else if(!empty($data['banner'])){
        echo "repeat";
      }else{
        echo "error";
      }

    }

    public function set_about()
    {//新增關於我們
        $title = $_POST['aboutTitle'];
        $content = $_POST['aboutContent'];
        $data['about'] = $this->about_model->read_about_title($title);

        if(empty($data['about']) && $title != NULL) {
          $data = array(
            'aboutTitle' => $title,
            'aboutContent' => $content,
          );
          if($this->about_model->create($data)){
            echo "success";
          }
          else {
            echo "error";
          }
        }
        else if($title == NULL) {
          echo "empty";
        }
        else if(!empty($data['about'])) {
          echo "repeat";
        }
        else {
          echo "error";
        }
    }

    public function update_about()
    {//更新關於我們
        $oldtitle = $_POST['oldtitle'];
        $title = $_POST['aboutTitle'];
        $content = $_POST['aboutContent'];
        if($oldtitle != $title){
          $data['about'] = $this->about_model->read_about_title($title);
        }
        if(empty($data['about']) && $title != NULL) {
          $data = array('aboutTitle' => $title,'aboutContent' => $content);
          $where = array('aboutTitle' => $oldtitle);
          if($this->about_model->update($data,$where)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else if($title == NULL) {
          echo "empty";
        }
        else if(!empty($data['about'])) {
          echo "repeat";
        }
        else {
          echo "error";
        }
    }

    public function set_news()
    {//新增新聞
        $title = $this->escape_string($_POST['newsTitle']);
        $content = $_POST['newsContent'];
        $time = $_POST['newsTime'];
        //$data['news'] = $this->news_model->get_news($title);

        if($title != NULL) {
          $data = array(
            'newsTitle' => $title,
            'newsContent' => $content,
            'newsTime' => date("Y:m:d H:i:s",strtotime($time)),
          );
          if($this->news_model->create($data)){
            echo "success";
          }else{
            echo "error";
          }
        }
        else if($title == NULL) {
          echo "empty";
        }
        /*else if(!empty($data['news'])) {
          echo "repeat";
        }*/
        else {
          echo "error";
        }
    }

    public function update_news()
    {//更新新聞
        $id = $_POST['newsID'];
        $title = $_POST['newsTitle'];
        $content = $_POST['newsContent'];
        $time = $_POST['newsTime'];

        if($title != NULL && $time !=NULL) {
          $data = array(
            'newsTitle' => $title,
            'newsContent' => $content,
            'newsTime' => date("Y:m:d H:i:s",strtotime($time)),
          );
          if($this->news_model->update_by_id($data,$id)){
            echo "success";
          }
          else{
            echo "error";
          }
        }
        else if($title == NULL || $time == NULL) {
          echo "empty";
        }
        else {
          echo "error";
        }
    }

    public function set_user()
    {//新增管理者
        $name = $_POST['adminName'];
        $username = $_POST['adminUsername'];
        $password = $_POST['adminPassword'];
        $password2 = $_POST['adminPassword2'];

        $data['user'] = $this->user_model->read_username($username);

        if(empty($data['user']) && $name != NULL && $username != NULL && $password != NULL && $password == $password2){
          $data = array(
            'adminName' => $name,
            'adminUsername' => $username,
            'adminPassword' => $password,
          );
          if($this->user_model->create($data)){
            echo "success";
          }else{
            echo "error";
          }
        }else if($name == NULL || $username == NULL || $password == NULL){
          echo "empty";
        }else if(!empty($data['user'])){
          echo "repeat";
        }else if($password != $password2){
          echo "passwordError";
        }else{
          echo "error";
        }
    }

    public function update_user()
    {//更新管理者
        $name = $_POST['adminName'];
        $username = $_POST['adminUsername'];
        $password = $_POST['adminPassword'];
        $password2 = $_POST['adminPassword2'];

        if($name != NULL && $username != NULL && $password != NULL && $password == $password2){
          $data = array('adminName' => $name,'adminPassword' => $password,);
          $where = array('adminUsername' => $username);
          if($this->user_model->update($data,$where)){
            echo "success";
          }else{
            echo "error";
          }
        }else if($name == NULL || $username == NULL || $password == NULL){
          echo "empty";
        }else if($password != $password2){
          echo "passwordError";
        }else{
          echo "error";
        }
    }

    public function set_productType()
    {//新增產品分類
        $name = $_POST['typeName'];
        $data['type'] = $this->producttype_model->read_productType($name);

        if(empty($data['type']) && $name != NULL){
          $data = array(
              'typeName' => $name,
          );
          if($this->producttype_model->create($data)){
            echo "success";
          }else{
            echo "error";
          }
        }else if($name == NULL){
          echo "empty";
        }else if(!empty($data['type'])){
          echo "repeat";
        }else{
          echo "error";
        }
    }

    public function update_productType()
    {//更新產品分類
        $newname = $_POST['typeName'];
        $oldname = $_POST['oldName'];
        if($newname != $oldname){
          $data['type'] = $this->producttype_model->read_productType($newname);
        }
        if(empty($data['type']) && $newname != NULL){
          $data = array('typeName' => $newname);
          $where = array('typeName' => $oldname);
          if($this->producttype_model->update($data,$where)){
            echo "success";
          }else{
            echo "error";
          }
        }else if($newname == NULL){
          echo "empty";
        }else if(!empty($data['type'])){
          echo "repeat";
        }else{
          echo "error";
        }

    }


    public function update_product()
    {//更新產品
        $id = $_POST['productID'];
        $oldname = $_POST['productOldname'];
        $name = $_POST['productName'];
        $type = $_POST['productType'];
        $spec = $_POST['productSpecification'];
        $desc = $_POST['productDescription'];

        if($oldname != $name){
          $data['product'] = $this->product_model->read_product_name($name);
        }
        if(empty($data['product']) && $name!=NULL && $type!= NULL){
          $data = array(
            'productName' => $name,
            'productType' => $type,
            'productSpecification' => $spec,
            'productDescription' => $desc
          );
          if($this->product_model->update_by_id($data,$id)){
            echo "success";
          }
          else{
            echo "error";
          }
        }else if($name == NULL){
          echo "empty";
        }else if(!empty($data['product'])){
          echo "repeat";
        }else if($type == NULL){
          echo "typeEmpty";
        }else{
          echo "error";
        }
    }

}
