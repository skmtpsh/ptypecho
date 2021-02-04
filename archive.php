<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

    <div class="col-mb-12 col-8" id="main" role="main">
        <?php if ($thais->is('archive', 'search')): ?>
        <h3 class="archive-title"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h3>
        <?php else: ?>
        <div class="tabs">
            <a href="<?php $this->options->siteUrl(); ?>">主页</a>
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
        <?php endif; ?>
        <?php if ($this->have()): ?>
    	<?php while($this->next()): ?>
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
    			<h2 class="post-title" itemprop="name headline"><a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a></h2>
    			<ul class="post-meta">
    				<li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
    				<li><?php _e('时间: '); ?><time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time></li>
                    <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
				    <li><?php _e('阅读:'); ?>(<?php $this->viewsCount(); ?>)</li>
                    <li itemprop="interactionCount"><a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a></li>
    			</ul>
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
    		</article>
    	<?php endwhile; ?>
        <?php else: ?>
            <article class="post">
                <div class="noData">
                    <img src="<?php $this->options->themeUrl('img/no.png'); ?>" />
                </div>
            </article>
        <?php endif; ?>

        <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div><!-- end #main -->

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
