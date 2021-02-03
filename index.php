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
	<?php while($this->next()): ?>
				<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
						<div class="post-head" itemprop="author" itemscope itemtype="http://schema.org/Person">
							<div class="post-head-img"><?php $this->author->gravatar(); ?></div>
							<div class="post-head-tit">
								<p><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></p>
								<time class="time" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
							</div>
						</div>
						<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h2>
            <div class="post-content" itemprop="articleBody">
							<!-- <?php $this->content('- 阅读剩余部分 -'); ?> -->
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
							<li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
							<li><?php _e('阅读:'); ?>(<?php $this->viewsCount(); ?>)</li>
							<li itemprop="interactionCount"><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
						</ul>
        </article>
	<?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
