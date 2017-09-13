          <div id="product_view_wrap" class="col-md-10 col-sm-9">
            <div id="product_view">
              <h1><?php echo $product['productName']?></h1>
              <div class="row">
                <div class="col-sm-7 col-md-5">
                  <img class="img_product_view" src='/uploads/images/product/<?php echo $product['productImgName'] ?>'>
                </div>

                <div class="col-sm-5">
                  <h4>產品規格:</h4>
<?php foreach ($product_spec as $key => $value): ?>
                  <p><?php echo $key?> : <?php echo $value?></p>
<?php endforeach ?>
                </div>

                <div class="col-xs-8">
                  <h4>產品描述:</h4>
                  <p><?php echo $product['productDescription']?></p>
                </div>
              </div><br>
              <input type='button' class="btn btn-primary btn-sm" onclick="history.back()" value='返回'>
            </div>
          </div>
        </div>
      </div>
