<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<main  id="main" class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">

    <article class="box shadow-sm border rounded bg-white mb-3" itemscope itemtype="http://schema.org/BlogPosting">
        <div class="box-title p-3">
            <h1 itemprop="name headline" class="post-title">
                <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h1>
        </div>
        <!-- <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
            <li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul> -->
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
        <div class="box-body p-4" itemprop="articleBody">
            <?php $this->content(); ?>
            <p> text post.php</p>
        </div>
        <p itemprop="keywords" class="tags">
            <?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?>
        </p>
    </article>

    <?php $this->need('comments.php'); ?>

    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
    </ul>
</main><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
