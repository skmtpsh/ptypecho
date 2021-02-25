<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div class="col-mb-12 col-8 col-offset-2" id="main" role="main">
    <article class="post detail" itemscope itemtype="http://schema.org/BlogPosting">

        <h1 class="post-title detail" itemprop="name headline"><?php $this->title(); ?></h1>
        <div class="post-content post-detail" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <div class="post-shead" itemprop="author" itemscope itemtype="http://schema.org/Person">
            <a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author" class="author">
                <?php $this->author->gravatar(); ?>
                <div><?php $this->author(); ?> <p class="f12">非著名文艺青年 发布于<time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></p></div>
            </a>
        </div>
        <p itemprop="keywords" class="tagsbox"><?php $this->tags(' ', true, 'none'); ?></p>
        <ul class="post-meta">
            <li class="kit-show">
                <i class="el-icon-chat-line-square"></i> 转发
            </li>
            <li class="kit-show">
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><i class="el-icon-date"></i> 发布于(<?php $this->date(); ?>) </time>
            </li>
			<li><i class="el-icon-view"></i> 阅读(<?php $this->viewsCount(); ?>)</li>
            <li><i class="el-icon-menu"></i> 分类(<?php $this->category(','); ?>)</li>
        </ul>
    </article>
    <div class="tools kit-hidden-tb">
        <ul>
            <li><i class="el-icon-chat-line-square"></i></li>
            <li><i class="el-icon-share"></i></li>
            <li><i class="el-icon-rank"></i></li>
        </ul>
    </div>
    <div class="copyright">
        <p>免责声明：以上内容源自网络，版权归原作者所有，如有侵犯您的原创版权请告知，我们将尽快删除相关内容。如若转载，请注明出处：<?php $this->permalink() ?></p>
    </div>

    <!-- <div class="widget-column"><span class="widget-column__head">·&nbsp; 已收录至专栏 &nbsp;·</span></div> -->
    <article class="post-near pd-20">
        <p>上一篇：<?php $this->thePrev('%s','没有了'); ?></p>
        <p>下一篇：<?php $this->theNext('%s','没有了'); ?></p>
    </article>
    <article class="related pd-20">
        <?php $this->related(5)->to($relatedPosts); ?>
        <?php if($relatedPosts->have()): ?>
            <h4 class="related-title">相关文章</h4>
            <ul>
                <?php while ($relatedPosts->next()): ?>
                <li><a href="<?php $relatedPosts->permalink(); ?>" title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </article>
    <?php $this->need('comments.php'); ?>

</div><!-- end #main-->
<?php $this->need('footer.php'); ?>
