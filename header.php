
<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->archiveTitle(array(
            'category'  =>  _t('%s '),
            'search'    =>  _t('包含关键字 %s 的内容'),
            'tag'       =>  _t('标签 %s 下的内容'),
            'author'    =>  _t('%s-主页')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if ( $this->is('post') || $this->is('page')|| $this->is('tag') ) : ?><?php else: ?> - <?php echo $this->getDescription(); ?> <?php endif; ?></title>

    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/base.css?v=2020041404'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/nav.css?v=2020042802'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css?v=2020050202'); ?>">
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/swiper.min.css'); ?>"> 
	<link rel="stylesheet" href="<?php $this->options->themeUrl('css/iconfont.css'); ?>">

    <script src="<?php $this->options->themeUrl('js/jquery-2.1.4.min.js'); ?>"></script>	
	<script src="<?php $this->options->themeUrl('js/swiper.min.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/index.js'); ?>"></script>
	<script src="<?php $this->options->themeUrl('js/theia-sticky-sidebar.min.js'); ?>"></script>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    </head>

<body class="bgf6">

<!-- 头部导航 -->
      
<div id="layoutNavGrid">
    <div class="navGrid fixed">
        <div class="navGroup">
            <div class="leftWrap">
                <a href="<?php $this->options->siteUrl(); ?>" class="logoImg"></a>
            </div>
            <div class="menuBtn" id="closeMenuBtn"><i class="icon iconfont icon-shibai icondgy"></i></div>
            <div class="navUl">
               <a class="item <?php if($this->is('index')): ?> on<?php endif; ?>" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
               <?php $this->widget('Widget_Metas_Category_List@options','ignore=21')->to($category); ?>
			   <?php while($category->next()): ?>
               <a  class="item"  href="<?php $category->permalink(); ?>" ><?php $category->name(); ?></a>
               <?php endwhile; ?>
                
            </div>
        </div>
    </div>
</div>       

<!-- 头部导航 -->