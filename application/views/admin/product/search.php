<script>
$(function(){
  $("#txt_search_product").keypress(function(){
    var key = event.keyCode;
    if(key == 13){
      $("#btn_search_product").click();
    }
  })
});

</script>

            <div id='admin_product'>
              <h3>產品管理</h3>
              <div class="form-group">
                <div class="input-group search-group">
                  <input type="text" class="form-control input-search" id="txt_search_product" placeholder="請輸入關鍵字">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-default image-preview-input" id="btn_search_product">
                      <span class="glyphicon glyphicon-search"></span>
                    </button>
                  </span>
                </div>
              </div><br>
              <h4>查詢 「<?php echo $search?>」 的結果如下</h4><br>

              <table id='tb_admin_product' class="table table-bordered">
                <tr>
                  <th width="30%">產品名稱</th>
                  <th width="30%">產品分類</th>
                  <th width="20%">產品圖片</th>
                  <th width="20%">修改/刪除</th>
                </tr>
<?php foreach ($admin_product as $product): ?>
                <tr>
                  <td><?php echo $product['productName']?></td>
                  <td><?php echo $product['productType']?></td>
                  <td><img src="/uploads/images/product/<?php echo $product['productImgName']?>" class="img_admin_product"></td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='/admin/product/update/<?php echo $product['productName']?>'"><span class="glyphicon glyphicon-pencil"></span> <span class="btn_admin">修改</span></button>
                    <button class="btn btn-danger btn-sm" data-toggle="confirmation_product" data-title="確定要刪除嗎?" data-id="<?php echo $product['productID']?>" data-name="<?php echo $product['productImgName']?>" data-singleton="true">
                    <span class="glyphicon glyphicon-remove"></span> <span class="btn_admin">刪除</span>
                    </button>
                  </td>
                </tr>
<?php endforeach ?>
              </table>
              <div class="admin_page_link" align="center">
                <ul class="pagination">
<?php echo $link ?>
                </ul>
              </div>
              <div align="center">
                <button type="button" class="btn btn-primary" onclick="window.location.href='/admin/product'">返回產品列表</button>
              </div>
            </div>
