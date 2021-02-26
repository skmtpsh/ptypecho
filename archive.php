<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-mb-12 col-10 col-offset-1" id="main" role="main">
        <?php if ($this->is('search')): ?>
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
        <?php else: ?>
        <div class="tabs">
            <a href="<?php $this->options->siteUrl(); ?>">主页</a>
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                <?php while ($category->next()): ?>
                    <a
                        <?php if ($this->is('post')): ?>
                                <?php if ($this->category == $category->slug): ?> class="current"<?php endif; ?>
                        <?php else: ?>
                            <?php if ($this->is('category', $category->slug)): ?> class="current"<?php endif; ?>
                        <?php endif; ?>
                        href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"
                    >
                        <?php $category->name(); ?>
                    </a>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="post-head kit-hidden-tb">
                    <div class="author">
                        <!-- php $this->author->gravatar('48');  -->
                        <img class="avator_cir" src="<?php $this->options->themeUrl('img/ava.jpg'); ?>">
                        <div>
                            <a class="user_name" itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
                            <p class="f12">非著名文艺青年.发布于 <time class="time" datetime="<?php $this->date('Y-m-d H:i:s'); ?>" itemprop="datePublished"> <?php $this->date('Y-m-d H:i:s'); ?></time></p>
                        </div>
                    </div>
                </div>
                <h2 class="post-title index" itemprop="name headline">
                    <!-- <span class="tags"></span> -->
                    <?php arcGrade($this);?>
                    <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a>
                </h2>
                <div class="post-content" itemprop="articleBody">
                    <?php
                        if (preg_match('/<!--more-->/',$this->content)||mb_strlen($this->content, 'utf-8') < 180) {
                            $this->content('<i class="el-icon-link"></i> 阅读全文');
                        } else {
                            $c=mb_substr($this->content, 0, 180, 'utf-8');
                            echo $c.'<a href="',$this->permalink(),'" title="',$this->title(),'"><i class="el-icon-link"></i> 阅读全文</a>';
                        }
                    ?>
                </div>
                <ul class="post-meta">
                    <li><i class="el-icon-share"></i> <?php _e('转发'); ?></li>
                    <li class="kit-hidden-tb"><i class="el-icon-document-copy"></i> <?php _e('分类'); ?>(<?php $this->category(','); ?>)</li>
                    <li><i class="el-icon-view"></i> <?php _e('阅读'); ?>(<?php $this->viewsCount(); ?>) </li>
                    <li itemprop="interactionCount">
                        <i class="el-icon-chat-line-square"></i>
                        <a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments">
                            <?php _e('评论'); ?>(<?php $this->commentsNum(0, '1', '%d'); ?>)
                        </a>
                    </li>
                </ul>
			</article>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <div class="noData">
                    <img src="<?php $this->options->themeUrl('img/no.png'); ?>" />
                </div>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div><!-- end #main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
