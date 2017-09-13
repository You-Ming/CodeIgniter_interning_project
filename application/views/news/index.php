        <div id="news_wrap" class="container-fluid" style="padding-bottom:20px">
          <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
              <ol class="breadcrumb nav_list" id="news_nav_list">
                <li><a href="/"><span class="glyphicon glyphicon-home"></span> 首頁</a></li>
                <li class="active">新聞</li>
              </ol>
            </div>
          </div>

          <div id="newsList" class="container text_style">
          <h1 id="lb_news">新聞</h1>
              <div id="newsListBox">
                  <table id="tb_newsList" class="table table-bordered">
                      <tr>
                      	<th width=75%>標題</th>
                          <th width=25%>時間</th>
                      </tr>

  <?php foreach ($news as $news_item): ?>
                      <tr>
                        <td><a href="/news/<?php echo $news_item['newsID'] ?>"><?php echo $news_item['newsTitle']?></a>
                        <td><?php echo $news_item['newsTime']?></td>
                      </tr>
  <?php endforeach ?>
                  </table>
              </div>
            <table border="0" align="center" id="tb_page" style="text-align:center;">
              <tr>
              	<td>
                  <ul class="pagination">
                  <?php echo $link ?>
                  </ul>
              	</td>
              </tr>
              <tr>
              	<td><a href="/">回首頁</a></td>
              </tr>
            </table>
          </div>
        </div>
