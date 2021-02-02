<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <!--
        number 显示数量，默认为10
        before 结果集前缀标签，默认为<ul>，推荐默认
        after 结果集后缀标签，默认为</ul>，推荐默认
        xformat 单条记录标签格式，默认为<li>< a href="{permalink}">{title}< /a></li>
        xformat 格式可用标签有：日志标题：{title}、日志链接：{permalink}
    -->
    <!-- <section class="widget">
		<h3 class="widget-title"><?php _e('随机日志'); ?></h3>
        <div class="widget-box">
            <?php TeKit_Plugin::tekit_random_posts('number=5'); ?>
        </div>
    </section> -->
    <!--
        days 多少天内，默认为30
        number 显示数量，默认为10
        before 结果集前缀标签，默认为< ul>，推荐默认
        after 结果集后缀标签，默认为< /ul>，推荐默认
        xformat 单条记录标签格式，默认为< li>< a href="{permalink}">[{commentsNum}]{title}< /a>< /li>
        xformat 格式可用标签有：日志标题：{title}、日志链接：{permalink}、评论数量：{commentsNum}
    -->
    <!-- <section class="widget">
		<h3 class="widget-title"><?php _e('评论最多'); ?></h3>
        <div class="widget-box">
            <?php TeKit_Plugin::tekit_most_commented_posts('days=10&number=5'); ?>
        </div>
    </section> -->
    <!--
        days 多少天内，默认为30
        number 显示数量，默认为10
        ignore是否过滤博主，过滤为true，不过滤为false，默认为true
        before 结果集前缀标签，默认为< ul>，推荐默认
        after 结果集后缀标签，默认为< /ul>，推荐默认
        xformat 单条记录标签格式，默认为< li>< a href="{url}">[{cnt}]{author}({mail})< /a>< /li>
        xformat 格式可用标签有：访客名称：{author}、访客链接：{url}、访客邮箱：{mail}、访客评论数：{cnt}。
    -->
    <!-- <section class="widget">
		<h3 class="widget-title"><?php _e('评论最多的访客'); ?></h3>
        <div class="widget-box">
            <?php TeKit_Plugin::tekit_most_active_commentors('days=10&number=5&ignore=false'); ?>
        </div>
    </section> -->
    <!--
        days 多少天内，无限制为-1，默认为-1
        number 显示数量，默认为10
        before 结果集前缀标签，默认为< ul>，推荐默认
        after 结果集后缀标签，默认为< /ul>，推荐默认
        xformat 单条记录标签格式，默认为< li>< a href="{url}">[{cnt}]{author}({mail})< /a>< /li>
        xformat 格式可用标签有：访客名称：{author}、访客链接：{url}、访客邮箱：{mail}、访客评论数：{cnt}。
    -->
    <!-- <section class="widget">
		<h3 class="widget-title"><?php _e('沙发最多的访客'); ?></h3>
        <div class="widget-box">
            <?php TeKit_Plugin::tekit_most_sofa_commentors('number=5'); ?>
        </div>
    </section> -->
    <!-- <section class="widget">
		<h3 class="widget-title"><?php _e('访客最近评论数'); ?></h3>
        <div class="widget-box">
            <?php TeKit_Plugin::tekit_most_sofa_commentors($this->remember('mail',true)); ?>
        </div>
    </section> -->
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
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

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
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
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->
