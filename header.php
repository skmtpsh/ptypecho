<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="shortcut icon" href="<?php $this->options->siteUrl(); ?>/favicon.ico" type="image/x-icon" />
    <!-- 使用url函数转换相关路径 -->
    <!-- <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/normalize/8.0.1/normalize.min.css"> -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('index.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/element-ui/2.15.0/index.min.js"></script>
  <!-- import Vue before Element -->
  <!-- <script src="https://unpkg.com/vue/dist/vue.js"></script> -->
  <!-- import JavaScript -->
  <!-- <script src="https://unpkg.com/element-ui/lib/index.js"></script> -->
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<div id="app">
<div class="Header_nav_placeholder"></div>
<header id="header" class="clearfix">
    <div class="container">
        <div class="row flex">
            <div class="site-name col-mb-8 col-3">
            <?php if ($this->options->logoUrl): ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	    <p class="description"><?php $this->options->description() ?></p>
            <?php endif; ?>
            </div>
            <div class="col-mb-4 kit-hidden-tb">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
            </div>
            <div class="site-other tr col-2 kit-hidden-tb">
                <?php if($this->user->hasLogin()): ?>
                    <!-- $this->user->screenName(); -->
                    <a href="<?php $this->options->adminUrl(); ?>" class="loginBtn"><?php _e('后台'); ?></a>
                    <a href="<?php $this->options->logoutUrl(); ?>" class="loginBtn"><?php _e('退出'); ?></a>
                <?php else: ?>
                    <a href="<?php $this->options->adminUrl('login.php'); ?>" class="loginBtn">登录</a>
                <?php endif; ?>

            </div>
            <div class="header__btn">
                <i class="el-icon-more-outline"></i>
            </div>
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->
<div class="home-add" style="background: url(<?php $this->options->themeUrl('img/banner.jpg'); ?>)"></div>
<div id="body">
    <div class="container" id="bodycenter">
        <div class="row">



