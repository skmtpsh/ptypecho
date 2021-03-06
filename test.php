<div class="tabs">
			<a href="<?php $this->options->siteUrl(); ?>" class="current">全部</a>
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


<div class="col-mb-12 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <el-card shadow="never" style="border: 0 none;" :body-style="{ padding: '0px' }">
        <ul class="modle-list">
            <li>
                <a href="#" rel="noreferrer noopener" target="_blank">
                    <i class="el-icon-collection"></i>
                    <strong>小学古诗词</strong>
                    <span>111首 <i class="el-icon-arrow-right"></i></span>
                </a>
            </li>
        </ul>
    </el-card>

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
        <el-tabs v-model="activeName" @tab-click="handleClick">
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
                            <?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="32px" height="32px" style=" marin-right: 5px; border-radius: 50%;" >'; ?>
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
	<section class="widget"></section>
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <li>关于</li>
        </ul>
	</section>
    <?php endif; ?>
</div>
