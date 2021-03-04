<?php
/**
 * 这是 Ptypecho 系统的皮肤
 *
 * @package Typecho Theme
 * @author muedu
 * @version 1.0
 * @link http://www.pangshuhai.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="col-mb-12 col-10 col-offset-1" id="main" role="main">
 		<!-- $this->options->themeUrl('img/banner2.jpg') -->
	<!-- <div class="index-add" style="background: url()"></div> -->
	<h3># 线上服务</h3>
	<ul class="modle-list">
		<li>
				<a href="gushi.pangshuhai.com" rel="noreferrer noopener" target="_blank">
						<i class="el-icon-collection"></i>
						<strong>小学古诗词</strong>
						<span>111首 <i class="el-icon-arrow-right"></i></span>
				</a>
		</li>
	</ul>
	<h3># 热门文章</h3>
	<ul class="widget-list">
			<?php MueduPostViews_Plugin::outputHotPosts() ?>
	</ul>
	<div class="tabs">
			<a href="<?php $this->options->siteUrl(); ?>" class="current">主页</a>
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
				<?php if ($this->sequence == 1): ?>
					<p>此处为广告</p>
				<?php endif; ?>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
		<div class="recentBox">
			<h3>最新评论</h3>
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
		</div>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
