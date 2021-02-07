<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-4 kit-hidden-tb" id="secondary" role="complementary">
    <section class="widget">
        <div class="statBox">
            <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
            <div class="statItem">
                <p>文章总数：<span class="statNum"><?php $stat->publishedPostsNum() ?></span>篇</p>
                <p>分类总数：<span class="statNum"><?php $stat->categoriesNum() ?></span>个</p>
            </div>
            <div class="statItem">
                <p>评论总数：<span class="statNum"><?php $stat->publishedCommentsNum() ?></span>条</p>
                <p>页面总数：<span class="statNum"><?php $stat->publishedPagesNum() ?></span>页</p>
            </div>
        </div>
    </section>
    <section class="widget">
        <el-tabs v-model="activeName" type="card" @tab-click="handleClick">
            <el-tab-pane name="hot">
                <span slot="label"><i class="el-icon-date"></i> 热门文章</span>
                <ul class="widget-list">
                    <?php MueduPostViews_Plugin::outputHotPosts() ?>
                </ul>
            </el-tab-pane>
            <el-tab-pane name="news">
                <span slot="label"><i class="el-icon-date"></i> 最新文章</span>
                <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                    <ul class="widget-list">
                        <!-- <?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}">{title}</a></li>'); ?> -->
                        <?php $this->widget('Widget_Contents_Post_Recent')->to($postRecent); ?>
                        <?php $i = 1; ?>
                        <?php while($postRecent->next()): ?>
                            <li>
                                <span class="orderNum"><?php echo $i; ?></span>
                                <a href="<?php $postRecent->permalink(); ?>"><?php $postRecent->title(); ?></a>
                                <p class="recent-date"><?php $postRecent->date(); ?></p>
                            </li>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </el-tab-pane>
        </el-tabs>
    </section>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li>
                <div class="comment-ping">
                    <div class="comment-head">
                        <div class="comment-tx">
                            <?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="40px" height="40px" style=" marin-right: 5px; border-radius: 50%;" >'; ?>
                            <div class="comment-tx-t">
                                <strong>
                                    <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>
                                </strong>
                                <time><?php $comments->dateWord(); ?></time>
                            </div>
                        </div>
                    </div>
                    <p class="comment-cont"><?php $comments->excerpt(35, '...'); ?></p>
                </div>
            </li>
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
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <!-- <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li> -->
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="https://github.com/skmtpsh">GitHub</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->
