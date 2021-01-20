<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12" >
    <div class="box mb-3 shadow-sm border rounded bg-white">
        <div class="sideNav">
            <ul>
                <li>
                    <div class="symbol symbol-light-info">
                        <span class="symbol-label">
                            <i class="bi bi-toggles"></i>
                        </span>
                    </div>
                    <a href="#">
                        <span>Shop</span>
                    </a>
                </li>
                <li>
                    <div class="symbol symbol-light-warning">
                        <span class="symbol-label">
                            <i class="bi bi-toggles"></i>
                        </span>
                    </div>
                    <a href="#">
                        <span>Shop</span>
                    </a>
                </li>
                <li>
                    <div class="symbol symbol-light-success">
                        <span class="symbol-label">
                            <i class="bi bi-toggles"></i>
                        </span>
                    </div>
                    <a href="#">
                        <span>Shop</span>
                    </a>
                </li>
                <li>
                    <div class="symbol symbol-light-danger">
                        <span class="symbol-label">
                            <i class="bi bi-toggles"></i>
                        </span>
                    </div>
                    <a href="#">
                        <span>Shop</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="box shadow-sm mb-3 rounded bg-white ads-box text-center">
        <img src="http://v.bootstrapmb.com/2019/12/l63856876/img/job1.png" class="img-fluid" alt="Responsive image">
        <div class="p-3 border-bottom">
            <h6 class="font-weight-bold text-dark">Osahan Solutions</h6>
            <p class="mb-0 text-muted">Looking for talent?</p>
        </div>
        <div class="p-3">
            <button type="button" class="btn btn-outline-primary pl-4 pr-4">POST A JOB</button>
        </div>
    </div>
</aside>
<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12" id="secondary" role="complementary">

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3"><h6 class="m-0"><?php _e('最新文章'); ?></h6></div>
        <div class="p-3">
            <ul class="widget-list">
                <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3"><h6 class="m-0"><?php _e('最近回复'); ?></h6></div>
        <div class="p-3">
            <ul class="widget-list">
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
            <?php endwhile; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3"><h6 class="m-0"><?php _e('分类'); ?></h6></div>
        <div class="p-3">
            <ul class="widget-list">
                <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
                <?php while($categorys->next()): ?>
                    <li><a href="<?php $categorys->permalink(); ?>"> <?php $categorys->name(); ?></li>
                <?php endwhile; ?>
            </ul>
            <!-- <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?> -->
        </div>
	</div>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3"><h6 class="m-0"><?php _e('归档'); ?></h6></div>
        <div class="p-3">
            <ul class="widget-list">
                <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </div>
	</div>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <div class="box shadow-sm border rounded bg-white mb-3">
        <div class="box-title border-bottom p-3"><h6 class="m-0"><?php _e('其它'); ?></h6></div>
        <div class="p-3">
            <ul class="widget-list">
                <?php if($this->user->hasLogin()): ?>
                    <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                <?php else: ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
                <?php endif; ?>
                <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
                <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
                <!-- <li><a href="http://www.typecho.org">Typecho</a></li> -->
            </ul>
        </div>
	</div>
    <?php endif; ?>

</aside>
<!-- end #sidebar -->
