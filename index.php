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

<div class="col-mb-12 col-8" id="main" role="main">
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
						<div class="post-head" itemprop="author" itemscope itemtype="http://schema.org/Person">
							<div class="post-head-img"><?php $this->author->gravatar(); ?></div>
							<div class="post-head-tit">
								<p><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></p>
								<time class="time" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
							</div>
						</div>
						<h2 class="post-title" itemprop="name headline">
							<span class="tags"><?php $this->category(','); ?></span><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a>
						</h2>
            <div class="post-content" itemprop="articleBody">
							<?php
								if (preg_match('/<!--more-->/',$this->content)||mb_strlen($this->content, 'utf-8') < 270) {
									$this->content('阅读全文...');
								} else {
									$c=mb_substr($this->content, 0, 270, 'utf-8');
									echo $c.'...';
									echo '</br><p class="more"><a href="',$this->permalink(),'" title="',$this->title(),'">阅读剩余部分...</a></p>';
								}
							?>
						</div>
						<ul class="post-meta">
							<li><span class="iconfont icon-quanminlangdu"></span> <?php $this->viewsCount(); ?> 次阅读</li>
							<li itemprop="interactionCount">
								<span class="iconfont icon-pinglun"></span>
								<a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments">
									<?php $this->commentsNum('', '1', '%d'); ?>
								</a>
								条评论
							</li>
						</ul>
				</article>
				<?php if ($this->sequence == 1): ?>
					<p>此处为广告</p>
				<?php endif; ?>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
