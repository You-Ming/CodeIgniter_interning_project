      
        <div id="admin_content_wrap" class="container-fluid navbar-default">
          <!-- admin nav -->
          <div class="row">
            <div id="admin_nav_wrap" class="siderbar col-md-2 col-sm-3">
                <div id="admin_nav_list" class=" collapse navbar-collapse">
                    <ul class="nav">
                        <li><a href="/admin/home">首頁橫幅</a></li>
                        <li><a href="/admin/about">關於我們</a></li>
                        <li><a href="/admin/news">新聞</a></li>
                        <li>
                          <a data-toggle="collapse" data-target="#sub_product" id="menu_product">產品
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" id="product_right_icon"></span>
                          </a>
                          <ul class="nav collapse" id="sub_product">
                            <li><a href="/admin/product">產品管理</a></li>
                            <li><a href="/admin/product_type">分類管理</a></li>
                          </ul>
                        </li>
                        <li><a href="/admin/contact">聯絡我們</a></li>
                        <li><a href="/admin/user">帳號</a></li>
                    </ul>
                </div>
            </div>
          <!-- end of nav -->
            <!-- 導覽列 -->
            <div class="col-md-10 col-sm-9">
              <ol class="breadcrumb nav_list" id="admin_nav_bar">
                <li><a href="/admin">首頁</a></li>
                <?php if(isset($navbar)){foreach($navbar as $nav => $val):?>
                <li><a href="<?php echo $val?>"><?php echo $nav?></a></li>
                <?php endforeach;}?>
              </ol>
            </div>
            <!-- 導覽列 End -->
            <div id="admin_content"  class="col-md-10 col-sm-9">
