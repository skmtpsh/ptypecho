<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit($comment){
    $comment = spam_protection_pre($comment, $post, $result);
}
function spam_protection_math(){
    $numFirst=rand(1,20);
    $numSecond=rand(1,20);
    echo "<label for=\"math\" class=\"required\">请输入<code>$numFirst</code>+<code>$numSecond</code>的计算结果：</label>\n";
    echo "<input type=\"text\" name=\"sum\" class=\"text\" value=\"\" size=\"25\" tabindex=\"4\" placeholder=\"请输入计算结果：\" required>\n";
    echo "<input type=\"hidden\" name=\"numFirst\" value=\"$numFirst\">\n";
    echo "<input type=\"hidden\" name=\"numSecond\" value=\"$numSecond\">";
}
function spam_protection_pre($comment, $post, $result){
    $sum=$_POST['sum'];
    switch($sum){
        case $_POST['numFirst']+$_POST['numSecond']:
        break;
        case null:
        throw new Typecho_Widget_Exception(_t('对不起: 请输入验证码。<a href="javascript:history.back(-1)">返回上一页</a>','评论失败'));
        break;
        default:
        throw new Typecho_Widget_Exception(_t('对不起: 验证码错误，请<a href="javascript:history.back(-1)">返回</a>重试。','评论失败'));
    }
    return $comment;
}

/**
 * 加载时间
 * @return bool
 */
function timer_start() {
    global $timestart;
    $mtime     = explode( ' ', microtime() );
    $timestart = $mtime[1] + $mtime[0];
    return true;
}
timer_start();
function timer_stop( $display = 0, $precision = 3 ) {
    global $timestart, $timeend;
    $mtime     = explode( ' ', microtime() );
    $timeend   = $mtime[1] + $mtime[0];
    $timetotal = number_format( $timeend - $timestart, $precision );
    $r         = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ( $display ) {
        echo $r;
    }
    return $r;
}

/*文章访问量等级*/
function arcGrade($archive){
    $db = Typecho_Db::get();
    $cid = $archive->cid;
    // if (!array_key_exists('viewsCount', $db->fetchRow($db->select()->from('table.contents')))) {
    //     $db->query('ALTER TABLE `'.$db->getPrefix().'contents` ADD `viewsCount` INT(10) DEFAULT 0;');
    // }
    $exist = $db->fetchRow($db->select('viewsCount')->from('table.contents')->where('cid = ?', $cid))['viewsCount'];
    if($exist<100){
       echo '<i class="badge arc_v1">初探</i>';
    }elseif ($exist<200 && $exist>=100) {
        echo '<i class="badge arc_v2">新秀</i>';
    }elseif ($exist<600 && $exist>=200) {
        echo '<i class="badge arc_v3">推荐</i>';
    }elseif ($exist<900 && $exist>=300) {
        echo '<i class="badge arc_v4">热文</i>';
    }elseif ($exist<1500 && $exist>=900) {
        echo '<i class="badge arc_v5">头条</i>';
    }elseif ($exist<2100 && $exist>=1500) {
        echo '<i class="badge arc_v6">火爆</i>';
    }elseif ($exist>=2100) {
        echo '<i class="badge arc_v7">神贴</i>';
    }
}

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock',
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));

    $form->addInput($sidebarBlock->multiMode());
}

function getGravatar($email, $s = 96, $d = 'mp', $r = 'g', $img = false, $atts = array()) {
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

/*
function themeFields($layout) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}
*/

