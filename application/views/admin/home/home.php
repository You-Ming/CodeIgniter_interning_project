
            <div id='admin_banner'>
              <h3>橫幅管理</h3>
              <table id='tb_admin_banner' class="table table-bordered">
                <tr>
                  <th width="39%">橫幅名稱</th>
                  <th width="39%">橫幅圖片</th>
                  <th width="22%">修改/刪除</th>
                </tr>
<?php foreach ($admin_banner as $banner): ?>
                <tr>
                  <td><?php echo $banner['bannerName']?></td>
                  <td><img src="/uploads/images/banner/<?php echo $banner['bannerImgName'] ?>" class="img_admin_banner"></td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='/admin/home/update_banner/<?php echo $banner['bannerID']?>'"><span class="glyphicon glyphicon-pencil"></span> <span class="btn_admin">修改</span></button>
                    <button class="btn btn-danger btn-sm" data-toggle="confirmation_banner" data-title="確定要刪除嗎?" data-id="<?php echo $banner['bannerID']?>" data-name="<?php echo $banner['bannerImgName']?>" data-singleton="true">
                    <span class="glyphicon glyphicon-remove"></span> <span class="btn_admin">刪除</span>
                    </button>
                  </td>
                </tr>
<?php endforeach ?>
              </table>
              <button type="button" class="btn btn-primary" id="btn_creat_banner" onclick="window.location.href='/admin/home/create'">新增</button>
            </div>
