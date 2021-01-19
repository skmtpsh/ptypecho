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

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/normalize/8.0.1/normalize.css">
    <link href="http://cdn.bootstrapmb.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>"> -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style/style.css'); ?>">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<nav id="Header" class="navbar navbar-expand p-0 osahan-nav-top">
    <div class="container">
      <a href="<?php $this->options->siteUrl(); ?>" class="navbar-brand mr-2"><img src="img/logo.png" width="60" /></a>
      <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search" class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <label for="s" class="sr-only"><?php _e('输入关键字搜索'); ?></label>
          <input type="text" id="s" name="s" class="form-control shadow-none border-0" placeholder="<?php _e('输入关键字搜索'); ?>">
          <div class="input-group-append">
            <button class="btn" type="submit">
              <i class="feather-search"></i>
            </button>
          </div>
        </div>
      </form>
        <ul class="navbar-nav ml-auto d-flex align-items-center">
        <li class="nav-item">
            <a<?php if($this->is('index')): ?> class="nav-link" <?php endif; ?> href="<?php $this->options->siteUrl(); ?>">
                <i class="feather-briefcase mr-2"></i>
                <span class="d-none d-lg-inline"><?php _e('首页'); ?></span>
            </a>
        </li>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
            <li>
                <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                <?php endwhile; ?>
            </li>
        <?php endwhile; ?>
        </ul>
    </div>
  </nav>
  <div id="body" class="py-4">
    <div class="container">
      <div class="row">




