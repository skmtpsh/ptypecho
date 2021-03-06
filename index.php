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
	<!-- <h3># 在线服务</h3> -->
	<el-tabs v-model="activeName" @tab-click="handleClick">
			<el-tab-pane name="all">
				<span slot="label"> 全部 </span>
					<?php while($this->next()): ?>
						<article class="post" itemscope itemtype="http://schema.org/BlogPosting">
							<div class="calendar kit-hidden-tb">
								<div><?php $this->date('d'); ?></div>
								<p><?php $this->date('Y/m'); ?></p>
							</div>
							<div class="post-head kit-hidden-tb">
								<div class="author">
									<!-- php $this->author->gravatar('48');  -->
									<img class="avator_cir" src="<?php $this->options->themeUrl('img/ava.jpg'); ?>">
									<div>
										<a class="user_name" itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a>
										<p class="f12">非著名文艺青年.发布于 </p>
										<!-- <time class="time" datetime="<php $this->date('Y-m-d H:i:s'); >" itemprop="datePublished"> <php $this->date('Y-m-d H:i:s'); ></time> -->
									</div>
								</div>
							</div>
							<h2 class="post-title index" itemprop="name headline">
								<!-- <span class="tags"></span> -->
								<?php arcGrade($this);?>
								<a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->sticky(); $this->title() ?></a>
							</h2>
							<div class="post-content index" itemprop="articleBody">
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
			</el-tab-pane>
			<el-tab-pane name="service">
				<span slot="label"> 服务 </span>
				<h3># 在线服务</h3>
        <ul class="modle-list">
					<li>
							<a href="http://gushi.pangshuhai.com" rel="noreferrer noopener" target="_blank">
								<i class="el-icon-collection"></i>
								<strong>部编版小学古诗词</strong>
								<span><em>111首</em> <i class="el-icon-arrow-right"></i></span>
							</a>
					</li>
					<li>
							<a href="http://yuedu.pangshuhai.com" rel="noreferrer noopener" target="_blank">
								<i class="el-icon-collection"></i>
								<strong>在线阅读书籍</strong>
								<span><em>去读读</em> <i class="el-icon-arrow-right"></i></span>
							</a>
					</li>
        </ul>
			</el-tab-pane>
			<el-tab-pane name="hot">
				<span slot="label"> 热门 </span>
				<h3># 热门文章</h3>
				<ul class="widget-list">
					<?php MueduPostViews_Plugin::outputHotPosts() ?>
				</ul>
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
			</el-tab-pane>
			<el-tab-pane name="news">
				<span slot="label"> 评论 </span>
				<h3># 最近评论</h3>
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
			</el-tab-pane>
	</el-tabs>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
