          <div id="product_list_wrap" class="col-xs-12 col-md-10 col-sm-9">
            <h2><?php echo $listname;?></h2>
            <div id="product_list" class="row">
              <ul class="nav">
<?php foreach ($product as $productItem): ?>
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                  <li id='li_product'>
                    <a href='/product/<?php echo $productItem['productType']?>/<?php echo $productItem['productName']?>'><?php echo $productItem['productName'] ?></a><br>
                    <a href='/product/<?php echo $productItem['productType']?>/<?php echo $productItem['productName']?>'>
                    <img class="img_product" src='/uploads/images/product/<?php echo $productItem['productImgName']?>' width="150px" height="120px">
                    </a>
                  </li>
                </div>
<?php endforeach?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end of product list -->
