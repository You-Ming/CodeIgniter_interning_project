      <!-- product list -->
      <div id="product_wrap" class="container-fluid text_style">
        <div class="row">

          <div id="product_flip" class="visible-xs panel panel-default" aria-label="product flip">
            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
          </div>

          <div id="product_nav" class="col-md-2 col-sm-3 toggle_nav">
            <ul class="nav navbar-default">
              <li><a href='/product'>產品清單</a></li>

  <?php foreach ($product_type as $productItem): ?>

              <li><a href='/product/<?php echo $productItem['typeName'] ?>'><?php echo $productItem['typeName'] ?></a></li>

  <?php endforeach?>
            </ul>
          </div>

          <div class="col-md-10 col-sm-9">
            <ol class="breadcrumb nav_list" id="product_nav_list">
              <li><a href="/"><span class="glyphicon glyphicon-home"></span> 首頁</a></li>
              <li><a href="/product">產品</a></li>
              <?php echo $nav_type != NULL && $nav_product == NULL ? '<li class="active">'.$nav_type.'</li>':''?>
<?php echo $nav_product != NULL ? '<li><a href="/product/'.$nav_type.'">'.$nav_type.'</a></li>
              <li class="active">'.$nav_product.'</li>':''?>

            </ol>
          </div>
