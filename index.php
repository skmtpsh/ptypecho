<?php
/**
 * 这是 Typecho 0.9 系统的一套默认皮肤
 *
 * @package Typecho Replica Theme
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>

<main  id="main" class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

	<?php while($this->next()): ?>
		<div class="box shadow-sm border rounded bg-white mb-3" itemscope itemtype="http://schema.org/BlogPosting">
			<div class="box-title p-3">
				<h1 itemprop="name headline" class="post-title">
					<a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
				</h1>
			</div>
			<div class="post-state">
				<!-- <div class="post-state-btns" itemprop="author" itemscope itemtype="http://schema.org/Person">
					<?php _e('作者: '); ?>
					<i class="bi bi-person"></i>
					<span><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
				</div> -->
				<div class="post-state-btns">
					<i class="bi bi-calendar2-event"></i>
					<?php _e('时间: '); ?>
					<span><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></span>
				</div>
				<div class="post-state-btns">
					<i class="bi bi-card-list"></i>
					<?php _e('分类: '); ?>
					<span><?php $this->category(','); ?> </span>
				</div>
				<div class="post-state-btns" temprop="interactionCount">
					<i class="bi bi-chat-right-text"></i>
					<span><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></span>
				</div>
			</div>
			<div class="box-body p-3" itemprop="articleBody">
				<?php $this->excerpt(350, '...'); ?>
				<p class="text-right"><a href="<?php $this->permalink() ?>" class="text-hover">阅读全部</a></p>
			</div>

		</div>
	<?php endwhile; ?>
	<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</main><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
