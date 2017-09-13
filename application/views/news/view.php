<script>
$(function(){
  var newsPath = document.referrer;
  var newsPathArray = document.referrer.split('/');
  if(newsPathArray[3] == "news"){
    $("#news_nav_list_link").attr("href",""+newsPath);
    $("#btn_back_news_list").attr("onclick","window.location.href='"+newsPath+"'");
  }else{
    $("#news_nav_list_link").attr("href","/news");
    $("#btn_back_news_list").attr("onclick","window.location.href='/news'");
  }
});
</script>
    <div id="news_wrap" class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
          <ol class="breadcrumb nav_list" id="news_content_nav_list">
            <li><a href="/"><span class="glyphicon glyphicon-home"></span> 首頁</a></li>
            <li><a id="news_nav_list_link">新聞</a></li>
            <li class="active"><?php echo "$news_item[newsTitle]"?></li>

          </ol>
        </div>
      </div>

      <div id="news_content_wrap" class="container text_style">
          <div id="news_content">
              <h1><?php echo "$news_item[newsTitle]"?></h1>
              <p><?php echo "$news_item[newsTime]"?></p>
              <p><?php echo "$news_item[newsContent]"?></p></br>
          </div>
          <div id="news_content_btn">
              <input type="button" class="btn btn-primary btn-sm" value="返回新聞列表" id="btn_back_news_list" />
              <input type="button" class="btn btn-primary btn-sm" value="返回主頁面" onClick="window.location.href='/'"/>
          </div>
      </div>
    </div>
