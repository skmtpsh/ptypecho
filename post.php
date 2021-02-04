<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h1>
        <div class="post-shead" itemprop="author" itemscope itemtype="http://schema.org/Person">
            <span>
                <?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
            </span>
            <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author" class="author">
                <?php $this->author->gravatar(); ?>
                <?php $this->author(); ?>
            </a>
        </div>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tagsbox"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
        <ul class="post-meta">
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
			<li><?php _e('阅读:'); ?>(<?php $this->viewsCount(); ?>)</li>
        </ul>
    </article>
    <article class="post-near pd-20">
        <p>上一篇：<?php $this->thePrev('%s','没有了'); ?></p>
        <p>下一篇：<?php $this->theNext('%s','没有了'); ?></p>
    </article>
    <article class="related pd-20">
        <h4 class="related-title">相关文章</h4>
        <?php $this->related(5)->to($relatedPosts); ?>
        <ul class="related-list">
            <?php while ($relatedPosts->next()): ?>
            <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </article>
    <?php $this->need('comments.php'); ?>

</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
