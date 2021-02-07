<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8 col-offset-2" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">

        <div class="post-shead" itemprop="author" itemscope itemtype="http://schema.org/Person">
            <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author" class="author">
                <?php $this->author->gravatar(); ?>
                <div><?php $this->author(); ?> <p class="f12">非著名文艺青年 发布于<time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></p></div>
            </a>
            <el-tag effect="dark" size="small" class="cate"><i class="el-icon-menu"></i> <?php $this->category(','); ?></el-tag>
        </div>
        <h1 class="post-title" itemprop="name headline"><?php $this->title(); ?></h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tagsbox"><?php $this->tags(' ', true, 'none'); ?></p>
        <ul class="post-meta">
			<li><i class="el-icon-document-copy"></i> (<?php $this->viewsCount(); ?>)</li>
        </ul>
    </article>
    <div class="Copyrightnew">文章由官网发布，如若转载，请注明出处：<?php $this->permalink() ?></div>
    <div class="widget-column"><span class="widget-column__head">·&nbsp; 已收录至专栏 &nbsp;·</span></div>
    <article class="post-near pd-20">
        <p>上一篇：<?php $this->thePrev('%s','没有了'); ?></p>
        <p>下一篇：<?php $this->theNext('%s','没有了'); ?></p>
    </article>
    <article class="related pd-20">
        <?php $relatedPosts = $this->widget('Widget_Contents_Related', 'limit=5'); ?>
        <?php if($relatedPosts->have()): ?>
            <h4 class="related-title">相关文章</h4>
            <ul class="related-list">
                <?php while($relatedPosts->next()):  ?>
                <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </article>
    <?php $this->need('comments.php'); ?>

</div><!-- end #main-->
<?php $this->need('footer.php'); ?>
