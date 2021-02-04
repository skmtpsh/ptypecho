<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>


<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
        echo ' comment-child';
        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
        echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-item">
            <span class="avator">
                <?php $email=$comments->mail; $imgUrl = getGravatar($email);echo '<img src="'.$imgUrl.'" width="32px" height="32px" style="border-radius: 50%;" >'; ?>
            </span>
            <div class="cont">
                <div class="comment-author">
                    <!-- <?php $comments->gravatar('32', ''); ?> -->
                    <cite class="fn"><?php $comments->author(); ?></cite>
                </div>
                <div class="comment-meta">
                    <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
                    <span class="comment-reply"><?php $comments->reply(); ?></span>
                </div>
                <div class="comment-c"><?php $comments->content(); ?></div>
            </div>
        </div>
    </div>
    <?php if ($comments->children) { ?>
        <div class="comment-children">
            <?php $comments->threadedComments($options); ?>
        </div>
    <?php } ?>
</li>
<?php } ?>

<?php $this->comments()->to($comments); ?>
<div id="comments" class="pd-20">

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
            <?php $comments->cancelReply(); ?>
        </div>
    	<h3 id="response"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p>
    			<input type="text" name="author" id="author" class="text" placeholder="请输入称呼" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p>
    			<input type="email" name="mail" id="mail" class="text" placeholder="请输入QQ邮箱" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p>
    			<input type="url" name="url" id="url" class="text" placeholder="请输入网址 <?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </p>
            <p>
                <?php spam_protection_math();?>
            </p>
            <?php endif; ?>
    		<p>
                <textarea rows="8" name="text" id="textarea" class="textarea" maxlength="200" placeholder="请输入5-200以内的文字" required style="min-height: 100px;"><?php $this->remember('text'); ?></textarea>
            </p>
    		<p>
                <button type="submit" class="submit primary-btn"><?php _e('提交评论'); ?></button>
            </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>


    <?php if ($comments->have()): ?>
	<h3><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></h3>

    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>
</div>

