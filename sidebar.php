<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-4 kit-hidden-tb" id="secondary" role="complementary">
    <section class="widget">
        <h3 class="widget-title"><?php _e('热门文章'); ?></h3>
        <ul class="widget-list">
            <?php MueduPostViews_Plugin::outputHotPosts() ?>
        </ul>
    </section>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <!-- <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?> -->
            <?php $this->widget('Widget_Contents_Post_Recent')->to($postRecent); ?>
            <?php $i = 1; ?>
            <?php while($postRecent->next()): ?>
                <li>
                    <span class="orderNum"><?php echo $i; ?></span>
                    <a href="<?php $postRecent->permalink(); ?>"><?php $postRecent->title(); ?></a>
                    <p><?php $postRecent->date(); ?></p>
                </li>
                <?php $i++; ?>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

	<section class="widget">
		<h3 class="widget-title"><?php _e('标签云'); ?></h3>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=30')->to($tags); ?>
        <div class="tags-list">
            <?php while($tags->next()): ?>
                <a style="color: rgb(<?php echo(rand(0, 255)); ?>, <?php echo(rand(0,255)); ?>, <?php echo(rand(0, 255)); ?>)" href="<?php $tags->permalink(); ?>" title='<?php $tags->name(); ?>'><?php $tags->name(); ?></a>
            <?php endwhile; ?>
        </div>
    </section>
    <section class="widget">
		<h3 class="widget-title"><?php _e('网站统计'); ?></h3>
        <div class="statBox">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <div class="statItem">
                <p>文章总数：<span><?php $stat->publishedPostsNum() ?></span>篇</p>
                <p>分类总数：<span><?php $stat->categoriesNum() ?></span>个</p>
            </div>
            <div class="statItem">
                <p>评论总数：<span><?php $stat->publishedCommentsNum() ?></span>条</p>
                <p>页面总数：<span><?php $stat->publishedPagesNum() ?></span>页</p>
            </div>
        </div>
    </section>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="https://github.com/skmtpsh">GitHub</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->
