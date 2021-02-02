<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
	
	$hdset = new Typecho_Widget_Helper_Form_Element_Textarea('hdset', NULL, NULL, _t('<h2 id="div-3">首页设置 Info</h2><hr>幻灯片设置'), _t('在这里填入幻灯片图片的设置格式'));
    $form->addInput($hdset);

   
    $adimg = new Typecho_Widget_Helper_Form_Element_Text('adimg', NULL, NULL, _t('<h2 id="div-3">广告设置 Info</h2><hr>列表(中间)广告图片'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($adimg);
    
    $soimgad = new Typecho_Widget_Helper_Form_Element_Text('soimgad', NULL, NULL, _t('搜索框广告'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($soimgad);

	$topadimg = new Typecho_Widget_Helper_Form_Element_Text('topadimg', NULL, NULL, _t('左边广告1图片'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($topadimg);

	$txtadimg = new Typecho_Widget_Helper_Form_Element_Text('txtadimg', NULL, NULL, _t('左边2广告图片'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($txtadimg);

	$rightad = new Typecho_Widget_Helper_Form_Element_Text('rightad', NULL, NULL, _t('右边1广告图片'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($rightad);
    
    $rightadsec = new Typecho_Widget_Helper_Form_Element_Text('rightadsec', NULL, NULL, _t('右边2广告图片'), _t('在这里填入你广告图片链接代码：&lt;a rel="nofollow" target="_blank" href=""&gt; &lt;img src="图片链接"&gt;  &lt;/a&gt;'));
    $form->addInput($rightadsec);

	$footerlist = new Typecho_Widget_Helper_Form_Element_Textarea('footerlist', NULL, NULL, _t('<h2 id="div-6">页脚设置 Info</h2><hr>底部自定义分类'), _t('一行一个链接，格式为：&lt;a rel="nofollow" target="_blank" href="//mrju.cn"&gt;MrJu&lt;/a&gt;'));
    $form->addInput($footerlist);
    
    $footernav = new Typecho_Widget_Helper_Form_Element_Textarea('footernav', NULL, NULL, _t('底部链接（友情链接）'), _t('一行一个链接，格式为：&lt;div class="ylink"&gt;&lt;a rel="nofollow" target="_blank" href="//mrju.cn"&gt;MrJu&lt;/a&gt;&lt;/div&gt;'));
    $form->addInput($footernav);
    
    $footercor = new Typecho_Widget_Helper_Form_Element_Textarea('footercor', NULL, NULL, _t('页脚版权设置'), _t('站点声明：本站转载作品版权归原作者及来源网站所有，原创内容作品版权归作者所有，任何内容转载、商业用途等均须联系原作者并注明来源'));
    $form->addInput($footercor);


//备份开始
$db = Typecho_Db::get();
$sjdq=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:s_blog'));
$ysj = $sjdq['value'];
if(isset($_POST['type']))
{ 
if($_POST["type"]=="备份模板数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:s_blogbf'))){
$update = $db->update('table.options')->rows(array('value'=>$ysj))->where('name = ?', 'theme:s_blogbf');
$updateRows= $db->query($update);
echo '<div class="tongzhi">备份已更新，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}else{
if($ysj){
     $insert = $db->insert('table.options')
    ->rows(array('name' => 'theme:s_blogbf','user' => '0','value' => $ysj));
     $insertId = $db->query($insert);
echo '<div class="tongzhi">备份完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}
}
}
if($_POST["type"]=="还原模板数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:s_blogbf'))){
$sjdub=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:s_blogbf'));
$bsj = $sjdub['value'];
$update = $db->update('table.options')->rows(array('value'=>$bsj))->where('name = ?', 'theme:s_blog');
$updateRows= $db->query($update);
echo '<div class="tongzhi">检测到模板备份数据，恢复完成，请等待自动刷新！如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2000);</script>
<?php
}else{
echo '<div class="tongzhi">没有模板备份数据，恢复不了哦！</div>';
}
}
if($_POST["type"]=="删除备份数据"){
if($db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'theme:s_blogbf'))){
$delete = $db->delete('table.options')->where ('name = ?', 'theme:s_blogbf');
$deletedRows = $db->query($delete);
echo '<div class="tongzhi">删除成功，请等待自动刷新，如果等不到请点击';
?>    
<a href="<?php Helper::options()->adminUrl('options-theme.php'); ?>">这里</a></div>
<script language="JavaScript">window.setTimeout("location=\'<?php Helper::options()->adminUrl('options-theme.php'); ?>\'", 2500);</script>
<?php
}else{
echo '<div class="tongzhi">不用删了！备份不存在！！！</div>';
}
}
    }
   /**
	 *  设置样式+面板
	 */	
	echo '<link rel="stylesheet" href="/usr/themes/s_blog/assets/css/setting.spimes.css"><link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:300|Noto+Serif+SC:300&display=swap" rel="stylesheet">';
	echo '<div class="miracles-pannel">
	<h1>S_blog 设置面板</h1>
    <hr>
   	  <form class="protected" action="?MiraclesBackup" method="post">
        <input type="submit" name="type" class="miracles-backup-button backup" value="备份模板数据" />&nbsp;&nbsp;
	    <input type="submit" name="type" class="miracles-backup-button recover" value="还原模板数据" />&nbsp;&nbsp;
	    <input type="submit" name="type" class="miracles-backup-button delete" value="删除备份数据" />
	  </form>
	</div>';
}

//后台编辑器添加功能
function themeFields($layout) {
    $img = new Typecho_Widget_Helper_Form_Element_Text('img', NULL, NULL, _t('自定义缩略图'), _t('在这里填入一个图片 URL 地址, 以添加显示本文的缩略图，留空则显示默认缩略图'));
    $img->input->setAttribute('class', 'w-100');
    $layout->addItem($img);


}

/**
* 判断时间区间
*
* 使用方法  if(timeZone($this->date->timeStamp)) echo 'ok';
*/
function timeZone($from){
$now = new Typecho_Date(Typecho_Date::gmtTime());
return $now->timeStamp - $from < 24*60*60 ? true : false;
}




/**
 * 幻灯片设置
 */
function hdinfo()
{   
	$settings = Helper::options()->hdset;	
	$navtops_list = array();
	if (strpos($settings,'|')) {
			//解析关键词数组
			$kwsets = array_filter(preg_split("/(\r|\n|\r\n)/",$settings));
			foreach ($kwsets as $kwset) {
			$navtops_list[] = explode('|',$kwset);
			}
		}
	ksort($navtops_list);  //对关键词排序，短词排在前面
	
    if($navtops_list){
        $readnum = 0;
		$i = 0;
		$j = 1;
		
        foreach ($navtops_list as $key => $val) {
            
            $str = '<a class="item swiper-slide" href="'.$val[$i].'" target="_blank">
			      		        <img class="img" src="'.$val[$j].'" />
                            </a>';	
            
           
            
                $readnum += 1;
				echo $str;
                //$content = substr_replace($content,$str,$str_index,$len);
                //$content = $this->str_replace_limit($title,$str,$content,$this->limit);
          
            if($readnum == 4) {
			//匹配到8个关键词就退出
			$i += 2;
            $j += 2;
           
            }
		}
    }
}


//热门文章
function getHotPosts($limit = 5){
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($limit)
        ->order('commentsNum', Typecho_Db::SORT_DESC)
    );
    if($result){

        $i = 1;

        foreach($result as $val){ 
			
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            $created = date('m-d', $val['created']);
            $img =  $db->fetchAll($db->select()->from('table.fields')->where('name = ? AND cid = ?','img',$val['cid']));
					if(count($img) !=0){
						//var_dump($img);
						$img=$img['0']['str_value'];						
                        if($img){}
						else{
                         $img="/usr/themes/s_blog/img/adimg.png";
						}                        						 
					}						

            if($i == 1){
			 
               
					echo '  <div class="fullBox">
                                <a href="' .$permalink. '" title="' .$post_title. '" target="_blank">
                                    <img class="bannerImg" src="'.$img.'" />
                                    <h4 class="title">' .$post_title. '</h4>
                                    <p>'.$created.'</p>
                                </a>
                            </div>';

			}
			else{
            echo ' <div class="fullBox item">
                                <a href="' .$permalink. '" title="' .$post_title. '" target="_blank">
                                    <img class="banner" src="'.$img.'" alt="' .$post_title. '" />
                                    <h4 class="title">' .$post_title. '</h4>
                                    <p>'.$created.'</p>
                                </a>
                            </div>';       
			}

			

            $i++;

        }
    }
}


/**
* 阅读统计
* 调用<?php get_post_view($this); ?>
*/
function Postviews($archive) {
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `views` INT(10) DEFAULT 0;');
    }
    $exist = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid))['views'];
    if ($archive->is('single')) {
        $cookie = Typecho_Cookie::get('contents_views');
        $cookie = $cookie ? explode(',', $cookie) : array();
        if (!in_array($cid, $cookie)) {
            $db->query($db->update('table.contents')
                ->rows(array('views' => (int)$exist+1))
                ->where('cid = ?', $cid));
            $exist = (int)$exist+1;
            array_push($cookie, $cid);
            $cookie = implode(',', $cookie);
            Typecho_Cookie::set('contents_views', $cookie);
        }
    }
    echo $exist == 0 ? '0' : $exist.' ';
}


/**
* 评论者主页链接新窗口打开
* 调用<?php CommentAuthor($comments); ?>
*/
function CommentAuthor($obj, $autoLink = NULL, $noFollow = NULL) {    //后两个参数是原生函数自带的，为了保持原生属性，我并没有删除，原版保留
    $options = Helper::options();
    $autoLink = $autoLink ? $autoLink : $options->commentsShowUrl;    //原生参数，控制输出链接（开关而已）
    $noFollow = $noFollow ? $noFollow : $options->commentsUrlNofollow;    //原生参数，控制输出链接额外属性（也是开关而已...）
    if ($obj->url && $autoLink) {
        echo '<a href="'.$obj->url.'"'.($noFollow ? ' rel="external nofollow"' : NULL).(strstr($obj->url, $options->index) == $obj->url ? NULL : ' target="_blank"').'>'.$obj->author.'</a>';
    } else {
        echo $obj->author;
    }
}

//随机文章
function getRandomPosts($limit = 10){    
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= unix_timestamp(now())', 'post')
        ->limit($limit)
        ->order('RAND()')
    );
    if($result){
        $i=1;
        foreach($result as $val){
            if($i<=3){
                $var = ' class="red"';
            }else{
                $var = '';
            }
            $val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
            $post_title = htmlspecialchars($val['title']);
            $permalink = $val['permalink'];
            echo '<div class="list-item py-2"><a href="'.$permalink.'" target="_blank" class="list-title h-2x">'.$post_title.'</a></div>';
            $i++;

			
        }
    }
}


/** 输出文章缩略图 */
function showThumbnail($widget,$imgnum){ //获取两个参数，文章的ID和需要显示的图片数量
    // 当文章无图片时的默认缩略图
    $rand = rand(1,20); 
    $random = $widget->widget('Widget_Options')->themeUrl . '/img/rand/' . $rand . '.jpg'; // 随机缩略图路径
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';
    //如果文章内有插图，则调用插图
    if (preg_match_all($pattern, $widget->content, $thumbUrl)) { 
        echo $thumbUrl[1][$imgnum];
    }
    //没有就调用第一个图片附件
    else if ($attach && $attach->isImage) {
        echo $attach->url; 
    } 
    //如果是内联式markdown格式的图片
    else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][$imgnum];
    }
    //如果是脚注式markdown格式的图片
    else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
        echo $thumbUrl[1][$imgnum];
    }
    //如果真的没有图片，就调用一张随机图片
    else{
        echo $random;
    }
}

//获取Gravatar头像 QQ邮箱取用qq头像
function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array())
{
preg_match_all('/((\d)*)@qq.com/', $email, $vai);
if (empty($vai['1']['0'])) {
    $url = 'https://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
}else{
    $url = 'https://q2.qlogo.cn/headimg_dl?dst_uin='.$vai['1']['0'].'&spec=100';
}
return  $url;
}